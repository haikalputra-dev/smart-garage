@extends('admin.layouts.body')
@section('main')
<script>
  function updateLogs() {
      $.ajax({
          type: "GET",
          url: "{{ route('logs.fetch') }}",
          cache: false,
          success: function(response) {
              let logTableBody = $('#log-table-body');
              logTableBody.empty(); // Clear the current content
              
              response.forEach((log, index) => {
                  logTableBody.append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${log.status}</td>
                          <td>${log.formatted_date}</td>
                      </tr>
                  `);
              });
          }
      });
  }

  // Update logs every 5 seconds (5000 milliseconds)
  setInterval(updateLogs, 5000);

  // Initial load
  updateLogs();
</script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Log Garasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Log Garasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Garasi B0001</h5>
              <p>Log Data Garasi</p>


    <!-- Table with stripped rows -->
    <table class="table datatable">
      <thead>
          <tr>
              <th>#</th>
              <th>Status</th>
              <th>Waktu</th>
          </tr>
      </thead>
      <tbody id="log-table-body">
          {{-- @foreach ($logs as $log)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $log->status }}</td>
              <td>{{ $log->created_at }}</td>
          </tr>
          @endforeach --}}
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
