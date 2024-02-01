<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Illuminate\Support\Facades\Auth;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
      $data = kategori::with('harga')->where('user_id',Auth::user()->id)
      ->orderBy('id','DESC')->get();
      return view('menu.kategori',['kategori'=>$data]);
    }

    public function store(Request $request)
    {
      $addharga = new kategori();
      $addharga->user_id = Auth::user()->id;
      $addharga->nama_kategori = $request->nama_kategori;
      $addharga->harga = preg_replace('/[^A-Za-z0-9\-]/', '', $request->harga);// Remove special caracter
      $addharga->hari = $request->hari;
      $addharga->save();

      Session::flash('success','Tambah Data Kategori Berhasil');
      return redirect('kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return response()->json($kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Kategori::find($id)->update([
            'nama_kategori' => $request->nama_kategori,
            'harga' => preg_replace('/[^A-Za-z0-9\-]/', '', $request->harga),
            'hari' => $request->hari
        ]);
        
      Session::flash('success','Edit Data Kategori Berhasil');
      return redirect('kategori');
    }

    public function destroy(string $id)
    {
        Kategori::find($id)->delete();

        Session::flash('success','Hapus Data Kategori Berhasil');
        return redirect('kategori');
    }
}
