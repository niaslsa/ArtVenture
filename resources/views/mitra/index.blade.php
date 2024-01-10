@extends('layout.layout')
@section('title', 'Data Mitra')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#757171; font-weight: bold;">
                        Data Mitra
                    </span>
                </div>

                <hr>
                <a href="/mitra/tambah" style="margin-bottom: 10px">
                    <button class="btn btn-lg btn-success mb-4">Tambah Data Mitra</button>
                </a>
                <table class="table table-hover table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>NAMA MITRA</th>
                            <th>FOTO MITRA</th>
                            <th>BISNIS MITRA</th>
                            <th>KONTAK MITRA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mitra as $l)
                            <tr>
                                <td>{{ $l->nama_mitra }}</td>
                                <td>
                                    @if ($l->foto_mitra)
                                        <img src="{{ url('foto') . '/' . $l->foto_mitra }} "
                                            style="max-width: 150px; height: auto;" />
                                    @endif
                                </td>
                                <td>{{ $l->bisnis_mitra }}</td>
                                <td>{{ $l->kontak_mitra }}</td>
                                <td>

                                    <a href="mitra/edit/{{ $l->id_mitra }}">
                                        <button class="btn btn-primary">EDIT</button>
                                    </a>
                                    <a href="mitra/detail/{{ $l->id_mitra }}">
                                        <button class="btn btn-primary">DETAIL</button>
                                    </a>
                                    <button class="btn btn-danger btnHapus" idMitra="{{ $l->id_mitra }}">HAPUS</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">


        </div>
        <div class="card-footer">

        </div>
    </div>
    </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idMitra = $(this).closest('.btnHapus').attr('idMitra');
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
                        url: 'mitra/hapus',
                        data: {
                            id_mitra: idMitra,
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
