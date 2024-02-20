@extends('layout.layout')
@section('title', 'Edit Data Lahan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Lahan
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="update" enctype="multipart/form-data">
                        @foreach ($lahan as $item)
                            <input type="hidden" class="form-control" name="id_lahan" value="{{ $item->id_lahan }}" />
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Id Lahan</label>
                                        <input type="text" class="form-control" name="id_lahan"
                                            value="{{ $item->id_lahan }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lahan</label>
                                        <input type="text" class="form-control" name="nama_lahan"
                                            value="{{ $item->nama_lahan }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Lahan</label>
                                        <input type="text" class="form-control" name="lokasi_lahan"
                                            value="{{ $item->lokasi_lahan }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Status Penyewaan</label>
                                        <div>
                                            @foreach ($statusPenyewaan as $option)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" style="cursor: pointer" type="radio"
                                                        id="{{ $option }}" name="penyewaan"
                                                        value="{{ $option }}"
                                                        {{ $item->penyewaan === $option ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $option }}">
                                                        {{ $option }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
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
                        @endforeach
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
