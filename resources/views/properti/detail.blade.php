@extends('layout.layout')
@section('title', 'Detail Data Properti')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Detail Data Properti
                    </span>
                </div>
                <div class="card-body">
                    @csrf
                    @foreach ($properti as $item)
                        <input type="hidden" class="form-control" name="id_properti" value="{{ $item->id_properti }}" />
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Id Properti</label>
                                    <input type="text" class="form-control" name="id_properti"
                                        value="{{ $item->id_properti }}" />
                                </div>
                                <div class="form-group">
                                    <label>Nama Properti</label>
                                    <input type="text" class="form-control" name="nama_properti"
                                        value="{{ $item->nama_properti }}" />
                                </div>
                                <div class="form-group">
                                    <label>Kondisi Properti</label>
                                    <br />
                                    <input type="radio" id="baik"
                                        {{ $item->kondisi_properti == 'Baik' ? 'checked' : '' }} name="kondisi_properti"
                                        value="Baik" />
                                    <label for="baik">Baik</label>
                                    <input type="radio" id="buruk"
                                        {{ $item->kondisi_properti == 'Buruk' ? 'checked' : '' }} name="kondisi_properti"
                                        value="Buruk" />
                                    <label for="buruk">Buruk</label>
                                </div>
                                <div class="form-group">
                                    <label>Foto Properti</label>
                                    <br>
                                    <img src="{{ url('foto') . '/' . $item->foto_properti }} "
                                        style="max-width: 200px; height: auto;" alt="Profile" />
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
