@extends('layout.layout')
@section('title', 'Edit Berita')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Berita
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                            <div class="form-group">
                                    <label>Judul Berita</label>
                                    <input type="text" class="form-control" name="judul_berita" value="{{ $Berita->judul_berita }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Foto Berita</label>
                                    <input type="text" class="form-control" name="keluhan" value="{{ $berita->foto_berita }}"/>
                                </div>
                                <div class="form-group">
                                    <label>isi berita</label>
                                    <input type="date" class="form-control" name="tgl_pendaftaran" value="{{ $berita->isi_berita }}" />
                                </div>
                                @csrf
                                <div class="d-flex mt-3">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 4px;">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection