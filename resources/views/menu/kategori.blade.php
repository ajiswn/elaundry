@auth
@extends('component.layout')
@section('title','Kategori - E-Laundry')
@section('content')
<div class="main-content">
    <div class="popbox">
        <button type="button" id="myBtn" class="tambah">
            <img src="gambar/tambah.svg">
            <p>Tambah</p>   
        </button>
        <table class="table_dt" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Berat (Kg)</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    @if(!$dataTransaksi->isEmpty())
                    @foreach($dataTransaksi as $data)
                    <td>{{ $data->no_pesanan }}</td>
                    <td>{{ $data->berat }}</td>
                    <td>{{ $data->jenis_pesanan }}</td>
                    <td>{{ $data->harga }}</td>
                    <td>{{ $data->tgl_transaksi }}</td>
                    <td class="action">
                        <a onclick="openEditPopup(<?php echo $data['no_pesanan']; ?>);" title="Edit"><button class="edit"><i class="fa-regular fa-pen-to-square"></i></button></a> 
                        <button title="Hapus" class="btnHapus" onclick="openHapusPopup(<?php echo $data['no_pesanan']; ?>, '<?php echo $data['no_pesanan']; ?>');"><i class="fa-regular fa-trash-can"></i></button>
                        <button title="Selesai" class="btnSelesai" onclick="openSelesaiPopup(<?php echo $data['no_pesanan']; ?>, '<?php echo $data['no_pesanan']; ?>');"><i class="fa-regular fa-square-check"></i></button>
                    </td>
                    @endforeach

                </tr>
                @else
                <tr>
                    <td style="text-align:center;font-weight: 350;" colspan="6">Data tidak tersedia di tabel</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>
</div>

</div>
@endsection

@endauth
@guest
@php
header("Location: " . route('front'));
exit();
@endphp
@endguest