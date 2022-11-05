<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('page.user.user',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = User::all();
        // return view('page.kategori.tambahkategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     * * @param int $id
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('page.user.edituser', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     * * @param int $id
     */
    public function update(Request $request,$id)
    {
        $data = User::findOrFail($id);

        $validator = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'role' => 'required|string',
        ]);

        $data->update($validator);
        // dd($data);
        return redirect('/datauser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     * * @param int $id
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        dd($data);
        // return redirect('/datauser');
    }
}
