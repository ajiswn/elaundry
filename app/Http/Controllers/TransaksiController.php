<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use App\Models\Kategori;
use carbon\carbon;
use Session;
class TransaksiController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');

    }
    
    public function index()
    {
        $dataTransaksi = Transaksi::where('user_id',Auth::user()->id)
            ->where('status_order', 'Proses')
            ->orderBy('id','DESC')
            ->get();

        $kategori = Kategori::where('user_id',Auth::id())->get();

        $y = date('Y');
        $number = mt_rand(1000, 9999);

        // Nomor Form otomatis
        $newID = $number. Auth::user()->id .''.$y;
        $tgl = date('d-M-Y');

        $cek_harga = Kategori::where('user_id',Auth::user()->id)->first();

        return view('menu.data_transaksi', compact('newID','kategori','dataTransaksi'));
    }

    public function store(Request $request)
    {
        Transaksi::create([
            'no_transaksi'  => $request-> no_transaksi,
            'tgl_transaksi' => Carbon::now()->format('d-M-y'),
            'user_id'       => Auth::user()->id,
            'customer'      => $request-> customer,
            'berat'         => $request-> berat,
            'nama_kategori' => $request-> nama_kategori,
            'harga'         => preg_replace('/[^A-Za-z0-9\-]/', '',$request->harga),
            'harga_akhir'   => preg_replace('/[^A-Za-z0-9\-]/', '',$request->harga) * $request-> berat,
            'hari'          => $request-> hari,
            'tgl'           => Carbon::now()->day,
            'bulan'         => Carbon::now()->month,
            'tahun'         => Carbon::now()->year,
        ]);

        Session::flash('success','Tambah Data Transaksi Berhasil');
        return redirect('data_transaksi');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
