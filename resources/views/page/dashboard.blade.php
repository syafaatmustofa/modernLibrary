@extends('page.tampilan');

@section('main')
<div class="container text-center">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <table class="table table-dark table-striped text-center">
                    <thead>
                        <h3> Kelola Buku</h3>
                        <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->isbn}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->sinopsis}}</td>
                            <td>{{$item->penerbit}}</td>
                            <td><img src="{{ asset('storage/'.$item->cover)}}" width="70px" class="rounded"></td>
                            <td>{{$item->kategori->nama }}</td>
                            <td>{{$item->stok}}</td>
                            <td colspan="2">
                                <a href="{{ route('buku.edit',$item->id) }}" class="btn btn-success btn-sm mb-3">Edit</a>
                                <a href="{{ route('deletebuku',$item->id) }}" class="btn btn-danger btn-sm mb-3">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row"></div>
        <div class="col">
            <div class="text-center">
                <table class="table table-dark table-striped text-center">
                    <thead>
                        <h3> Kelola kategori</h3>
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nama}}</td>
                            <td colspan="2">
                                <a href="{{ route('kategori.edit',$item->id) }}" class="btn btn-success btn-sm mb-3">Edit</a>
                                <a href="{{ route('deletekategori',$item->id) }}" class="btn btn-danger btn-sm mb-3">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
