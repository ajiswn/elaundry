<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - Laundry</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:0px;
            width:100%;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:0px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:auto;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th colspan="3" style="text-align: left">Nomor Transaksi: <strong>{{$data->no_transaksi}}</strong></th>
                    <th>{{ $data->created_at->translatedFormat('d F Y') }}</th>
                </tr>
                <tr>
                    <td style="padding-bottom:20px" colspan="2">
                        <h4><img src="gambar/logo.png" alt="logo e-laundry"></h4><br>
                        <p class="text-muted m-l-5"> <b>Diterima Oleh</b> <span style="margin-left:8px"> </span>: {{ $data->user->nama }}</p>
                    </td>
                    <td colspan="2">
                        <h3 style="text-align:right">Detail Order Pelanggan :</h3>
                        <p style="text-align:right"><b>Nama Pelanggan : </b>{{$data->customer}}</p> <br>
                        <p style="text-align:right"><b>Tanggal Masuk :</b> <i class="fa fa-calendar"></i> {{ $data->tgl_transaksi }}</p>
                        <p style="text-align:right"><b>Tanggal Diambil :</b> <i class="fa fa-calendar"></i>{{ $data->tgl_ambil }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="2">Kategori Pakaian</th>
                    <th class="text-right">Berat</th>
                    <th class="text-right">Harga</th>
                </tr>
                
                <tr>
                    <td style="color:black" colspan="2">{{$data->nama_kategori}}</td>
                    <td style="color:black">{{$data->berat}} Kg</td>
                    <td style="color:black">{{"Rp " . number_format($data->harga, 0, ',', '.')}} /Kg</td>
                </tr>
                
                <tr>
                    <th colspan="3">Total Bayar</th>
                    <td style="color:black; font-weight:bold">{{"Rp " . number_format($data->harga_akhir, 0, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>