@extends('front.layouts.body')
@section('main')

    <!-- Hero Section Begin -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>WheelHouse - Sewa Garasi Online</h1>
                        <p>WheelHouse adalah platform online yang memudahkan penyewaan garasi untuk penyimpanan kendaraan. Temukan garasi ideal Anda dengan Wheelhouse.</p>
                        {{-- <a href="#" class="primary-btn">Discover Now</a> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <a href="{{ route('cek.garasi') }}" class="check-availability-btn">Cek Garasi</a>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="foto/garasi1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="foto/garasi3.jpg"></div>
            <div class="hs-item set-bg" data-setbg="foto/garasi4.png"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad" id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>WheelHouse</h2>
                        </div>
                        <p class="f-para">WheelHouse adalah platform inovatif yang menyediakan layanan penyewaan garasi secara online. Didirikan dengan tujuan untuk memberikan solusi praktis dan efisien bagi para pemilik kendaraan yang membutuhkan tempat parkir atau penyimpanan sementara.</p>
                        <p class="s-para">WheelHouse hadir sebagai jawaban atas kebutuhan akan ruang garasi yang aman, nyaman, dan mudah diakses.</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="foto/logo-company1-v2.png" alt="" height="400px" width="400px">
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->
    <!-- Home Room Section Begin -->
    <section class="hp-room-section" id="garasi">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Garasi</span>
                        <h2>Pilihan Garasi</h2>
                    </div>
                </div>
            </div>
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="foto/garasi-small.jpg">
                            <div class="overlay"></div> <!-- Overlay added here -->
                            <div class="hr-text">
                                <h3>Small Garage</h3>
                                <h2>Rp. 40.000<span>/Per Malam</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Kapasitas:</td>
                                            <td>1 Motor</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Fasilitas:</td>
                                            <td>- Smart Lock Door<br>- Pendingin Ruangan</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Deskripsi:</td>
                                            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="foto/garasi-medium.jpg">
                            <div class="overlay"></div> <!-- Overlay added here -->
                            <div class="hr-text">
                                <h3>Medium Garage</h3>
                                <h2>Rp. 45.000<span>/Per Malam</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Kapasitas:</td>
                                            <td>1 Mobil</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Fasilitas:</td>
                                            <td>- Smart Lock Door<br>- Pendingin Ruangan</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Deskripsi:</td>
                                            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="foto/garasi-large.jpg">
                            <div class="overlay"></div> <!-- Overlay added here -->
                            <div class="hr-text">
                                <h3>Large Garage</h3>
                                <h2>Rp. 60.000<span>/Per Malam</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Kapasitas:</td>
                                            <td>2 Mobil</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Fasilitas:</td>
                                            <td>- Smart Lock Door<br>- Pendingin Ruangan</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Deskripsi:</td>
                                            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Services Section End -->
    <section class="services-section spad " id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Services</span>
                        <h2>Kami Menyediakan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Pencarian Garasi Yang Mudah</h4>
                        <p>Melalui situs web WheelHouse, pengguna dapat dengan cepat mencari garasi yang tersedia di lokasi yang mereka inginkan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-014-ring-bell"></i>
                        <h4>Layanan Pelanggan</h4>
                        <p> Tim pelayanan pelanggan WheelHouse siap membantu pengguna dalam proses pencarian, pemesanan, dan selama masa penyewaan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-009-cctv"></i>
                        <h4>Sistem Keamanan</h4>
                        <p>Kami memastikan bahwa garasi yang tersedia dilengkapi dengan sistem keamanan yang baik dan sistem penguncian yang aman, untuk menjaga kendaraan pengguna tetap aman selama masa penyewaan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->


@endsection