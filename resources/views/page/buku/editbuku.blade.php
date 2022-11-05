@extends('page.tampilan')

@section('main')
    <form action="{{ route('buku.update', $data->id)}}" method="POST" enctype="multipart/form-data" id="formid" name="formname">
        @csrf
        @method('put')
        <div class="form-group p-3">
            <label>ISBN</label>
            <input type="number" class="form-control" name="isbn" value="{{$data->isbn}}">
        </div>
        <div class="form-group p-3">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" value="{{$data->judul}}">
        </div>
        <div class="form-group p-3">
            <label>Sinopsis</label>
            <textarea name="sinopsis" id="formid" cols="30" rows="10" >{{ $data->sinopsis }}</textarea>
        </div>
        <div class="form-group p-3">
            <label>Penerbit</label>
            <input type="text" class="form-control" name="penerbit" value="{{$data->penerbit}}">
        </div>

        <img src="{{ asset('storage/'. $data->cover )}}" height="100" alt="" class="mt-2">

        <div class="form-group p-3">
            <label>Cover</label>
            <input type="file" class="form-control" name="cover" value="{{$data->cover}}">
        </div>
        <div class="form-group p-3">
            {{-- <label>Nama Kategori</label> --}}
            <select class="form-control bg-white" name="kategori_id">
                <option value="" >Pilih Kategori</option>
                @foreach($kategori as $kt)
                <option value="{{$kt->id}}" {{ $kt->id == $data->kategori_id ? 'selected' : '' }}>{{ $kt->nama }}   </option>
                @endforeach
            </select>
        </div>
        <div class="form-group p-3">
            <label>Stok</label>
            <input type="number" class="form-control" name="stok" value="{{$data->stok}}">
        </div>
        <div class="row justify-content-between">
            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
            <a href="/buku" class="btn btn-danger btn-sm mt-3">kembali</a>
        </div>
    </form>
@endsection
