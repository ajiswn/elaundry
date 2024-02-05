@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - E-Laundry</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/css/bantuan.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.css">
    <link rel="icon" href="gambar/favicon.png">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            @include('component.navbar')
        </div>
        @include('component.header')
        <div class="main-content">
            <div class="wrap-content">
                <h1>Bantuan</h1>
                <br>
                <ol class="angka">
                    <li class="nomor">Membuka Situs E-Laundry
                        <ul class="bullet">
                            <li>Buka situs E-Laundry melalui link berikut</li>
                            <li>Ketika membuka link tersebut, maka muncul halaman selamat datang</li>
                            <li>Terdapat dua pilihan masuk dan daftar</li>
                            <li>Jika belum mempunyai akun, maka silahkan klik tombol daftar</li>
                        </ul>
                    </li>
                    <li class="nomor">Daftar Akun E-Laundry
                        <ul class="bullet">
                            <li>Masukan nama anda</li>
                            <li>Masukan Username dan Password yang sulit ditebak</li>
                            <li>Lalu konfirmasi ulang Password supaya tidak terjadi kekeliruan dalam pengisian Password</li>
                            <li>Anda berhasil membuat akun E - Laundry</li>
                            <li>Selanjutnya akan diarahkan lansung ke halaman masuk</li>
                        </ul>
                    </li>
                    
                    <li class="nomor">Masuk Ke E-Laundry
                        <ul class="bullet">
                            <li>Masukkan Username dan Password yang telah dibuat tadi</li>
                            <li>Anda Berhasil masuk ke perangkat E-Laundry berbasis web</li>
                        </ul>
                    </li>
                    <li class="nomor">Fungsi Halaman Dasbor
                        <ul class="bullet">
                            <li>Halaman <b>Dasbor</b> adalah halaman yang tampil setelah berhasil melakukan login</li>
                            <li>Di dalam fitur dasbor, terdapat informasi terkait jumlah transaksi yang masuk per bulan dan per minggu</li>
                        </ul>
                    </li>
                    <li class="nomor">Fungsi Fitur Tambah Kategori Pada Halaman Kategori
                        <ul class="bullet">
                            <li>Navigasi ke halaman <b>Kategori</b></li>
                            <li>Klik tombol <strong>Tambah Kategori</strong> untuk menampilkan formulir Tambah Kategori</li>
                            <li>Isi jenis Kategori yang diperlukan untuk menambahkan transaksi baru</li>
                            <li>Simpan Kategori dan akan ada notifikasi setelah berhasil menambahkan kategori</li>
                        </ul>
                    </li>
                    <li class="nomor">Fungsi Fitur Edit Kategori Pada Halaman Kategori
                        <ul class="bullet">
                            <li>Temukan dan pilih kategori yang ingin diedit</li>
                            <li>Pilih opsi edit dan lakukan perubahan sesuai kebutuhan</li>
                            <li>Simpan perubahan dan akan ada notifikasi Kategori berhasil diedit</li>
                        </ul>
                    </li>
                    <li class="nomor">Fungsi Fitur Hapus Pada Halaman Kategori Transaksi
                        <ul class="bullet">
                            <li>Temukan dan pilih kategori yang ingin dihapus</li>
                            <li>Pilih opsi hapus pada kolom aksi</li>
                            <li>Kategori akan terhapus dan akan ada notifikasi data berhasil dihapus</li>
                        </ul>
                    </li>

                    <li class="nomor">Fungsi Fitur Tambah Data Pada Halaman Data Transaksi
                        <ul class="bullet">
                            <li>Navigasi ke halaman <b>Data Transaksi</b></li>
                            <li>Jika anda user baru, maka halaman data transaksi akan kosong</li>
                            <li>Maka sebaiknya dianjurkan untuk membuat kategori pesanan terlebih dahulu</li>
                            <li>Klik tombol <strong>Tambah Data</strong> untuk menampilkan formulir Tambah Data</li>
                            <li>Isi formulir atau data yang diperlukan untuk menambahkan transaksi baru</li>
                            <li>Simpan data dan akan ada notifikasi setelah berhasil menambahkan data</li>
                        </ul>
                    </li>
                    <li class="nomor">Fungsi Fitur Edit Data Pada Halaman Data Transaksi
                        <ul class="bullet">
                            <li>Temukan dan pilih transaksi yang ingin diedit</li>
                            <li>Pilih opsi edit dan lakukan perubahan sesuai kebutuhan</li>
                            <li>Simpan perubahan dan akan ada notifikasi data berhasil diedit</li>
                        </ul>
                    </li>
                    <li class="nomor">Fungsi Fitur Hapus Pada Halaman Data Transaksi
                        <ul class="bullet">
                            <li>Temukan dan pilih transaksi yang ingin dihapus</li>
                            <li>Pilih opsi hapus pada kolom aksi</li>
                            <li>Data akan terhapus dan akan ada notifikasi data berhasil dihapus</li>
                        </ul>
                    </li>
                    <li class="nomor">Fungsi Fitur Selesai Pada Halaman Data Transaksi
                        <ul class="bullet">
                            <li>Klik ikon ceklis di kolom aksi dari data transaksi</li>
                            <li>Fitur selesai adalah fitur dengan lambang ceklis yang ada pada tiap data transaksi</li>
                            <li>Fitur selesai akan memindahkan data yang sudah selesai menuju ke <b>Riwayat transksi</b> dan <b>Laporan Keuangan</b></li>
                        </ul>
                    </li>
                    <li class="nomor">Halaman Riwayat Transaksi dan Laporan Keuangan
                        <ul class="bullet">
                            <li>Buka halaman Riwayat Transaksi atau Laporan Keuangan pada menu navigasi</li>
                            <li>Halaman Riwayat transkasi adalah halaman dengan data transaksi yang sudah selesai</li>
                            <li>Halaman Laporan Keuangan adalah halaman data transaksi yang sudah selesai yang menampilkan tanggal dan harga sebagai uang masuk</li>
                        </ul>
                    </li>
                </ol>
            </div>
            <footer>Create at 2024;&copy; KEL7.
                <p></p>
            </footer>
        </div>
    </div>
    <div class="modal" id="keluar">
        <div class="keluarku" style="padding-top: 16px">
            <p><b>{{ Auth::user()->nama }}</b>,<br>Anda yakin ingin keluar?</p>
            <a href="{{route('logout')}}"><button class="simpan">Ya</button></a>
            <button class="close" id="tidak">Tidak</button>
        </div>
    </div>
    <script>
        var keluar = document.getElementById("keluar");
        var tidak = document.getElementById("tidak");

        tidak.onclick = function() {
            keluar.style.display = "none";
        }

        function openKeluarPopup() {
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