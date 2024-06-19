@extends('admin.layouts.body')
@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Garasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">Garasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Garasi</h5>
              <p>Mengelola Data Garasi</p>

              <!-- Add Garasi Button -->
              <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahGarasiModal">
                Tambah Garasi
              </button>

              <!-- Modal -->
              <div class="modal fade" id="tambahGarasiModal" tabindex="-1" aria-labelledby="tambahGarasiModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahGarasiModalLabel">Tambah Garasi</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('admin.masterGarasi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="nama_garasi" class="form-label">Nama Garasi</label>
                          <input type="text" class="form-control" id="nama_garasi" name="nama_garasi" required>
                        </div>
                        <div class="mb-3">
                          <label for="lokasi" class="form-label">Lokasi</label>
                          <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                        </div>
                        <div class="mb-3">
                          <label for="harga_sewa" class="form-label">Harga Sewa</label>
                          <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" required>
                        </div>
                        <div class="mb-3">
                          <label for="deskripsi" class="form-label">Deskripsi</label>
                          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="status" class="form-label">Status</label>
                          <select class="form-select" id="status" name="status" required>
                            <option value="tersedia">Tersedia</option>
                            <option value="booked">Booked</option>
                            <option value="rented">Rented</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Garasi</th>
                    <th>Lokasi</th>
                    <th>Harga Sewa</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($garasis as $garasi)
                    <tr>
                      <td>{{ $garasi->id }}</td>
                      <td>{{ $garasi->nama_garasi }}</td>
                      <td>{{ $garasi->lokasi }}</td>
                      <td>{{ number_format($garasi->harga_sewa, 0, ',', '.') }}/Hari</td>
                      <td>{{ Str::limit($garasi->deskripsi, 50) }}</td>
                      <td>
                        <span class="badge rounded-pill 
                          @if($garasi->status == 'tersedia') bg-success 
                          @elseif($garasi->status == 'booked') bg-warning 
                          @elseif($garasi->status == 'rented') bg-danger 
                          @endif">
                          {{ ucfirst($garasi->status) }}
                        </span>
                      </td>
                      <td>
                        <a href="{{ route('admin.masterGarasi.edit', $garasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.masterGarasi.destroy', $garasi->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</button>
                        </form>
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
