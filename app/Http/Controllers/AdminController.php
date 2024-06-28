<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Garasi;
use App\Models\Rental;
use App\Models\LogGarasi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
Carbon::setLocale('id');

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function dashboard()
    {
        $user = User::where('role','Pelanggan')->count();
        $sewa = Rental::where('status','selesai')->count();
        $totalBayar = Pembayaran::where('status', 'selesai')->sum('jumlah_pembayaran');
        // dd($user);
        return view('admin.index',compact('user','sewa','totalBayar'));
    }

    public function indexStaff()
    {
        // return view('admin.master_staff');
        $staffs = User::where('role', 'Staff')->get();
        return view('admin.master_staff', compact('staffs'));
    }

    public function indexPelanggan()
    {
        $pelanggans = User::where('role', 'Pelanggan')->get();
        return view('admin.master_pelanggan', compact('pelanggans'));
    }

    public function indexGarasi()
    {
        // return view('admin.master_garasi');
        $garasis = Garasi::get();
        return view('admin.master_garasi', compact('garasis'));
    }

    public function transaksi()
    {
        $rentals = Rental::with('user', 'garasi', 'pembayaran')
        ->get();
        return view('admin.transaksi',compact('rentals'));
    }

    public function riwayatTransaksi()
    {
        $rentals = Rental::with(['user', 'garasi', 'pembayaran'])
            ->where('status', '!=', 'aktif')
            ->get();
        return view('admin.riwayat_transaksi',compact('rentals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeStaff(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'staff'
        ]);

        return redirect()->back();
    }

    public function storePelanggan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'Pelanggan'
        ]);

        return redirect()->back();
    }

    public function storeGarasi(Request $request)
    {
        // Extract the area identifier (assuming it's the last character of the 'lokasi' field)
        $area = substr($request->lokasi, -1);
        // Get the highest number for the area
        $lastGarasiInArea = Garasi::where('lokasi', $request->lokasi)
            ->where('nama_garasi', 'like', "Garasi $area%")
            ->orderBy('id', 'desc')
            ->first();

        if ($lastGarasiInArea) {
            $lastNumber = intval(substr($lastGarasiInArea->nama_garasi, -3));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format the new number to have leading zeros
        $formattedNumber = str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        // Create the Garasi record
        $garasi = Garasi::create([
            'nama_garasi' => "Garasi $area$formattedNumber",
            'lokasi' => $request->lokasi,
            'harga_sewa' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => 'tersedia'
        ]);
        $garasi->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // Find the User by id
        $user = User::findOrFail($id);

        // Update the User with new data
        $user->update([
            'email' => $request->input('email')
        ]);

        // Redirect back with a success message
        return redirect()->back();
    }
    
    public function updateGarasi(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'deskripsi' => 'required|string|max:255',
            'status' => 'required|in:tersedia,booked,rented',
        ]);

        // Find the Garasi by id
        $garasi = Garasi::findOrFail($id);

        // Update the Garasi with new data
        $garasi->update([
            'deskripsi' => $request->input('deskripsi'),
            'status' => $request->input('status'),
        ]);

        // Redirect back with a success message
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyStaff(string $id)
    {
        User::destroy($id);
        return redirect()->back();
    }
    public function destroyPelanggan(string $id)
    {
        User::destroy($id);
        return redirect()->back();
    }

    public function destroyGarasi(string $id)
    {
        Garasi::destroy($id);
        return redirect()->back();
    }

    public function logGarasi() {
        $logs = LogGarasi::orderBy('created_at', 'desc')->get();
        return view('admin.log_garasi',compact('logs'));
    }

    public function fetchLogs()
    {
        $logs = LogGarasi::orderBy('created_at', 'desc')->get()->map(function ($log) {
            $log->formatted_date = Carbon::parse($log->created_at)->translatedFormat('l, d F Y H:i:s');
            return $log;
        });
        return response()->json($logs);
    }
}
