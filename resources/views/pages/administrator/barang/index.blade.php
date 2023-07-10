@extends('layouts.administrator')
@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Barang /</span> Barang
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">List Barang</h5>
        <div class="table-responsive text-nowrap">
            <form action="{{ route('administrator.barang.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama" class="margin-form">Nama Barang:</label>
                    <input type="text" name="nama" id="nama" class="form-control custom-input">
                    <label for="harga" class="margin-form">Harga:</label>
                    <input type="number" name="harga" id="harga" class="form-control custom-input">
                    <label for="largeSelect" class="form-label margin-form">Merk</label>
                            <select class="form-select form-select-lg custom-input" name="id_merk" id= "id_merk">
                                @foreach ($merkList as $id => $nama)
                                <option value="{{ $id }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                </div>
                <button type="submit" class="btn btn-primary custom-input">Tambah</button>
            </form>
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Merk</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <th scope="row">{{ $barang->id }}</th>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->harga }}</td>
                        <td>{{ $barang->merk->nama }}</td>
                        <td style="width: 100px;">
                            <div class="demo-inline-spacing" style="display: flex; justify-content: flex-end;">
                                <form action="{{ route('administrator.barang.update', $barang->id) }}" method="POST" id="formEdit" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">Edit</button>
                                    <!-- Create Modal -->
                                    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Edit Barang</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                ></button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Nama</label>
                                                    <input type="text" id="nameBasic" class="form-control" name="nama" placeholder="Mouse wireless" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Harga</label>
                                                    <input type="text" id="nameBasic" class="form-control" name="harga" placeholder="150000" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="nameBasic" class="form-label">Merk</label>
                                                        <select class="form-select form-select-lg" name="id_merk" id= "id_merk">
                                                            @foreach ($merkList as $id => $nama)
                                                            <option value="{{ $id }}">{{ $nama }}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" id="editSubmit" class="d-none">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="submitEdit()">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end Create Modal -->
                        </div>
                        </td>
                        <td style="width: 100px;">
                            <form action="{{ route('administrator.barang.destroy', $barang->id) }}" method="POST"> 
                                @method('DELETE')
                                @csrf
                                <div class="demo-inline-spacing" style="display: flex; justify-content: center; align-items: center;">
                                <button type="submit" class="btn btn-danger">Hapus</button>   
                                </div> 
                            </form>
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
@section('script')
<script>
    function submitCreate(){
        $('#createSubmit').click();
    }

    

    function submitEdit(){
        $('#editSubmit').click();
    }

    function submitDelete(){
        $('#deleteSubmit').click();
    }

    function submitForm(){
        document.getElementById("formEdit").submit();
    }
</script>
@endsection