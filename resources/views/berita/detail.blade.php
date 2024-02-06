@extends('layout.layout')
@section('title', 'Detail Data Berita')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Detail Data Berita
                    </span>
                </div>
                <div class="card-body">
                    @csrf
                    @foreach ($berita as $item)
                        <input type="hidden" class="form-control" name="id_berita" value="{{ $item->id_berita }}" />
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Berita</label>
                                    <input type="text" class="form-control" name="nama_berita"
                                        value="{{ $item->nama_berita }}" />
                                </div>
                                <div class="form-group">
                                    <label>Isi Berita</label>
                                    <input type="text" class="form-control" name="isi_berita"
                                        value="{{ $item->isi_berita }}" />
                                </div>
                               
                                <div class="form-group">
                                    <label>Foto Berita</label>
                                    <br>
                                    <img src="{{ url('foto') . '/' . $item->foto_berita }} "
                                        style="max-width: 100px; height: auto;" alt="Profile" />
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection