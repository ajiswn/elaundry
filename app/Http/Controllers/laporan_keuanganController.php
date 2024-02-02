<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Laporan_keuanganController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');

    }
    
    public function index()
    {
        $dataKeuangan = DB::table('transaksi')
            ->select('tgl_transaksi', DB::raw('SUM(harga_akhir) as pemasukan'))
            ->where('status_order', 'Selesai')
            ->where('user_id', Auth::user()->id)
            ->groupBy('tgl_transaksi')
            ->orderBy('tgl_transaksi', 'DESC')
            ->get();

        return view('menu.laporan_keuangan', compact('dataKeuangan'));
    }
}
