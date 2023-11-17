@extends('layout.layout')
@section('title', 'Tambah Data Properti')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Properti
                    </span>
                </div>
                <div class="card-body">
                <form method="POST" action="simpan">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Lahan</label>
                                    <input type="text" class="form-control" name="nama_lahan" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Lahan</label>
                                    <input type="text" class="form-control" name="foto_lahan" />
                                </div>
                                <div class="form-group">
                                    <label>Kondisi Lahan</label>
                                    <input type="date" class="form-control" name="kondisi_lahan" />
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