@extends('layout.layout')
@section('title', 'Detail Data Lahan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Detail Data Lahan
                    </span>
                </div>
                <div class="card-body">
                    @csrf
                    @foreach ($lahan as $item)
                        <input type="hidden" class="form-control" name="id_lahan" value="{{ $item->id_lahan }}" />
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Id Lahan</label>
                                    <input type="text" class="form-control" name="id_lahan"
                                        value="{{ $item->id_lahan }}" />
                                </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Lahan</label>
                                    <input type="text" class="form-control" name="nama_lahan"
                                        value="{{ $item->nama_lahan }}" />
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Lahan</label>
                                    <br />
                                    <input type="text" class="form-control" name="lokasi_lahan"
                                    value="{{ $item->lokasi_lahan }}" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Lahan</label>
                                    <br>
                                    <img src="{{ url('foto') . '/' . $item->foto_lahan }} "
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
