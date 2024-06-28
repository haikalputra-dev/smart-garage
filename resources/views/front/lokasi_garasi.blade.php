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
                            <span>Tipe Garasi</span>
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
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="foto/garasi-small.jpg" alt="" height="200px">
                        <div class="ri-text">
                            <h4>Garasi A</h4>
                            <h3>Rp. {{ number_format(40000, 0, ',', '.') }}<span>/Per malam</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Kapasitas:</td>
                                        <td style="font-weight: bold">1 Motor</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Fasilitas:</td>
                                        <td>- Smart Lock Door</td>
                                        <td>- Pendingin Ruangan</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('cek.garasiDetail', 'Area A') }}" class="primary-btn">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="foto/garasi-medium.jpg" alt="" height="200px">
                        <div class="ri-text">
                            <h4>Garasi B</h4>
                            <h3>Rp. {{ number_format(45000, 0, ',', '.') }}<span>/Per malam</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Kapasitas:</td>
                                        <td style="font-weight: bold">1 Mobil</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Fasilitas:</td>
                                        <td>- Smart Lock Door</td>
                                        <td>- Pendingin Ruangan</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('cek.garasiDetail', 'Area B') }}" class="primary-btn">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="foto/garasi-large.jpg" alt="" height="200px">
                        <div class="ri-text">
                            <h4>Garasi C</h4>
                            <h3>Rp. {{ number_format(60000, 0, ',', '.') }}<span>/Per malam</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Kapasitas:</td>
                                        <td style="font-weight: bold">2 Mobil</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Fasilitas:</td>
                                        <td>- Smart Lock Door</td>
                                        <td>- Pendingin Ruangan</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('cek.garasiDetail', 'Area C') }}" class="primary-btn">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

@endsection