@auth
@extends('component.layout')
@section('title','Riwayat Transaksi - E-Laundry')
@section('content')
	<!-- main content -->
@endsection

@section('script')
	<!-- script -->
@endsection

@endauth
@guest
    @php
        header("Location: " . route('front'));
        exit();
    @endphp
@endguest