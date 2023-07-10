@extends('layouts.manager')
@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Barang /</span> Barang
    </h4>
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">List Komplain</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>ID</th>
                        <th>Nama Merk</th>
                        <th>Jumlah Komplain</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complains as $complain)
                    <tr>
                        <th scope="row">{{ $complain->id }}</th>
                        <td>{{ $complain->nama_merk }}</td>
                        <td>{{ $complain->jumlah_complain }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
    <!-- Grafik -->
    <div class="card mt-4">
        <h5 class="card-header">Grafik Jumlah Komplain per Merk</h5>
        <div class="card-body">
            <canvas id="complainChart"></canvas>
        </div>
    </div>
    <!--/ Grafik -->
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var complains = @json($complains);

        var labels = complains.map(function (complain) {
            return complain.nama_merk;
        });

        var data = complains.map(function (complain) {
            return complain.jumlah_complain;
        });

        var ctx = document.getElementById('complainChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Komplain',
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