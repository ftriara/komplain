@extends('layouts.admin')

@section('content')

<h3>Riwayat Tindakan</h3>
<div class="table-responsive text-nowrap">
    <table class="table table-striped table-dark table-bordered">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Id Komplain</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Merk</th>
          <th scope="col">Tindakan</th>
          <th scope="col">Mulai Diperbaiki</th>
          <th scope="col">Estimasi Selesai</th>
          <th scope="col">Nama Petugas</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @foreach ($complains as $complain)
            <tr>
              
              <td>{{ $complain->id }}</td>
              <td>{{ $complain->id }}</td>
              <td>{{ $complain->barang->nama }}</td>
              <td>{{ $complain->barang->merk->nama }}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownButton">
                    Diperbaiki
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);" data-value="Diperbaiki">Diperbaiki</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" data-value="Diganti Baru">Diganti Baru</a></li>
                  </ul>
                </div>
                <script>
                  document.addEventListener("DOMContentLoaded", function() {
                    var dropdownButton = document.getElementById("dropdownButton");
                    var dropdownItems = document.querySelectorAll(".dropdown-item");
                
                    dropdownItems.forEach(function(item) {
                      item.addEventListener("click", function() {
                        var selectedValue = item.getAttribute("data-value");
                        dropdownButton.innerHTML = selectedValue;
                      });
                    });
                  });
                </script>
              </td>
              <td>
                <div class="col-md-10">
                  <input class="form-control" type="date" value="2021-06-18" id="tanggal_tindakan" name="tanggal_tindakan"/>   
                </div>
              </td>
              <td>
                <div class="col-md-10">
                  <input class="form-control" type="date" value="2021-06-18" id="tanggal_selesai" name="tanggal_selesai"/>   
                </div>
              </td>
              <td>
                <div class="mt-2 mb-3">
                    
                    <select class="form-select form-select-lg" name="id_petugas" id="id_petugas">
                        @foreach ($petugasList as $id => $nama)
                            <option value="{{ $id }}">{{ $nama }}</option>
                        @endforeach
                    </select>
                </div>
            </td>
              <td>
                <div class="card-body">
                  <div class="demo-inline-spacing">
                    <button type="button" class="btn rounded-pill btn-primary">Simpan</button>
                  </div>
                </div>
              </td>
            </tr>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection