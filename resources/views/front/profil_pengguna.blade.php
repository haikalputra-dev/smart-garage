@extends('front.layouts.body')
@section('main')
@php
use Carbon\Carbon;
@endphp
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Profil Pengguna</h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Nama :</td>
                                    <td>{{ Auth::user()->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <button type="submit" class="btn btn-danger" style="border:none;">Log Out</button>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <h2>Riwayat Penyewaan</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Garasi</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $rental)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rental->garasi->nama_garasi }}</td>
                                <td>{{ Carbon::parse($rental->tanggal_mulai)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ Carbon::parse($rental->tanggal_akhir)->translatedFormat('l, d F Y') }}</td>
                                <td>
                                    @if ($rental->status == "selesai")
                                        <span class="badge bg-success" style="font-size: 15px">{{ ucfirst($rental->status) }}</span>
                                    @elseif($rental->status == "pending")
                                        <span class="badge bg-warning" style="font-size: 15px">{{ ucfirst($rental->status) }}</span>
                                    @elseif($rental->status == "batal")
                                        <span class="badge bg-danger" style="font-size: 15px">{{ ucfirst($rental->status) }}</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('detail.transaksi', ['id_pembayaran' => $rental->pembayaran->id]) }}">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section End -->

@endsection