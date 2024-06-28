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
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select class="form-select" id="lokasi" name="lokasi" required>
                                <option value="Area A">Area A</option>
                                <option value="Area B">Area B</option>
                                <option value="Area C">Area C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga_sewa" class="form-label">Harga Sewa</label>
                            <input type="number" class="form-control" id="harga_sewa" name="harga" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
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
              <button type="button" class="btn btn-warning btn-sm edit-btn" data-id="{{ $garasi->id }}" data-nama="{{ $garasi->nama_garasi }}" data-lokasi="{{ $garasi->lokasi }}" data-harga="{{ $garasi->harga_sewa }}" data-deskripsi="{{ $garasi->deskripsi }}" data-status="{{ $garasi->status }}" data-toggle="modal" data-target="#editModal">Edit</button>
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

<!-- Bootstrap Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Garasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editForm" action="{{ route('admin.masterGarasi.update', ':id') }}" method="POST">
              @csrf
              @method('PUT')
              <div class="modal-body">
                  <input type="hidden" id="editId" name="id">
                  <div class="mb-2">
                    <label class="form-label mb-0">Nama Garasi:</label>
                    <p id="displayNama" class="form-control-plaintext fw-bold text-primary mb-2"></p>
                </div>
                <div class="mb-2">
                    <label class="form-label mb-0">Lokasi:</label>
                    <p id="displayLokasi" class="form-control-plaintext fw-bold text-secondary mb-2"></p>
                </div>
                <div class="mb-2">
                    <label class="form-label mb-0">Harga Sewa:</label>
                    <p id="displayHarga" class="form-control-plaintext fw-bold text-success mb-2"></p>
                </div>
                  <div class="mb-3">
                      <label for="editDeskripsi" class="form-label">Deskripsi</label>
                      <textarea class="form-control" id="editDeskripsi" name="deskripsi" rows="3" required></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="editStatus" class="form-label">Status</label>
                      <select class="form-select" id="editStatus" name="status" required>
                          <option value="tersedia">Tersedia</option>
                          <option value="booked">Booked</option>
                          <option value="rented">Rented</option>
                      </select>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
          </form>
      </div>
  </div>
</div>


            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const lokasiSelect = document.getElementById('lokasi');
        const hargaSewaInput = document.getElementById('harga_sewa');

        const hargaSewaMap = {
            'Area A': 40000,
            'Area B': 45000,
            'Area C': 60000
        };

        lokasiSelect.addEventListener('change', function () {
            const selectedLokasi = lokasiSelect.value;
            if (hargaSewaMap[selectedLokasi] !== undefined) {
                hargaSewaInput.value = hargaSewaMap[selectedLokasi];
            } else {
                hargaSewaInput.value = '';
            }
        });

        // Trigger change event to set initial value
        lokasiSelect.dispatchEvent(new Event('change'));
    });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const editBtns = document.querySelectorAll('.edit-btn');

      editBtns.forEach(btn => {
          btn.addEventListener('click', function () {
              // Populate modal with data from the clicked row
              const id = btn.getAttribute('data-id');
              const nama = btn.getAttribute('data-nama');
              const lokasi = btn.getAttribute('data-lokasi');
              const harga = btn.getAttribute('data-harga');
              const deskripsi = btn.getAttribute('data-deskripsi');
              const status = btn.getAttribute('data-status');

              document.getElementById('editId').value = id;
              document.getElementById('displayNama').innerText = nama;
              document.getElementById('displayLokasi').innerText = lokasi;
              document.getElementById('displayHarga').innerText = harga;
              document.getElementById('editDeskripsi').value = deskripsi;
              document.getElementById('editStatus').value = status;

              // Update form action with the correct id
              const editForm = document.getElementById('editForm');
              editForm.action = editForm.action.replace(':id', id);

              // Optional: You may want to reset validation classes/state if using Bootstrap validation
              editForm.classList.remove('was-validated');

              // Show modal
              const modal = new bootstrap.Modal(document.getElementById('editModal'));
              modal.show();
          });
      });
  });
</script>
@endsection
