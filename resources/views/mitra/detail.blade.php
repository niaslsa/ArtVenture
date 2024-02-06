@extends('layout.layout')
@section('title', 'Detail Data Mitra')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Detail Data Mitra
                    </span>
                </div>
                <div class="card-body">
                    @csrf
                    @foreach ($mitra as $item)
                        <input type="hidden" class="form-control" name="id_mitra" value="{{ $item->id_mitra }}" />
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Mitra</label>
                                    <input type="text" class="form-control" name="nama_mitra"
                                        value="{{ $item->nama_mitra }}" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Mitra</label>
                                    <br>
                                    <img src="{{ url('foto') . '/' . $item->foto_mitra }} "
                                        style="max-width: 100px; height: auto;" alt="Profile" />
                                </div>
                                <div class="form-group">
                                    <label>Bisnis Mitra</label>
                                    <input type="text" class="form-control" name="bisnis_mitra"
                                        value="{{ $item->bisnis_mitra }}" />
                                </div>
                                <div class="form-group">
                                    <label>Kontak Mitra</label>
                                    <input type="text" class="form-control" name="kontak_mitra"
                                        value="{{ $item->kontak_mitra }}" />
</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection