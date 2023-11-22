@extends('layout.layout')
@section('title', 'Detail Data Penyewaan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Detail Data Penyewaan
                    </span>
                </div>
                <div class="card-body">
                    @csrf
                    @foreach ($penyewaan as $item)
                        <input type="hidden" class="form-control" name="id_penyewaan" value="{{ $item->id_penyewaan }}" />
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Id Penyewaan</label>
                                    <input type="text" class="form-control" name="id_penyewaan"
                                        value="{{ $item->id_penyewaan }}" />
                                </div>
                                <div class="form-group">
                                    <label>Waktu Penyewaan</label>
                                    <br />
                                    <input type="text" class="form-control" name="waktu_penyewaan"
                                    value="{{ $item->waktu_penyewaan }}" />
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
