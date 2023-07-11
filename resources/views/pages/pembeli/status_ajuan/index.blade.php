@extends('layouts.pembeli')
@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Status Pengajuan /</span> Status Pengajuan
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">status Ajuan Garansi</h5>
        <div class="table-responsive text-center">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>No</th>
                        <th>Merk</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Tanggal Pembelian</th>
                        <th>Batas Garansi</th>
                        <th>Keluhan</th>
                        <th>Bukti Struk</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complains as $complain)
                    <tr>
                        <th scope="row">{{ $complain->id }}</th>
                        <td>{{ $complain->barang->merk->nama }}</td>
                        <td>{{ $complain->barang->nama }}</td>
                        <td>Rp{{ $complain->barang->harga }}</td>
                        <td>{{ $complain->tanggal_pembelian }}</td>
                        <td>{{ $complain->batas_garansi }}</td>
                        <td>{{ $complain->keluhan }}</td>
                        <td><img src="{{ asset('storage/foto/'. $complain->foto) }}" width="100"></td>
                        <td>
                            {{ $complain->status }}
                            @if ($complain->status == 'Selesai')
                                <p style="color: green; font-weight:bold">Diambil tanggal: {{ $historis->where('id_komplain', $complain->id)->last()->tanggal_selesai }}</p>
                            @elseif ($complain->status == 'Diambil')
                                <p style="color: green; font-weight:bold">Diambil tanggal: {{ $complain->updated_at->format('Y-m-d') }}</p>
                            @elseif ($complain->status == 'Ditolak')
                                <p style="color: red; font-weight:bold">Diambil tanggal: {{ $complain->updated_at->format('Y-m-d') }}</p>
                            @else
                                <p style="color: red; font-weight:bold">Belum dapat diambil</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection