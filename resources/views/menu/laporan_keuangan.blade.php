@auth
@extends('component.layout')
@section('title','Laporan Keuangan - E-Laundry')
@section('content')

<div class="main-content">
	<div class="popbox">
		<table class="table_dt" cellspacing="0" width="100%">

			<thead>
				<tr>
					<th>Tanggal</th>
					<th>Uang Masuk</th>
				</thead>
				<tbody>
					
					@if(!$dataTransaksi->isEmpty())
					@foreach($dataTransaksi as $data)
					<td>{{ $data->tgl_transaksi }}</td>
					<td>{{ $data->harga_akhir }}</td>
					@endforeach
					@else

					<td style="text-align:center;font-weight: 350;" colspan="6"><p>Data kosong</p></td>
					@endif						
				</tbody>

		</table>
	</div>


</div>
</div>
</div>
@endsection

@section('script')
<!-- script -->
@endsection

@endauth
@guest
@php
header("Location: " . route('front'));
exit();
@endphp
@endguest