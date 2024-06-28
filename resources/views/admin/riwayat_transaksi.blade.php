@extends('admin.layouts.body')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">Staff</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Transaksi</h5>
              <p>Mengelola Transaksi</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                    <tr>
                        <th><b>Nama Pelanggan</b></th>
                        <th>Nama Garasi</th>
                        <th data-type="date" data-format="DD/MM/YYYY">Check In</th>
                        <th data-type="date" data-format="DD/MM/YYYY">Check Out</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status</th>
                        <th>Waktu Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->user->nama }}</td>
                        <td>{{ $rental->garasi->nama_garasi }}</td>
                        <td>{{ \Carbon\Carbon::parse($rental->tanggal_mulai)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($rental->tanggal_akhir)->format('d/m/Y') }}</td>
                        <td><span class="badge border-primary border-1 text-primary" style="font-size: 17px">Rp. {{ number_format(optional($rental->pembayaran)->jumlah_pembayaran, 0, ',', '.') }}</span></td>
                        <td>
                            @if(optional($rental->pembayaran)->status == 'pending')
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Pending</span>
                            @elseif(optional($rental->pembayaran)->status == 'selesai')
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Selesai</span>
                            @elseif(optional($rental->pembayaran)->status == 'batal')
                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Batal</span>
                            @endif
                        </td>
                        <td>
                            @if(optional($rental->pembayaran)->waktu_pembayaran)
                            {{ \Carbon\Carbon::parse($rental->pembayaran->waktu_pembayaran)->format('d/m/Y') }}
                            @else
                            Dibatalkan
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
