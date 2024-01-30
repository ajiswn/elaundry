@extends('app')
@section('content')
    <div class="wrapper">
        <form method="POST" action='{{ route('register.action') }}' id="login-form">
            @csrf
            
            <h1><img src="gambar/logo.png" alt="logo e-laundry"></h1>
            <h2>Daftar</h2>
            <h3>Selamat Datang. Silahkan daftar akun.</h3>
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    @if (strpos($err, 'taken') !== false)
                        <p class="error">{{ __('Username sudah digunakan!') }}</p>
                    @elseif (strpos($err, 'match password') !== false)
                        <p class="error">{{ __('Konfirmasi Password harus sesuai dengan Password!') }}</p>
                    @else
                        <p class="error">{{ $err }}</p>
                    @endif
                @endforeach
            @endif
            <div class="input-box">
                <input type="text" name="nama" required value="{{old('nama')}}">
                <label class="placeholder">Nama</label>
                <i class='bx bx-user'></i>
            </div>
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
            <div class="input-box">
                <input id="confirm_pass" type="password" name="confirm_pass" required>
                <label class="placeholder">Konfirmasi Password</label>
                <i class='bx bx-lock-alt'></i>
                <i class="fa-solid fa-eye" id="eye2" onclick="toggle2()"></i>
            </div>
            <button type="submit" class="btn" id="daftar">Daftar</button>
            <p style="text-align: center; font-size: 12px">Sudah punya akun?</p>
            <p style="text-align: center"><a href="{{ route('login') }}" class="btn-masuk" id="masuk">Masuk</a></p>
            
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