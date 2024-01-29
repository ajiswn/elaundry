 <div class="header">
    <div class="logolaundry">
        <img src="gambar/logo_dasbor.svg" alt="">
    </div>
</div>
<div class="main">
    <a href="{{ route('dasbor.index') }}">
        <div class="list-menu{{ request()->is('dasbor') ? '-active' : '' }}">
            <img src="/gambar/dasbor{{ request()->is('dasbor') ? '_a' : '' }}.svg" alt="" class="icon">
            <span class="description">Dasbor</span>
        </div>
    </a>
    <a href="{{ route('data_transaksi.index') }}">
        <div class="list-menu{{ request()->is('data_transaksi') ? '-active' : '' }}">
            <img src="/gambar/data_transaksi{{ request()->is('data_transaksi') ? '_a' : '' }}.svg" alt="" class="icon">
            <span class="description">Data Transaksi</span>
        </div>
    </a>
    <a href="{{ route('riwayat_transaksi.index') }}">
        <div class="list-menu{{ request()->is('riwayat_transaksi') ? '-active' : '' }}">
            <img src="/gambar/riwayat_transaksi{{ request()->is('riwayat_transaksi') ? '_a' : '' }}.svg" alt="" class="icon">
            <span class="description">Riwayat Transaksi</span>
        </div>
    </a>
    <a href="{{ route('laporan_keuangan.index') }}">
        <div class="list-menu{{ request()->is('laporan_keuangan') ? '-active' : '' }}">
            <img src="/gambar/laporan_keuangan{{ request()->is('laporan_keuangan') ? '_a' : '' }}.svg" alt="" class="icon">
            <span class="description">Laporan Keuangan</span>
        </div>
    </a>
</div>