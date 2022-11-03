<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use App\Http\Requests\StorebukuRequest;
use App\Http\Requests\UpdatebukuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = buku::all();
        // dd($data);
        return view('page.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = kategori::all();
        return view('page.buku.tambahbuku', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'isbn' => 'required|integer',
            'judul' => 'required|string',
            'sinopsis' => 'required|string',
            'penerbit' => 'required|string',
            'cover' => 'required|image|max:10000|mimes:jpg,png',
            'kategori_id' => 'required',
            'stok' => 'required|integer'
        ]);

        $file = $request->file('cover')->store('cover');

        buku::create([
            'isbn' => $request->isbn,
            'judul' =>  $request->judul,
            'sinopsis' => $request->sinopsis,
            'penerbit' => $request->penerbit,
            'cover' => $file,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok
        ]);
        // dd($request);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = buku::find($id);
        $kategori = kategori::all();
        return view('page.buku.editbuku', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param int $id
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $data = buku::find($id);

        $validator = $request->validate([
            'isbn' => 'required|integer',
            'judul' => 'required|string',
            'sinopsis' => 'required|string',
            'penerbit' => 'required|string',
            'kategori_id' => 'required',
            'stok' => 'required|integer'
        ]);

        if (!$validator) {
            return redirect()->route('dashboard.update', $id)->withErrors($validator);
        }

        if ($request->file('cover') != null) {
                $request->validate(['cover' => 'image|max:100000|mimes:png,jpg']);
                $file = $request->file('cover')->store('cover');
                Storage::delete([$data->cover]);
                $data->update([
                    'cover' => $file
                ]);
            }
        // dd($request);
        $data->update($validator);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = buku::findorFail($id);
        $data->delete();
        Storage::delete([$data->cover]);

        return redirect('/dashboard');
    }
}
