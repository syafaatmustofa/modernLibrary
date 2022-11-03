@extends('page.tampilan');

@section('main')
<table class="bg-secondary text-white text-center">
    <thead >
        <h3> Kelola Buku</h3>
        <a href="#" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
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
            <td>{{$item->cover}}</td>
            <td>{{$item->kategori->nama }}</td>
            <td>{{$item->stok}}</td>
            <td colspan="2">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
