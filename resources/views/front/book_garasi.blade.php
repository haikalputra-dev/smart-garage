@extends('front.layouts.body')

@section('main')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Booking Garasi</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    @if ($garasi->lokasi == 'Area A')
                    <img src="{{ asset('foto/garasi-small.jpg') }}" alt="" height="300px">
                    @elseif($garasi->lokasi == 'Area B')
                    <img src="{{ asset('foto/garasi-medium.jpg') }}" alt="" height="300px">
                    @elseif($garasi->lokasi == 'Area C')
                    <img src="{{ asset('foto/garasi-large.jpg') }}" alt="" height="300px">
                    @endif
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>{{ $garasi->nama_garasi }}</h3>
                        </div>
                        <h2>Rp. {{ number_format($garasi->harga_sewa, 0, ',', '.') }}<span>/Per malam</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Lokasi:</td>
                                    <td>{{ $garasi->lokasi }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Kapasitas:</td>
                                    @if ($garasi->lokasi == 'Area A')
                                    <td style="font-weight: bold">1 Motor</td>
                                    @elseif($garasi->lokasi == 'Area B')
                                    <td style="font-weight: bold">1 Mobil</td>
                                    @elseif($garasi->lokasi == 'Area C')
                                    <td style="font-weight: bold">2 Mobil</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="r-o">Fasilitas:</td>
                                    <td>- Smart Lock Door</td>
                                    <td>- Pendingin Ruangan</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Deskripsi:</td>
                                    <td>{{ $garasi->deskripsi }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="room-booking">
                <form action="{{ route('pesan.garasi') }}" method="POST">
                    @csrf
                    <input type="hidden" name="garasi_id" value="{{ $garasi->id }}">
                    <input type="hidden" name="renter_id" value="{{ auth()->id() }}">
                    <div class="check-date">
                        <label for="date-in">Check In:</label>
                        <input type="text" class="date-input" id="date-in" name="tanggal_mulai">
                        <i class="icon_calendar"></i>
                    </div>
                    <div class="check-date">
                        <label for="date-out">Check Out:</label>
                        <input type="text" class="date-input" id="date-out" name="tanggal_akhir">
                        <i class="icon_calendar"></i>
                    </div>
                    <button type="submit">Pesan Sekarang</button>
                </form>
            </div>
            
        </div>
    </div>
</section>
<!-- Room Details Section End -->
@endsection
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Function to format date to "DD MONTH, YYYY"
        function formatDate(date) {
            const months = [
                "JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE",
                "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"
            ];
            let day = String(date.getDate()).padStart(2, '0');
            let month = months[date.getMonth()];
            let year = date.getFullYear();
            return `${day} ${month}, ${year}`;
        }

        // Get today's date and tomorrow's date
        let today = new Date();
        let tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);

        // Set the value of the date inputs
        document.getElementById('date-in').value = formatDate(today);
        document.getElementById('date-out').value = formatDate(tomorrow);
    });
</script>
