@extends('layout.layout')
@section('title', 'Data Penyewaan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#757171; font-weight: bold;">
                        Data Penyewaan
                    </span>
                </div>
                <br>
                <span class="h5">
                    Jumlah Penyewaan Yang Tercatat : {{ $jumlahPenyewaan }}
                </span>
                <div class="card-header d-flex">

                    <a href="penyewaan/cetak">
                        <button class="btn btn-primary mt-5" style="float: right">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <style>
                                    svg {
                                        fill: #ffffff
                                    }
                                </style>
                                <path
                                    d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                            </svg>Cetak PDF
                        </button>
                    </a>
                </div>

                <hr>
                <table class="table table-hover table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>ID PENYEWAAN</th>
                            <th>ID Lahan</th>
                            <th>Nama Lahan</th>
                            <th>Foto Lahan</th>
                            <th>ID Properti</th>
                            <th>Nama Properti</th>
                            <th>Foto Properti</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyewaan as $n)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $n->id_lahan ? 0 : '-' }}</td>
                                <td>{{ $n->nama_lahan }}</td>
                                <td>
                                    @if ($n->foto_lahan)
                                        <img src="{{ url('foto') . '/' . $n->foto_lahan }} "
                                            style="max-width: 250px; height: auto;" />
                                    @endif

                                <td>{{ $n->id_properti ? 0 : '-' }}</td>
                                <td>{{ $n->nama_properti }}</td>
                                <td>
                                    @if ($n->foto_properti)
                                        <img src="{{ url('foto') . '/' . $n->foto_properti }} "
                                            style="max-width: 250px; height: auto;" />
                                    @endif
                                <td>
                                    <button class="btn btn-danger btnHapus"
                                        idPenyewaan="{{ $n->id_penyewaan }}">HAPUS</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="module">
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idPenyewaan = $(this).closest('.btnHapus').attr('idPenyewaan');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'

            }).then((result) => {
                if (result.isConfirmed) {
                    //Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'penyewaan/hapus',
                        data: {
                            id_penyewaan: idPenyewaan,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
