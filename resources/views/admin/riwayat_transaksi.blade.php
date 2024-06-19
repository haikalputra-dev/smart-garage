@extends('admin.layouts.body')
@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Garasi</h1>
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
              <h5 class="card-title">Garasi</h5>
              <p>Mengelola Garasi</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Ext.</th>
                    <th>City</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                    <th>Completion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Unity Pugh</td>
                    <td>9958</td>
                    <td>Curicó</td>
                    <td>2005/02/11</td>
                    <td>37%</td>
                  </tr>
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