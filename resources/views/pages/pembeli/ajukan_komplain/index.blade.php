@extends('layouts.pembeli')

@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Ajukan Komplain/</span> Ajukan Komplain
    </h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('pembeli.ajukan_komplain.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2 mb-3">
                            <label for="largeSelect" class="form-label">Nama Barang</label>
                            <select class="form-select form-select-lg" name="id_barang_merk" id="id_barang_merk">
                                @foreach ($merkList as $id => $merk) 
                                    @foreach ($barangList as $id => $nama)
                                        <option value="{{ $id }}">{{ $nama }}&nbsp-&nbsp{{ $merk }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Pembelian</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" value="2021-06-18" id="tanggal_pembelian"
                                    name="tanggal_pembelian" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Batas Garansi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" value="2021-06-18" id="batas_garansi"
                                    name="batas_garansi" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Keluhan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="keluhan" placeholder="kabelnya putus"
                                    name="keluhan" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Bukti Struk</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                    <!--<button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04">Upload</button>-->
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Basic with Icons -->
    </div>
</div>

@endsection