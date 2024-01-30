@auth
@extends('component.layout')
@section('title','Kategori - E-Laundry')
@section('content')
    
@endsection

@endauth
@guest
    @php
        header("Location: " . route('front'));
        exit();
    @endphp
@endguest