@extends('layout.layout')
@section('title', 'Data Berita')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#757171; font-weight: bold;">
                        Data Berita
                    </span>
                </div>

                <hr>
                <a href="/berita/tambah" style="margin-bottom: 10px">
                    <btn class="btn btn-lg btn-success mb-4">Tambah Data Berita</btn>
                </a>
                <table class="table table-hover table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>NAMA BERITA</th>
                            <th>ISI BERITA</th>
                            <th>FOTO BERITA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $l)
                            <tr>
                                <td>{{ $l->nama_berita }}</td>
                                <td>{{ $l->isi_berita }}</td>

                                <td>
                                    @if ($l->foto_berita)
                                        <img src="{{ url('foto') . '/' . $l->foto_berita }} "
                                            style="max-width: 150px; height: auto;" />
                                    @endif
                                </td>
                                <td>

                                    <a href="berita/edit/{{ $l->id_berita }}">
                                        <btn class="btn btn-primary">EDIT</btn>
                                    </a>
                                    <a href="berita/detail/{{ $l->id_berita }}">
                                        <btn class="btn btn-primary">DETAIL</btn>
                                    </a>
                                    <btn class="btn btn-danger btnHapus" idBerita="{{ $l->id_berita }}">HAPUS</btn>
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
            let idBerita = $(this).closest('.btnHapus').attr('idBerita');
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
                        url: 'berita/hapus',
                        data: {
                            id_berita: idBerita,
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
