@extends('admin.layouts.body')
@section('main')
<script>
  function cekSuhu() {
    $.ajax({
      type: "GET",
      url: "{{ url('/suhu') }}",
      cache: false,
      success: function(response){
        console.log(response);
        $("#suhu").text(response + ' Celcius');
      }
    });
  }

  function cekLog() {
    $.ajax({
      type: "GET",
      url: "{{ url('/log') }}",
      cache: false,
      success: function(response){
        console.log(response);
        $("#log").text(response);
      }
    });
  }

  setInterval(cekSuhu, 1000);
  setInterval(cekLog, 1000);
</script>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Detail</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Buka Detail</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Penyewaan <span>| Bulan ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $sewa }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Detail</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Buka Detail</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pendapatan <span>| Bulan Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Rp. {{ number_format($totalBayar, 0, ',', '.') }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Customers Card -->
            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Detail</h6>
                  </li>
                  @if (Auth::user()->role=='Admin')
                      
                  <li><a class="dropdown-item" href="{{ route('admin.masterPelanggan') }}">Buka Detail</a></li>
                  @else
      
                  <li><a class="dropdown-item" href="{{ route('staff.masterPelanggan') }}">Buka Detail</a></li>
                  @endif
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Total Pengguna</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $user }}</h6>
                  </div>
                </div>

              </div>
            </div>

        </div><!-- End Right side columns -->
            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Detail</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Buka Detail</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Monitoring Garasi</h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Garasi</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Suhu</th>
                        <th scope="col">Status Garasi</th>
                        <th scope="col">Log</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td><a href="#" class="text-primary fw-bold">Garasi B001</a></td>
                        <td>Area B</td>
                        <td class="fw-bold" id="suhu"></td>
                        <td id="log"></td>
                        @if (Auth::user()->role=="Admin")
                        <td><a href="{{ route('admin.logGarasi') }}">Buka Log</a></td>
                        @else
                        <td><a href="{{ route('staff.logGarasi') }}">Buka Log</a></td>
                        @endif
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
      </div>
    </section>

  </main><!-- End #main -->
  
@endsection