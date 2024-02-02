<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
class Riwayat_transaksiController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');

    }

    public function index()
    {
        $dataTransaksi = Transaksi::where('user_id', Auth::user()->id)
        ->where('status_order', 'Selesai')
        ->orderBy('updated_at', 'DESC')
        ->get();

        return view('menu.riwayat_transaksi', compact('dataTransaksi'));
    }
}
