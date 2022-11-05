@extends('page.tampilan');

@section('main')
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
            @foreach($data as $item)
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
@endsection
