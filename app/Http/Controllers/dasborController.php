<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dasbor;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dasborController extends Controller
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
        $masuk = transaksi::whereIN('status_order',['Proses','Selesai'])->where('user_id',auth::user()->id)->count();
        $selesai = transaksi::where('status_order','Selesai')->where('user_id',auth::user()->id)->count();

        // Statistik Harian
        $hari = DB::table('transaksi')
        ->  select('tgl', DB::raw('count(id) AS jml'))
        ->  whereYear('created_at','=',date("Y", strtotime(now())))
        ->  whereMonth('created_at','=',date("m", strtotime(now())))
        ->  where('user_id',auth::user()->user_id)
        ->  groupBy('tgl')
        ->  get();

        $tanggal = '';
        $batas =  31;
        $nilai = '';
        for($_i=1; $_i <= $batas; $_i++){
            $tanggal = $tanggal . (string)$_i . ',';
            $_check = false;
            foreach($hari as $_data){
                if((int)@$_data->tgl === $_i){
                    $nilai = $nilai . (string)$_data->jml . ',';
                    $_check = true;
                }
            }
            if(!$_check){
                $nilai = $nilai . '0,';
            }
        }

        // Statistik Bulanan
        $bln = DB::table('transaksi')
        ->  select('bulan', DB::raw('count(id) AS jml'))
        ->  whereYear('created_at','=',date("Y", strtotime(now())))
        ->  whereMonth('created_at','=',date("m", strtotime(now())))
        ->  where('user_id',auth::user()->user_id)
        ->  groupBy('bulan')
        ->  get();

        $bulans = '';
        $batas =  12;
        $nilaiB = '';
        for($_i=1; $_i <= $batas; $_i++){
            $bulans = $bulans . (string)$_i . ',';
            $_check = false;
            foreach($bln as $_data){
                if((int)@$_data->bulan === $_i){
                    $nilaiB = $nilaiB . (string)$_data->jml . ',';
                    $_check = true;
                }
            }
            if(!$_check){
                $nilaiB = $nilaiB . '0,';
            }
        }

        return view('menu.dasbor')
            -> with('masuk', $masuk)
            -> with('selesai', $selesai)
            ->  with('_tanggal', substr($tanggal, 0,-1))
            ->  with('_nilai', substr($nilai, 0, -1))
            ->  with('_bulan', substr($bulans, 0,-1))
            ->  with('_nilaiB', substr($nilaiB, 0, -1));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
