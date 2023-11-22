@extends('layout.layout')
@section('title', 'Edit Data Penyewaan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Penyewaan
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="update" enctype="multipart/form-data">
                        @foreach ($penyewaan as $item)
                        <input type="hidden" class="form-control" name="id_penyewaan" value="{{ $item->id_penyewaan }}" />
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Id Penyewaan</label>
                                        <input type="text" class="form-control" name="id_penyewaan" value="{{ $item->id_penyewaan }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Penyewaan</label>
                                        <input type="text" class="form-control" name="waktu_penyewaan" value="{{ $item->waktu_penyewaan }}" />
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
