@extends('page.tampilan')

@section('main')
    <form action="{{ route('kategori.store')}}" method="POST" id="formid" name="formname">
        @csrf        
        <div class="form-group p-3">
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kategori" value="{{ old('nama')}}">
        </div>
        <div class="row justify-content-between">
            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
            <a href="/kategori" class="btn btn-danger btn-sm mt-3">kembali</a>
        </div>
    </form>
@endsection
