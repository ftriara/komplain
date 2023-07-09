@extends('layouts.manager')
@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Barang /</span> Barang
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">List Barang</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Komplain</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complains as $complain)
                    <tr>
                        <th scope="row">{{ $complain->id }}</th>
                        <td>{{ $complain->nama }}</td>
                        <td>{{ $complain->jumlah_complain }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection