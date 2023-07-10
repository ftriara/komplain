@extends('layouts.administrator')
@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Merk /</span> Merk
    </h4>

    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Merk</h5>
        <div class="table-responsive text-nowrap">
            <form action="{{ route('administrator.merk.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama" class="margin-form">Nama Merk :</label>
                    <input type="text" name="nama" id="nama" class="form-control custom-input">
                    <button type="submit" class="btn btn-primary custom-input">Tambah</button>
                </div>
                
            </form>
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>Id</th>
                        <th>Nama Merk</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merks as $merk)
                    <tr>
                        <th  scope="row">{{ $merk->id }}</th>
                        <td>{{ $merk->nama }}</td>
                        <td style="width: 100px;">
                            <div class="demo-inline-spacing" style="display: flex; justify-content: flex-end; align-items: center;">
                                <button type="button" class="btn btn-primary custom-size" data-bs-toggle="modal" data-bs-target="#basicModal{{ $merk->id }}">Edit</button>
                                <!-- Create Modal -->
                                <div class="modal fade" id="basicModal{{ $merk->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Edit Merk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameBasic{{ $merk->id }}" class="form-label">Nama</label>
                                                        <input type="text" id="nameBasic{{ $merk->id }}" class="form-control" name="nama" placeholder="Enter Name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="submitEdit('{{ $merk->id }}')">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Create Modal -->
                                <form action="{{ route('administrator.merk.update', $merk->id) }}" method="POST" class="form-edit d-none" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" id="namaEdit{{ $merk->id }}" name="nama" class="d-none">
                                    <input type="submit" id="editSubmit{{ $merk->id }}" class="d-none">
                                </form>
                            </div>
                        </td>
                        
                        <td style="width: 100px;">
                            <form action="{{ route('administrator.merk.destroy', $merk->id) }}" method="POST">        
                                @method('DELETE')
                                @csrf
                                <div class="demo-inline-spacing" >
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

    function submitEdit(id) {
        var nama = document.getElementById("nameBasic" + id).value;
        document.getElementById("namaEdit" + id).value = nama;
        document.getElementById("editSubmit" + id).click();
    }

    function submitDelete(){
        $('#deleteSubmit').click();
    }

    function submitForm(){
        document.getElementById("formEdit").submit();
    }

    
</script>
@endsection