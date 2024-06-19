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
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{ $staff->id }}</td>
                                    <td>{{ $staff->nama }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->role }}</td>
                                    <td>
                                        <!-- Example of edit and delete buttons -->
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
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

</main><!-- End #main -->
@endsection