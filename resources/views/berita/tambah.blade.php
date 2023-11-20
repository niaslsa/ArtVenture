@extends('layout.layout')
@section('title', 'Tambah Data Berita')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Berita
                    </span>
                </div>
                <div class="card-body">
                <form method="POST" action="simpan">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Jenis Berita</label>
                                    <input type="text" class="form-control" name="jenis_berita" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Berita</label>
                                    <input type="text" class="form-control" name="foto_berita" />
                                </div>
                                <div class="form-group">
                                    <label>Isi Berita</label>
                                    <input type="date" class="form-control" name="isi_berita" />
                                </div>
                                    @endforeach
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