@extends('layouts.admin')

@section('content')

<h3>Riwayat Pengajuan</h3>
<div>
    <table class="table table-striped table-dark table-bordered text-center">
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
                <td><img src="{{ asset('storage/foto/'. $complain->foto) }}" width="100"></td>

                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle"
                            data-dropdown-id="{{ $complain->id }}">{{ $complain->status }}</button>
                        <ul class="dropdown-menu" data-dropdown-id="{{ $complain->id }}">
                            <li><a class="dropdown-item{{ $complain->status === 'Pending' ? ' active' : '' }}"
                                    href="javascript:void(0);" data-value="Pending">Pending</a></li>
                            <li><a class="dropdown-item{{ $complain->status === 'Diterima' ? ' active' : '' }}"
                                    href="javascript:void(0);" data-value="Diterima">Diterima</a></li>
                            <li><a class="dropdown-item{{ $complain->status === 'Ditolak' ? ' active' : '' }}"
                                    href="javascript:void(0);" data-value="Ditolak">Ditolak</a></li>
                            <li><a class="dropdown-item{{ $complain->status === 'Dikerjakan' ? ' active' : '' }}"
                                    href="javascript:void(0);" data-value="Dikerjakan">Dikerjakan</a></li>
                            <li><a class="dropdown-item{{ $complain->status === 'Selesai' ? ' active' : '' }}"
                                    href="javascript:void(0);" data-value="Selesai">Selesai</a></li>
                            <li><a class="dropdown-item{{ $complain->status === 'Diambil' ? ' active' : '' }}"
                                    href="javascript:void(0);" data-value="Diambil">Diambil</a></li>
                        </ul>
                    </div>
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
    $(document).ready(function () {
        $('.dropdown-toggle').on('click', function (e) {
            var dropdownId = $(this).data('dropdown-id');
            var dropdownMenu = $('.dropdown-menu[data-dropdown-id="' + dropdownId + '"]');
            dropdownMenu.toggleClass('show');
        });

        $('.dropdown-item').on('click', function (e) {
            e.stopPropagation();
            var value = $(this).data('value');
            var dropdownId = $(this).closest('.dropdown-menu').data('dropdown-id');
            var dropdownButton = $('.btn[data-dropdown-id="' + dropdownId + '"]');
            dropdownButton.html(value);

            var complainId = dropdownId;
            var newStatus = value;

            $.ajax({
                url: '{{ route('admin.complain.updateStatus') }}',
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

        $(document).on('click', function (e) {
            if (!$('.dropdown-toggle').is(e.target) && $('.dropdown-toggle').has(e.target).length === 0 && $('.show').has(
                    e.target).length === 0) {
                $('.dropdown-menu').removeClass('show');
            }
        });
    });
</script>
@endsection
