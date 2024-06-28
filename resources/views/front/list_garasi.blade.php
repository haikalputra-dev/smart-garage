@extends('front.layouts.body')
@section('main')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>List Garasi</h2>
                        <div class="bt-option">
                            <a href="{{ url('/') }}">Home</a>
                            <a href="{{ url('/cek-garasi') }}">Tipe Garasi</a>
                            <span>List Garasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach ($garasis as $garasi)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        @if ($garasi->lokasi == 'Area A')
                        <img src="{{ asset('foto/garasi-small.jpg') }}" alt="" height="200px">
                        @elseif($garasi->lokasi == 'Area B')
                        <img src="{{ asset('foto/garasi-medium.jpg') }}" alt="" height="200px">
                        @elseif($garasi->lokasi == 'Area C')
                        <img src="{{ asset('foto/garasi-large.jpg') }}" alt="" height="200px">
                        @endif
                        <div class="ri-text">
                            <h4>{{ $garasi->nama_garasi }}</h4>
                            <h3>Rp. {{ number_format($garasi->harga_sewa, 0, ',', '.') }}<span>/Per malam</span></h3>
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
                            <a href="{{ route('book.garasi',['id' => $garasi->id]) }}" class="primary-btn">Book Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

@endsection