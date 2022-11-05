@extends('page.tampilan')

@section('main')
    <form action="{{ route('kategori.update', $data->id)}}" method="POST" id="formid" name="formname">
        @csrf
        @method('put')        
        <div class="form-group p-3">
            <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
        </div>
        <div class="row justify-content-between">
            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
            <a href="/kategori" class="btn btn-danger btn-sm mt-3">kembali</a>
        </div>
    </form>
@endsection
