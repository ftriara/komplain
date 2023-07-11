@extends('layouts.admin')
@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Riwayat Tindakan /</span> Tindakan
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Data Riwayat Tindakan</h5>
        <div class="table text-center">
            <table class="table">
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
                  <form action="/admin/dataRiwayatTindakan" method="POST">
                    @csrf
                    @foreach ($complains as $complain)
                      <tr>
                        
                        <td>{{ $loop->iteration }}</td>
                        <td><input type="hidden" name="id_komplain" value="{{ $complain->id }}">{{ $complain->id }}</td>
                        <td>{{ $complain->barang->nama }}</td>
                        <td>{{ $complain->barang->merk->nama }}</td>
                        <td>
                          {{-- <div class="btn-group"> --}}
                            {{-- <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownButton" name="tindakan">
                              Diperbaiki
                            </button>
                            <ul class="dropdown-menu"> --}}
                            {{-- <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownButton"
                                  data-dropdown-id="{{ $complain->id }}">Diperbaiki</button>
                              <ul class="dropdown-menu" data-dropdown-id="{{ $complain->id }}">
                                <li><a class="dropdown-item" href="javascript:void(0);" data-value="Diperbaiki" name="tindakan">Diperbaiki</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);" data-value="Diganti Baru" name="tindakan">Diganti Baru</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);" data-value="Diserahkan ke Admin" name="tindakan">Diserahkan ke Admin</a></li>
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
                          </script> --}}
                          <select class="form-select btn btn-secondary" name="tindakan">
                              @if ($historis->where('id_komplain', $complain->id)->last() == null)
                                <option selected>Diperbaiki</option>
                                <option value="Diganti Baru">Diganti Baru</option>
                                <option value="Diserahkan ke Admin">Diserahkan ke Admin</option>
                              @elseif ($historis->where('id_komplain', $complain->id)->last()->tindakan == 'Diganti Baru')
                                <option selected>{{ $historis->where('id_komplain', $complain->id)->last()->tindakan }}</option>
                                <option value="Diperbaiki">Diperbaiki</option>
                                <option value="Diserahkan ke Admin">Diserahkan ke Admin</option>
                              @elseif($historis->where('id_komplain', $complain->id)->last()->tindakan == 'Diperbaiki')
                                <option selected>{{ $historis->where('id_komplain', $complain->id)->last()->tindakan }}</option>
                                <option value="Diganti Baru">Diganti Baru</option>
                                <option value="Diserahkan ke Admin">Diserahkan ke Admin</option>
                              @elseif($historis->where('id_komplain', $complain->id)->last()->tindakan == 'Diserahkan ke Admin')
                                <option selected>{{ $historis->where('id_komplain', $complain->id)->last()->tindakan }}</option>
                                <option value="Diganti Baru">Diganti Baru</option>
                                <option value="Diserahkan ke Admin">Diperbaiki</option>
                              @endif
                          </select>
                        </td>
                        <td>
                          <div class="col-md-10">
                              @if ($historis->where('id_komplain', $complain->id)->last() == null)
                                <input class="form-control" type="date" value="2023-07-11" id="tanggal_tindakan" name="tanggal_tindakan" />   
                              @else
                                <input class="form-control" type="date" value="{{ $historis->where('id_komplain', $complain->id)->last()->tanggal_tindakan }}" id="tanggal_tindakan" name="tanggal_tindakan" />
                              @endif
                          </div>
                        </td>
                        <td>
                          <div class="col-md-10">
                            @if ($historis->where('id_komplain', $complain->id)->last() == null)
                              <input class="form-control" type="date" value="2023-07-11" id="tanggal_selesai" name="tanggal_selesai" />   
                            @else
                              <input class="form-control" type="date" value="{{ $historis->where('id_komplain', $complain->id)->last()->tanggal_tindakan }}" id="tanggal_selesai" name="tanggal_selesai" />
                            @endif
                          </div>
                        </td>
                        <td>
                          <div class="mt-2 mb-3">
                              
                              <select class="form-select form-select-lg" name="id_petugas" id="id_petugas">
                                @if ($historis->where('id_komplain', $complain->id)->last() == null)
                                  <option selected></option>   
                                @else
                                  <option selected>{{ $historis->where('id_komplain', $complain->id)->last()->id_petugas }}</option>
                                @endif
                                  @foreach ($petugasList as $id => $nama)
                                      <option value="{{ $id }}">{{ $nama }}</option>
                                  @endforeach
                              </select>
                          </div>
                        </td>
                        <td>
                          <button type="submit" name="submit" class="btn rounded-pill btn-primary"> Simpan</button>
                        </td>
                      </tr>
                      @endforeach
                  </form>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection

@section('script')
{{-- <script>
  // document.addEventListener("DOMContentLoaded", function() {
  //     var dropdownButton = document.getElementById("dropdownButton{{ $complain->id }}");
  //     var dropdownItems = dropdownButton.nextElementSibling.querySelectorAll(".dropdown-item");

  //     dropdownItems.forEach(function(item) {
  //         item.addEventListener("click", function() {
  //             var selectedValue = item.getAttribute("data-value");
  //             dropdownButton.innerHTML = selectedValue;
  //         });
  //     });
  // });

  $('.dropdown-item').on('click', function (e) {
            e.stopPropagation();
            var value = $(this).data('value');
            var dropdownId = $(this).closest('.dropdown-menu').data('dropdown-id');
            var dropdownButton = $('.btn[data-dropdown-id="' + dropdownId + '"]');
            dropdownButton.html(value);

            var complainId = dropdownId;
            var newStatus = value;

            $.ajax({
                url: '{{ route('admin.dataRiwayatTindakan.store') }}',
                type: 'POST',
                data: {
                    complainId: complainId,
                    newStatus: newStatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log('Status berhasil diperbarui');
                },
                error: function (xhr, status, error) {
                    console.log('Terjadi kesalahan: ' + error);
                }
            });
        });
</script> --}}

@endsection