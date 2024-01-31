@auth
@extends('component.layout')
@section('title','Kategori - E-Laundry')
@section('content')
    <h1>Tes</h1>
@endsection

@endauth
@guest
    @php
        header("Location: " . route('front'));
        exit();
    @endphp
@endguest