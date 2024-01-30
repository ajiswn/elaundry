@auth
!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/bantuan.css">
    <link rel="stylesheet" href="/css/dasbor.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.css">
    <link rel="icon" href="/gambar/favicon.png">
</head>
<body>

    <div class="container">
        <div class="sidebar">
            @include('component.navbar')   
        </div>
        @include('component.header')
        <div class="main-content" style="{{ request()->is('dasbor') ? 'margin-top:50px' : '' }}">


            <!--content--->

            @yield('content')

            <!--end content-->



            <footer style="{{ request()->is('dasbor') ? 'position:fixed' : '' }}">Create at 2024;&copy; KEL7.
                <p></p>
            </footer>
        </div>
        <div class="modal" id="keluar">
            <div class="keluarku">
                <p>Anda yakin ingin keluar?</p>
                <a href="{{route('logout')}}"><button class="simpan">Ya</button></a>
                <button class="close" id="tidak">Tidak</button>
            </div>
        </div>
    </div>

    <!-- --script-- -->
    
    @yield('script')

    <!-- --end script-- -->

    <!-- popup keluar     -->
    <script>  
        var keluar = document.getElementById("keluar");
        var tidak = document.getElementById("keluar");
        tidak.onclick = function() {
            keluar.style.display = "none";
        }

        function openKeluarPopup() {
            var keluar = document.getElementById("keluar");
            keluar.style.display = "flex";
        }
    </script>

</body>
</html>
@endauth

@guest
    @php
        header("Location: " . route('front'));
        exit();
    @endphp
@endguest
