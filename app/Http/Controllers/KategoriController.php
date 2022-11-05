<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kategori::all();
        return view('page.kategori.kategori', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = kategori::all();
        return view('page.kategori.tambahkategori', compact('data'));
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
            'nama' => 'required|string|unique:kategoris,nama'
        ]);

        kategori::create([
            'nama' => $request->nama
        ]);

        // dd($request);
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = kategori::find($id);
        return view('page.kategori.editkategori',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\kategori  $kategori
     * * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = kategori::find($id);

        $validator = $request->validate([
            'nama' => 'required|string'
        ]);

        $data->update($validator);
        // dd($data);
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kategori::findorFail($id);
        $data->delete();
        // dd($data);
        return redirect('/kategori');
    }

    
}
