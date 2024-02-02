<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Session;

class KategoriController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');

    }

    //Ambil Data Untuk Kategori
    public function index()
    {
      $data = Kategori::with('harga')->where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
      return view('menu.kategori',['kategori'=>$data]);
    }

    //Proses Tambah Data Kategori
    public function store(Request $request)
    {
      Kategori::create([
        'user_id' => Auth::user()->id,
        'nama_kategori' => $request-> nama_kategori,
        'harga' => preg_replace('/[^A-Za-z0-9\-]/', '',$request->harga),
        'hari' => $request-> hari
      ]);
      
      Session::flash('success','Tambah Data Kategori Berhasil');
      return redirect('kategori');
    }

    //Ambil Data Untuk Edit Kategori
    public function edit($id)
    {
      $kategori = Kategori::find($id);
      return response()->json($kategori);
    }

    //Proses Edit Kategori
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

    //Proes hapus Kategori
    public function destroy(string $id)
    {
      Kategori::find($id)->delete();

      Session::flash('success','Hapus Data Kategori Berhasil');
      return redirect('kategori');
    }
}
