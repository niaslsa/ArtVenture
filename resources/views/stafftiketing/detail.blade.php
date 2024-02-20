@extends('layout.layout')
@section('title', 'Detail Data Staff Tiketing')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Detail Data Staff Tiketing
                    </span>
                </div>
                <div class="card-body">
                    <div>
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                        <label>Username Akun</label>
                                        <p>{{ $stafftiketting->username }}</p>                                            
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <p>{{ $stafftiketting->nama_st }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Kontak</label>
                                        <p>{{ $stafftiketting->kontak_st }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <br>
                                        <img src="http://127.0.0.1:8000/foto/{{ $stafftiketting->foto_st }}" alt="" width="300px" height="300px">
                                    </div>

                                    @csrf
                                    <div class="d-flex mt-3">
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
zend_logo_guid  