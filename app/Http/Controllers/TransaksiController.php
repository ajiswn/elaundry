<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use carbon\carbon;
use Illuminate\Support\Facades\DB;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::all();
        $dataTransaksi = Transaksi::all();
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Ymd');
        $max_transaksi = Transaksi::max('id'); // Menggunakan Eloquent untuk mendapatkan nilai maksimum

        $jumlah_transaksi = $max_transaksi === null ? 1 : $max_transaksi + 1;

        $no_transaksi = $tanggal . str_pad($jumlah_transaksi, 3, '0', STR_PAD_LEFT);
        return view('menu.data_transaksi', ['dataTransaksi'=>$data], compact('no_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.kategori', compact('dataTransaksi', 'no_transaksi'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $order = new transaksi();
            $order->no_pesanan      = $request->no_pesanan;
            $order->tgl_transaksi   = Carbon::now()->parse($order->tgl_transaksi)->format('d-m-Y');
            $order->harga_id        = $request->harga_id;
            $order->user_id         = Auth::user()->id;
            $order->hari            = $request->hari;
            $order->kg              = $request->kg;
            $order->harga           = $request->harga;
            $hitung                 = $order->kg * $order->harga;
            $order->harga_akhir     = $hitung;
            $order->tgl             = Carbon::now()->day;
            $order->bulan           = Carbon::now()->month;
            $order->tahun           = Carbon::now()->year;
            $order->save();

        DB::commit();
        return redirect()->route('kategori.index');
        }catch (ErrorException $e) {
        DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
