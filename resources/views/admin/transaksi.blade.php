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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)
                    @if ($rental->pembayaran->status != 'batal' && $rental->status != 'selesai')

                    <tr>
                        <td>{{ $rental->user->nama }}</td>
                        <td>{{ $rental->garasi->nama_garasi }}</td>
                        <td>{{ \Carbon\Carbon::parse($rental->tanggal_mulai)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($rental->tanggal_akhir)->format('d/m/Y') }}</td>
                        <td><span class="badge border-primary border-1 text-info" style="font-size: 17px">Rp. {{ number_format(optional($rental->pembayaran)->jumlah_pembayaran, 0, ',', '.') }}</span></td>
                        <td>
                            @if(optional($rental->pembayaran)->status == 'pending')
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Pending</span>
                            @elseif(optional($rental->pembayaran)->status == 'selesai')
                            <span class="badge bg-primary"><i class="bi bi-check-circle me-1"></i> {{ $rental->status }}</span>
                            @else
                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Batal</span>
                            @endif
                        </td>
                        <td>
                          @if(optional($rental->pembayaran)->status == 'pending')
                          <form action="{{ route('confirmPayment') }}" method="POST" style="display:inline;">
                              @csrf
                              <input type="hidden" name="rental_id" value="{{ $rental->id }}">
                              <button type="submit" class="btn btn-sm btn-success">Konfirmasi Pembayaran</button>
                          </form>
                          <form action="{{ route('cancelPayment') }}" method="POST" style="display:inline;">
                              @csrf
                              <input type="hidden" name="rental_id" value="{{ $rental->id }}">
                              <button type="submit" class="btn btn-sm btn-danger">Batalkan</button>
                          </form>
                          @endif
                          @if($rental->status == 'aktif')
                          <form action="{{ route('completeRental') }}" method="POST" style="display:inline;">
                              @csrf
                              <input type="hidden" name="rental_id" value="{{ $rental->id }}">
                              <button type="submit" class="btn btn-sm btn-primary">Selesaikan</button>
                          </form>
                          @endif
                      </td>
                    </tr>
                    @endif
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
<script>
  function confirmPayment(rentalId) {
      $.ajax({
          url: "{{ route('confirmPayment') }}",
          type: "POST",
          data: {
              _token: '{{ csrf_token() }}',
              rental_id: rentalId
          },
          success: function(response) {
              location.reload();
          }
      });
  }
</script>