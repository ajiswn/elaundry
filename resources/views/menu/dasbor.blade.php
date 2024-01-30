@extends('component.layout')

@section('content')
	<div class="laundry_dataku">
		<div class="laundry_data" style="width:40rem">
			<p class="welcome">Selamat Datang, {{ Auth::user()->nama }}</p>
			<p class="tgl" style="font-weight:300" >{{date('l, d F Y')}}, {{date('H:i:s')}}</p>
		</div>
		<div class="laundry_data">
			<h5>120</h5>
			<img src="gambar/laundry_masuk.svg" alt="">
			<p>Laundry Proses</p>
		</div>
		<div class="laundry_data">
			<h5>210</h5>
			<img src="gambar/laundry_selesai.svg" alt="">
			<p>Laundry Selesai</p>
		</div>
	</div>
	<div class="data">
		<div class="data_harian">
			<p>Data Laundry Masuk Per-hari</p>
			<div id="data-hari"></div>
		</div>
		<div class="data_bulanan">
			<p>Data Laundry Masuk Per-bulan</p>
			<div id="data-bulan"></div>
		</div>
	</div>
@endsection

@section('script')
<script>
var $primary = '#7367F0';
var $label_color = '#e7eef7';
var $purple = '#6f6cec';
var $strok_color = '#000000';
var MONTHS = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
var dataNilaiB = "10";
var dataNilai = "10";
var dataTanggal = "10";
var values = dataNilai.split(',').map(Number);
var labels = dataTanggal.split(',');
var valuesB = dataNilaiB.split(',').map(Number);

{{-- Bar perbulan --}}
var optionsB = {
	chart: {
		height: 300,
		width: 460,
		type: 'line',
		toolbar: {show: false},
		dropShadow: {
			enabled: true,
			top: 20,
			left: 2,
			blur: 6,
			opacity: 0.20
		},
	},
	stroke: {
		curve: 'smooth',
		width: 4,
	},
	grid: {
		borderColor: $label_color,
	},
	legend: {
		show: false,
	},
	colors: [$purple],
	markers: {
		size: 0,
		hover: {size: 5}
	},
	series: [{
		name: "Laundry Masuk",
		data: valuesB
	}],
	xaxis: {
		labels: {
			style: {colors: $strok_color,}
		},
		axisTicks: {
			show: false,
		},
		categories: MONTHS,
		axisBorder: {
			show: false,
		},
		tickPlacement: 'on'
	},
	yaxis: {
		tickAmount: 4,
		labels: {
			style: {color: $strok_color,},
			formatter: function(val) {
				return val > 999 ? (val / 1000).toFixed(1) + 'rb' : val;
			}
		}
	},
	tooltip: {
		x: { show: false }
	},
};

{{-- Menampilkan grafik line per bulan --}}
var chartBulan = new ApexCharts(document.querySelector("#data-bulan"), optionsB);
chartBulan.render();

{{-- Bar Data Hari --}}
var options = {
	chart: {
		height: 300,
		width: 600,
		type: 'line',
		toolbar: {show: false},
		dropShadow: {
			enabled: true,
			top: 20,
			left: 2,
			blur: 6,
			opacity: 0.20
		},
	},
	stroke: {
		curve: 'smooth',
		width: 4,
	},
	grid: {
		borderColor: $label_color,
	},
	legend: {
		show: false,
	},
	colors: [$purple],
	markers: {
		size: 0,
		hover: {size: 5}
	},
	series: [{
		name: "Laundry Masuk",
		data: values
	}],
	xaxis: {
		labels: {
			style: {colors: $strok_color,}
		},
		axisTicks: {
			show: false,
		},
		categories: labels,
		axisBorder: {
			show: false,
		},
		tickPlacement: 'on'
	},
	yaxis: {
		tickAmount: 4,
		labels: {
			style: {color: $strok_color,},
			formatter: function(val) {
				return val > 999 ? (val / 1000).toFixed(1) + 'rb' : val;
			}
		}
	},
	tooltip: {
		x: { show: false }
	},
};

{{-- Menampilkan grafik line per hari --}}
var chartHari = new ApexCharts(document.querySelector("#data-hari"), options);
chartHari.render();
</script>
@endsection