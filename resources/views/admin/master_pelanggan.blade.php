@extends('admin.layouts.body')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data pelanggan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Master</li>
                <li class="breadcrumb-item active">Pelanggan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pelanggan</h5>
                        <p>Mengelola Data pelanggan</p>

                        <!-- Add pelanggan Button -->
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPelangganModal">
                            Tambah Pelanggan
                        </button>

                        <!-- Modal for Add pelanggan -->
                        <div class="modal fade" id="tambahPelangganModal" tabindex="-1" aria-labelledby="tambahPelangganModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahPelangganModalLabel">Tambah Pelanggan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="tambahPelangganForm" action="{{ route('admin.masterPelanggan.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Pelanggan</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table with pelanggan data -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama pelanggan</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $pelanggan)
                                <tr>
                                    <td>{{ $pelanggan->id }}</td>
                                    <td>{{ $pelanggan->nama }}</td>
                                    <td>{{ $pelanggan->email }}</td>
                                    <td>
                                        <!-- Example of edit and delete buttons -->
                                    <button type="button" class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#basicModal" data-id={{ $pelanggan->id }} data-nama={{ $pelanggan->nama }} data-email={{ $pelanggan->email }}>
                                        Edit
                                    </button>
                                        <form action="{{ route('admin.masterPelanggan.destroy', $pelanggan->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with pelanggan data -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" action="{{ route('admin.masterPelanggan.update', ':id') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-2">
                      <label class="form-label mb-0">Nama Pelanggan:</label>
                      <p id="displayNama" class="form-control-plaintext fw-bold text-primary mb-2"></p>
                  </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
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

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const editBtns = document.querySelectorAll('.edit-btn');
  
        editBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                // Populate modal with data from the clicked row
                const id = btn.getAttribute('data-id');
                const nama = btn.getAttribute('data-nama');
                const email = btn.getAttribute('data-email');
  
                document.getElementById('editId').value = id;
                document.getElementById('displayNama').innerText = nama;
                document.getElementById('editEmail').value = email;
  
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