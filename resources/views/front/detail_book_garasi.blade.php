@extends('front.layouts.body')
@section('main')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Detail Transaksi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>{{ $garasi->nama_garasi }}</h3>
                            <div class="rdt-right">
                                Pembayaran : 
                                @if ($status_pembayaran == "pending")
                                <span class="badge bg-warning text-dark" style="font-size: 20px">{{ Str::ucfirst($status_pembayaran) }}</span>
                                @elseif($status_pembayaran == "selesai")
                                <span class="badge bg-success text-dark" style="font-size: 20px">{{ Str::ucfirst($status_pembayaran) }}</span>
                                @elseif($status_pembayaran == "batal")
                                <span class="badge bg-danger text-dark" style="font-size: 20px">{{ Str::ucfirst($status_pembayaran) }}</span>
                                @endif
                                <div id="jumlah-pembayaran">
                                    Jumlah Pembayaran: Rp. {{ number_format($jumlah_pembayaran, 0, ',', '.') }}
                                    <br>
                                    @if($tanggal_mulai && $tanggal_akhir)
                                        <div id="tanggal-mulai">
                                            Check-in: {{ \Carbon\Carbon::parse($tanggal_mulai)->format('d-m-Y') }}
                                        </div>
                                        <div id="tanggal-akhir">
                                            Check-out: {{ \Carbon\Carbon::parse($tanggal_akhir)->format('d-m-Y') }}
                                        </div>
                                    @endif
                                </div>
                                @if ($status_pembayaran == "pending")
                                <form action="{{ route('cancelPesan') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="rental_id" value="{{ $id_rental }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Batalkan Pesanan</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        <h2>Rp. {{ number_format($garasi->harga_sewa, 0, ',', '.') }}<span>/Per malam</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Lokasi:</td>
                                    <td>{{ $garasi->lokasi }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Kapasitas:</td>
                                    @if ($garasi->lokasi == 'Area A')
                                    <td style="font-weight: bold">1 Motor</td>
                                    @elseif($garasi->lokasi == 'Area B')
                                    <td style="font-weight: bold">1 Mobil</td>
                                    @elseif($garasi->lokasi == 'Area C')
                                    <td style="font-weight: bold">2 Mobil</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="r-o">Fasilitas:</td>
                                    <td>- Smart Lock Door</td>
                                    <td>- Pendingin Ruangan</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Deskripsi:</td>
                                    <td>{{ $garasi->deskripsi }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    @if ($status_pembayaran == "pending")
                    <h3>Selesaikan Pembayaran di Booth yang tersedia</h3>
                    @elseif($status_pembayaran == "selesai")
                    <h3>Pembayaran Diterima, Terima Kasih !</h3>
                    @elseif($status_pembayaran == "batal")
                    <h3>Pembayaran Dibatalkan</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->


@endsection