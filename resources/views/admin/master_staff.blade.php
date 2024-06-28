@extends('admin.layouts.body')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Staff</h1>
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
                        <h5 class="card-title">Staff</h5>
                        <p>Mengelola Data Staff</p>

                        <!-- Add Staff Button -->
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahStaffModal">
                            Tambah Staff
                        </button>

                        <!-- Modal for Add Staff -->
                        <div class="modal fade" id="tambahStaffModal" tabindex="-1" aria-labelledby="tambahStaffModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahStaffModalLabel">Tambah Staff</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="tambahStaffForm" action="{{ route('admin.masterStaff.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Staff</label>
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
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role</label>
                                                <select class="form-select" id="role" name="role" required>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Staff" selected>Staff</option>
                                                    <option value="Pengguna">Pengguna</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table with staff data -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Staff</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{ $staff->id }}</td>
                                    <td>{{ $staff->nama }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>
                                        <!-- Example of edit and delete buttons -->
                                        <button type="button" class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#basicModal" data-id={{ $staff->id }} data-nama={{ $staff->nama }} data-email={{ $staff->email }}>
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.masterStaff.destroy', $staff->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with staff data -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" action="{{ route('admin.masterStaff.update', ':id') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-2">
                          <label class="form-label mb-0">Nama Staff:</label>
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
</main><!-- End #main -->
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