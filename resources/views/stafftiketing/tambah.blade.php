@extends('layout.layout')
@section('title', 'Tambah Data Tiketing')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Staff Tiketing
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
                                                <option value="{{$a->id_akun}}">{{$a->username}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama_st"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <input type="number" class="form-control" name="kontak_st" />
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
    </div>
@endsection
