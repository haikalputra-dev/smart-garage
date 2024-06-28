<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Garasi;
use App\Models\Rental;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreGarasiRequest;
use App\Http\Requests\UpdateGarasiRequest;

class GarasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function cekGarasi() {
        // $garasis = Garasi::where('status','tersedia')->get()->sortByDesc('lokasi');
        return view('front.lokasi_garasi');
    }

    public function cekGarasiDetail($lokasi) {
        $garasis = Garasi::where('lokasi', $lokasi)
        ->where('status', 'tersedia')
        ->get();
        // dd($garasis);
        return view('front.list_garasi',compact('garasis'));
    }

    public function bookGarasi($id) {
        $garasi = Garasi::find($id);
        // dd($garasi);
        return view('front.book_garasi',compact('garasi'));
    }

    public function transaksiGarasi(Request $request)
    {
        // Calculate the number of nights
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_akhir = Carbon::parse($request->tanggal_akhir);

        // Check for overlapping bookings
        $existingRentals = Rental::where('garasi_id', $request->garasi_id)
        ->where(function($query) use ($tanggal_mulai, $tanggal_akhir) {
            $query->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_akhir])
                ->orWhereBetween('tanggal_akhir', [$tanggal_mulai, $tanggal_akhir])
                ->orWhere(function($query) use ($tanggal_mulai, $tanggal_akhir) {
                    $query->where('tanggal_mulai', '<=', $tanggal_mulai)
                            ->where('tanggal_akhir', '>=', $tanggal_akhir);
                });
        })
        ->where('status', '!=', 'batal') // Exclude canceled bookings
        ->exists();

        if ($existingRentals) {
        return redirect()->back()->withErrors('Tanggal yang dipilih sudah dipesan. Silakan pilih tanggal lain.');
        }

        $jumlah_malam = $tanggal_mulai->diffInDays($tanggal_akhir);

        // Get the per night rate
        $garasi = Garasi::find($request->garasi_id);
        $per_night_rate = $garasi->harga_sewa;

        // Calculate the total payment
        $jumlah_pembayaran = $jumlah_malam * $per_night_rate;
        $pembayaran = null; // Initialize $pembayaran variable

    // Use try-catch block to handle any transaction failures
    try {
        DB::beginTransaction();

        $rental = Rental::create([
            'garasi_id' => $request->garasi_id,
            'renter_id' => $request->renter_id,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_akhir' => $tanggal_akhir,
            'status' => 'pending',
        ]);

        $pembayaran = Pembayaran::create([
            'rental_id' => $rental->id,
            'jumlah_pembayaran' => $jumlah_pembayaran,
            'status' => 'pending',
        ]);

        $garasi = Garasi::where('id', $request->garasi_id)->update(['status' => 'booked']);
        DB::commit();

        // Redirect to the detail.transaksi route with pembayaran ID
        return Redirect::route('detail.transaksi', ['id_pembayaran' => $pembayaran->id])->with('success', 'Pemesanan berhasil dilakukan!');
    } catch (\Exception $e) {
        DB::rollBack();

        // Handle any errors or exceptions
        return redirect()->back()->withErrors('Pemesanan gagal dilakukan. Silakan coba lagi.');
    }
}

    public function detailTransaksi($id_pembayaran) {
        $pembayaran = Pembayaran::findOrFail($id_pembayaran);
        $rental = $pembayaran->rental;
        $garasi = $rental->garasi;
        

        $jumlah_pembayaran = $pembayaran->jumlah_pembayaran;
        $tanggal_mulai = $rental->tanggal_mulai;
        $tanggal_akhir = $rental->tanggal_akhir;
        $status_pembayaran = $rental->pembayaran->status;
        $id_rental = $rental->id;

        return view('front.detail_book_garasi',compact('garasi', 'jumlah_pembayaran', 'tanggal_mulai', 'tanggal_akhir','status_pembayaran','id_rental'));
    }

    public function confirmPayment(Request $request)
    {
        $rental = Rental::find($request->rental_id);
        if ($rental && $rental->pembayaran) {
            $rental->pembayaran->update([
                'waktu_pembayaran' => Carbon::now(),
                'status' => 'selesai'
            ]);

            $rental->update([
                'status' => 'aktif'
            ]);

            $rental->garasi->update([
                'status' => 'rented'
            ]);
        }

        return redirect()->back()->with('success', 'Pembayaran Selesai !');
    }

    public function cancelPayment(Request $request)
    {
        $rental = Rental::find($request->rental_id);

        if ($rental && $rental->pembayaran) {
            $rental->pembayaran->update([
                'status' => 'batal'
            ]);

            $rental->update([
                'status' => 'batal'
            ]);

            $rental->garasi->update([
                'status' => 'tersedia'
            ]);
        }
        return redirect()->back()->with('success', 'Pembayaran dibatalkan.');
    }

    public function completeRental(Request $request)
    {
        $rental = Rental::find($request->rental_id);
        $rental->status = 'selesai';
        $rental->garasi->status = 'tersedia';
        $rental->garasi->save();
        $rental->save();

        return redirect()->route('admin.transaksi');
    }
}
