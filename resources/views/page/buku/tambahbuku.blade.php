@extends('page.tampilan')

@section('main')
    <form action="{{ route('buku.store')}}" method="POST" enctype="multipart/form-data" id="formid" name="formname">
        @csrf
        
        <div class="form-group p-3">
            {{-- <label>ISBN</label> --}}
            <input type="number" class="form-control" name="isbn" placeholder="Masukkan isbn" value="{{ old('isbn')}}">
        </div>
        <div class="form-group p-3">
            {{-- <label>Judul</label> --}}
            <input type="text" class="form-control" name="judul" placeholder="Masukkan judul" value="{{ old('judul')}}">
        </div>
        <div class="form-group p-3">
            {{-- <label>Sinopsis</label> --}}
            <textarea name="sinopsis" id="formid" cols="30" rows="10" placeholder="Masukkan Sinopsis"></textarea>
            {{-- <input type="" class="form-control" name="sinopsis" placeholder="Masukkan Sinopsis" value="{{ old('sinopsis')}}"> --}}
        </div>
        <div class="form-group p-3">
            {{-- <label>Penerbit</label> --}}
            <input type="text" class="form-control" name="penerbit" placeholder="Masukkan penerbit" value="{{ old('penerbit')}}">
        </div>
        <div class="form-group p-3">
            {{-- <label>Cover</label> --}}
            <input type="file" class="form-control" name="cover" value="{{ old('cover')}}">
        </div>
        <div class="form-group p-3">
            {{-- <label>Nama Kategori</label> --}}
            <select class="form-control bg-white" name="kategori_id">
                <option value="" >Pilih Kategori</option>
                @foreach($data as $item)
                <option value="{{$item->id}}" @selected(old('kategori_id')==$item->id)>{{$item->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group p-3">
            {{-- <label>Stok</label> --}}
            <input type="number" class="form-control" name="stok" placeholder="Masukkan Stok" value="{{ old('stok')}}">
        </div>
        <div class="row justify-content-between">
            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
            <a href="/buku" class="btn btn-danger btn-sm mt-3">kembali</a>
        </div>
    </form>
@endsection
