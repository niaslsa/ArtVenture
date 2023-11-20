@extends('layout.layout')
@section('title', 'Data Lahan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#757171; font-weight: bold;">
                        Data Lahan
                    </span>
                </div>

                <hr>
                <a href="/lahan/tambah" style="margin-bottom: 10px">
                    <btn class="btn btn-lg btn-success mb-4">Tambah Data Lahan</btn>
                </a>
                <table class="table table-hover table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>NAMA LAHAN</th>
                            <th>LOKASI LAHAN</th>
                            <th>FOTO LAHAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lahan as $l)
                            <tr>
                                <td>{{ $l->nama_lahan }}</td>
                                <td>{{ $l->lokasi_lahan }}</td>
                                <td>
                                    @if ($l->foto_lahan)
                                        <img src="{{ url('foto') . '/' . $l->foto_lahan }} "
                                            style="max-width: 150px; height: auto;" />
                                    @endif
                                </td>
                                <td>

                                    <a href="lahan/edit/{{ $l->id_lahan }}">
                                        <btn class="btn btn-primary">EDIT</btn>
                                    </a>
                                    <btn class="btn btn-danger btnHapus" idLahan="{{ $l->id_lahan }}">HAPUS</btn>
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
            let idLahan = $(this).closest('.btnHapus').attr('idLahan');
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
                        url: 'lahan/hapus',
                        data: {
                            id_lahan: idLahan,
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
