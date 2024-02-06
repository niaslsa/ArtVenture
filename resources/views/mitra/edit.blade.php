@extends('layout.layout')
@section('title', 'Edit Data Mitra')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Mitra
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        @foreach ($mitra as $item)
                        <input type="hidden" class="form-control" name="id_mitra" value="{{ $item->id_mitra }}" />
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nama Mitra</label>
                                        <input type="text" class="form-control" name="nama_mitra" value="{{ $item->nama_mitra }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Foto mitra</label>
                                        <input type="file" class="form-control" name="foto_mitra" />
                                    </div>
                                    <div class="form-group">
                                        <label>Bisnis Mitra</label>
                                        <input type="text" class="form-control" name="bisnis_mitra" value="{{ $item->bisnis_mitra }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Kontak Mitra</label>
                                        <input type="text" class="form-control" name="kontak_mitra" value="{{ $item->kontak_mitra }}" />
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
                    {{-- @endforeach --}}
                </div>

            </div>
        </div>
    </div>
@endsection
