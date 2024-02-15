@extends('layout.layout')
@section('title', 'Edit Data Staff Tiketing')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Staff Tiketing
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                        <label>Username Akun</label>
                                        <select name='id_akun' class='form-control'>
                                            @foreach ($akun as $a)
                                                <option value="{{$a->id_akun}}" {{ $a->id_akun == $item->id_akun ? 'selected' : '' }}>{{$a->username}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama_st" value="{{$item->nama_st}}"/>
                                    </div>
                                    <input type="hidden" class="form-control" name="id_st" value="{{$item->id_st}}"/>
                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="number" class="form-control" name="kontak_st" value="{{$item->kontak_st}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" class="form-control" name="foto_st" />
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
                    </form>
                    {{-- @endforeach --}}
            </div>
        </div>
    </div>
@endsection
