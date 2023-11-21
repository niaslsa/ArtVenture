@extends('layout.layout')
@section('title', 'Data Properti')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#757171; font-weight: bold;">
                        Data Properti
                    </span>
                </div>

                <hr>
                <a href="/properti/tambah" style="margin-bottom: 10px">
                    <btn class="btn btn-lg btn-success mb-4">Tambah Data Properti</btn>
                </a>
                <table class="table table-hover table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>NAMA PROPERTI</th>
                            <th>KONDISI PROPERTI</th>
                            <th>FOTO PROPERTI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properti as $p)
                            <tr>
                                <td>{{ $p->nama_properti }}</td>
                                <td>{{ $p->kondisi_properti }}</td>
                                <td>
                                    @if ($p->foto_properti)
                                        <img src="{{ url('foto') . '/' . $p->foto_properti }} "
                                            style="max-width: 150px; height: auto;" />
                                    @endif
                                </td>
                                <td>

                                    <a href="properti/edit/{{ $p->id_properti }}">
                                        <btn class="btn btn-primary">EDIT</btn>
                                    </a>
                                    <a href="properti/detail/{{ $p->id_properti }}">
                                        <btn class="btn btn-warning">DETAIL</btn>
                                    </a>
                                    <btn class="btn btn-danger btnHapus" idProperti="{{ $p->id_properti }}">HAPUS</btn>
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
            let idProperti = $(this).closest('.btnHapus').attr('idProperti');
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
                        url: 'properti/hapus',
                        data: {
                            id_properti: idProperti,
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
