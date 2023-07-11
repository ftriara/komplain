@extends('layouts.pembeli')

@section('container')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Petugas /</span> Edit Petugas
    </h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                        @if ($errors->any())
                        <h1 class="fw-bold" style="font-size: large;color: red;margin-bottom: 25px;">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                            @endforeach
                        </h1>
                        @endif
                    <form action="updatePetugas{{$petugas->id}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2 mb-3">
                            <label for="text" class="form-label">Nama</label>
                            <input class="form-control" name="nama" id="nama" value="{{ $petugas -> nama}}">
                            </input>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
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