@php
    use App\Models\transaksi;
    setlocale(LC_TIME, 'id_ID');
    $transaksi = transaksi::where('status_order', 'Proses')->orderByDesc('tgl_transaksi')->orderByDesc('id')->get();
@endphp

@auth
@extends('component.layout')
@section('title','Riwayat Transaksi - E-Laundry')
@section('content')
	<!-- main content -->
    <div class="popbox">
            <table class="table_dt" cellspacing="0" width="100%">

                <thead>
                    <tr>
                        <th>No Transaksi</th>
                        <th>Berat (Kg)</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($transaksi as $data)
                <tr>
                    <td>{{ $data->no_pesanan }}</td>
                    <td>{{ $data->berat }}</td>
                    <td>{{ $data->jenis_pesanan }}</td>
                    <td>Rp{{ number_format($data->harga, 0, ',', '.') }}</td>
                    <td>{{ date("d-M-Y", strtotime($data->tanggal)) }}</td>
                </tr>
                @empty
                <tr>
                    <td style="text-align:center;font-weight: 350;" colspan="6">Data tidak tersedia di tabel</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            
    </div>
@endsection

@section('script')
	<!-- script -->
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
@endsection

@endauth
@guest
    @php
        header("Location: " . route('front'));
        exit();
    @endphp
@endguest