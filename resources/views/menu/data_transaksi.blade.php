@auth
@extends('component.layout')

@section('title','Data Transaksi - E-Laundry')
@section('content')
	<!-- main content -->
	<p>yaikss</p>
	<div class="popbox">
		<p>ssssss</p>
	</div>
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