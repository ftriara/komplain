@extends('layouts.admin')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Anda Berhasil Log in!</h5>
                            <p class="mb-4"> Selamat Datang di website Pengajuan Garansi! yuk intip data pengajuan garansi. </p>
                            <a href="{{ route('admin.dataPengajuanGaransi.index') }}" class="btn btn-sm btn-outline-primary">klik disini</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--/ Transactions -->
    </div>
</div>
@endsection
