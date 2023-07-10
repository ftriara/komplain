@extends('layouts.admin')

@section('content')

<h3>Riwayat Tindakan</h3>
<div class="table-responsive text-nowrap mt-4">
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
        <form action="{{ route('admin.dataRiwayatTindakan.store') }}" method="post">

          @foreach ($complains as $complain)
              <tr>
                
                <td>{{ $loop->iteration }}</td>
                <td><div name="id_komplain">{{ $complain->id }}</div></td>
                <td>{{ $complain->barang->nama }}</td>
                <td>{{ $complain->barang->merk->nama }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownButton" name="tindakan">
                      Diperbaiki
                    </button>
                    <ul class="dropdown-menu" data-dropdown-id="{{ $loop->iteration }}">
                      <li><a class="dropdown-item" href="javascript:void(0);" data-value="Diperbaiki" name="tindakan">Diperbaiki</a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);" data-value="Diganti Baru" name="tindakan">Diganti Baru</a></li>
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
                  {{-- <select class="form-select" autofocus>
                    <option selected name="tindakan">Pilih</option>
                    <option value="1" name="tindakan">Diperbaiki</option>
                    <option value="2" name="tindakan">Diganti Baru</option>
                  </select> --}}
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
                        <a href="" type="submit" name="submit" class="btn rounded-pill btn-primary">Simpan</a>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
        </form>
      </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
  document.addEventListener("DOMContentLoaded", function() {
      var dropdownButton = document.getElementById("dropdownButton{{ $complain->id }}");
      var dropdownItems = dropdownButton.nextElementSibling.querySelectorAll(".dropdown-item");

      dropdownItems.forEach(function(item) {
          item.addEventListener("click", function() {
              var selectedValue = item.getAttribute("data-value");
              dropdownButton.innerHTML = selectedValue;
          });
      });
  });
</script>
@endsection