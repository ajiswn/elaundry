@extends('component.layout')
@section('title','Riwayat Transaksi - E-Laundry')
@section('content')
{{-- Content Start --}}
{{-- PopBox Start --}}
<div class="popbox">
    <table class="table_dt" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Tgl Transaksi</th>
                <th>Pelanggan</th>
                <th>Berat</th>
                <th>Kategori</th>
                <th>Harga Total</th>
            </tr>
        </thead>
        <tbody>
            @if(!$dataTransaksi->isEmpty())
                <?php $no=1; ?>
                @foreach($dataTransaksi as $data)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $data->no_transaksi }}</td>
                        <td>{{ $data->tgl_transaksi }}</td>
                        <td>{{ $data->customer }}</td>
                        <td>{{ $data->berat.' KG' }}</td>
                        <td>{{ $data->nama_kategori }}</td>
                        <td>{{ "Rp" . number_format($data->harga_akhir, 0, ',', '.') }}</td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
                </tr>
                @else
                <tr>
                    <td style="text-align:center;font-weight: 350;" colspan="8">Data tidak tersedia di tabel</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
{{-- Popbox End --}}
@endsection