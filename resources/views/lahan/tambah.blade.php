@extends('layout.layout')
@section('title', 'Tambah Data Lahan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Lahan
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        {{-- <label>ID Lahan</label>
                                        <input type="text" class="form-control" name="id_lahan"/>
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Nama Lahan</label>
                                        <input type="text" class="form-control" name="nama_lahan"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Lahan</label>
                                        <input type="text" class="form-control" name="lokasi_lahan" />
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Lahan</label>
                                        <input type="file" class="form-control" name="foto_lahan" />
                                    </div>

                                    @csrf
                                    <div class="d-flex mt-3">
                                        <button type="submit" class="btn btn-primary"
                                            style="margin-right: 4px;">SIMPAN</button>
                                        <a href="#" onclick="window.history.back();"
                                            class="btn btn-success">KEMBALI</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                    {{-- @endforeach --}}
                </div>

            </div>
        </div>
    </div>
@endsection
