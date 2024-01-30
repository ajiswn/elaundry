@extends('app')
@section('content')
    <div class="wrapper">
        <form method="POST" action='{{ route('login.action') }}' id="login-form">
            @csrf
            <h1><img src="gambar/logo.png" alt="logo e-laundry"></h1>
            <h2>Masuk</h2>
            <h3>Selamat Datang. Silahkan masuk dengan akun Anda.</h3>

            @if($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="error">{{ $err }}</p>
                @endforeach
            @endif
            
            @if (session('success'))
            <p class="error" style="color: green;">{{session('success')}}</p>
            @endif
            <div class="input-box">
                <input type="text" name="username" required value="{{old('username')}}">
                <label class="placeholder">Username</label>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input id="password" type="password" name="password" required>
                <label class="placeholder">Password</label>
                <i class='bx bx-lock-alt'></i>
                <i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i>
            </div>
            <button type="submit" class="btn" id="daftar">Masuk</button>
            <p style="text-align: center; font-size: 12px">Belum punya akun?</p>
            <p style="text-align: center">
                <a href="{{ route('register') }}" class="btn-masuk" id="masuk">Daftar</a>
            </p>
            
        </form>
    </div>
    <script>
        var state = false;
        function toggle(){
            if(state){
                document.getElementById("password").setAttribute("type","password");
                document.getElementById("eye").style.color='#ABABAB';
                state = false;
            }
            else{
                document.getElementById("password").setAttribute("type","text");
                document.getElementById("eye").style.color='#6F6CEC';
                state = true;
            }
        }
        function toggle2(){
            if(state){
                document.getElementById("confirm_pass").setAttribute("type","password");
                document.getElementById("eye2").style.color='#ABABAB';
                state = false;
            }
            else{
                document.getElementById("confirm_pass").setAttribute("type","text");
                document.getElementById("eye2").style.color='#6F6CEC';
                state = true;
            }
        }
    </script>
@endsection