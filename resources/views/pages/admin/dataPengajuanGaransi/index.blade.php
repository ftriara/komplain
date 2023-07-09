@extends('layouts.admin')

@section('content')

<h3>Riwayat Tindakan</h3>
<div >
    <table class="table table-striped table-dark table-bordered">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Merk</th>
          <th scope="col">Nama Pembeli</th>
          <th scope="col">Tanggal Pembelian</th>
          <th scope="col">Batas Garansi</th>
          <th scope="col">Keluhan</th>
          <th scope="col">Foto</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @foreach ($complains as $complain)
            <tr>
            <td>{{ $complain->id }}</td>
            <td>{{ $complain->barang->nama }}</td>
            <td>{{ $complain->barang->merk->nama }}</td>
            <td>{{ $complain->user->name }}</td>
            <td>{{ $complain->tanggal_pembelian }}</td>
            <td>{{ $complain->batas_garansi }}</td>
            <td>{{ $complain->keluhan }}</td>
            <td>{{ $complain->foto }}</td>
            
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownButton">{{ $complain->status }}</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item{{ $complain->status === 'Pending' ? ' active' : '' }}" href="javascript:void(0);" data-value="Pending">Pending</a></li>
                  <li><a class="dropdown-item{{ $complain->status === 'Diterima' ? ' active' : '' }}" href="javascript:void(0);" data-value="Diterima">Diterima</a></li>
                  <li><a class="dropdown-item{{ $complain->status === 'Ditolak' ? ' active' : '' }}" href="javascript:void(0);" data-value="Ditolak">Ditolak</a></li>
                  <li><a class="dropdown-item{{ $complain->status === 'Dikerjakan' ? ' active' : '' }}" href="javascript:void(0);" data-value="Dikerjakan">Dikerjakan</a></li>
                  <li><a class="dropdown-item{{ $complain->status === 'Selesai' ? ' active' : '' }}" href="javascript:void(0);" data-value="Selesai">Selesai</a></li>
                  <li><a class="dropdown-item{{ $complain->status === 'Diambil' ? ' active' : '' }}" href="javascript:void(0);" data-value="Diambil">Diambil</a></li>
                </ul>
              </div>
              
              <script>
                document.addEventListener("DOMContentLoaded", function() {
                  var dropdownButton = document.getElementById("dropdownButton");
                  var dropdownItems = document.querySelectorAll(".dropdown-item");
              
                  dropdownItems.forEach(function(item) {
                    item.addEventListener("click", function() {
                      dropdownButton.innerHTML = item.getAttribute("data-value");
                    });
                  });
                });
              </script>
            
            </td>
              
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var status = "{{ $complain->status }}"; // Ambil nilai status dari variabel PHP

    // Set status dropdown sesuai dengan nilai status
    $('#status-dropdown').find('.dropdown-item').each(function() {
      if ($(this).data('status') === status) {
        $(this).addClass('active');
        $(this).closest('.btn-group').find('.btn-info').text(status);
      }
    });
  });
</script>

@endsection
