@extends('component.layout')
@section('title','Laporan Keuangan - E-Laundry')
@section('content')
{{-- Content Start --}}
{{-- PopBox Start --}}
<div class="popbox">
    <table class="table_dt" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Pemasukan</th>
            </tr>
        </thead>
        <tbody>
            @if(!$dataKeuangan->isEmpty())
                <?php $no=1; ?>
                @foreach($dataKeuangan as $data)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $data->tgl_transaksi }}</td>
                        <td>{{ "Rp " . number_format($data->pemasukan, 0, ',', '.') }}</td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
                </tr>
                @else
                <tr>
                    <td style="text-align:center;font-weight: 350;" colspan="3">Data tidak tersedia di tabel</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
{{-- Popbox End --}}
@endsection