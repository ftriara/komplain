@extends('layouts.manager')
@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-0">
        <span class="text-muted fw-light">Manager /</span> Tindakan By Petugas
    </h4>
    <!-- Search -->
    <form action="{{ route('manager.ComplainByPetugas.index') }}" method="post" autocomplete="off" >
        @method('GET')
        @csrf
        <div class="md-form md-outline input-with-post-icon datepicker mb-3">
            <input type="text" id='daterange' name="daterange" value="{{ $start }} - {{ $end }}" class='p-1'>
            <button type='submit' class="btn btn-primary p-1 mx-1">Search</button>
        </div>
    </form>
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">List Petugas</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>Petugas</th>
                        <th>Jumlah Tindakan</th>
                        <th>Rerata Waktu Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complains as $complain)
                    <tr>
                        <th>{{ $complain->nama_petugas }}</th>
                        <td>{{ $complain->jumlah_tindakan }}</td>
                        <td>{{ $complain->rerata }} HARI</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
    <!-- Grafik -->
    <div class="card mt-4">
        <h5 class="card-header">Grafik Rerata Waktu Tindakan</h5>
        <div class="card-body">
            <canvas id="complainChart"></canvas>
        </div>
    </div>
    <!--/ Grafik -->
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        
        var complains = @json($complains);

        var labels = complains.map(function (complain) {
            return complain.nama_petugas;
        });

        var data = complains.map(function (complain) {
            return complain.rerata;
        });

        var ctx = document.getElementById('complainChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Rerata Waktu Tindakan (Hari)',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    });
</script>
@endsection