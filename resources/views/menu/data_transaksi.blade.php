@extends('component.layout')
@section('title','Data Transaksi - E-Laundry')
@section('content')
{{-- Content Start --}}
{{-- Notifikasi Start --}}
@if ($message = Session::get('success'))
    <div class="notif" id="notif">
        {{$message}}
        <button class="clsnotif"><i class="fa-solid fa-xmark"></i></button>
    </div>
@endif
{{-- Notifikasi End --}}

{{-- PopBox Start --}}
<div class="popbox">
    <button type="button" id="myBtn" class="tambah">
        <img src="gambar/tambah.svg">
        <p>Tambah</p>   
    </button>
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
                <th>Aksi</th>
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
                        <td class="action" style="min-width: 12rem">
                            <a onclick="openEditPopup({{ $data->id }});" title="Edit"><button class="edit"><i class="fa-regular fa-pen-to-square"></i></button></a> 
                            <button title="Hapus" class="btnHapus" onclick="openHapusPopup({{ $data->id }}, '{{ $data->no_transaksi }}');"><i class="fa-regular fa-trash-can"></i></button>
                            <button title="Selesai" class="btnSelesai" onclick="openSelesaiPopup({{ $data->id }}, '{{ $data->no_transaksi }}');">
                                <i class="fa-regular fa-square-check"></i>
                            </button>
                        </td>
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


<!-- Popup Tambah Start -->
<div id="myModal" class="modal">
    <div class="modal-content" style="height: 38rem">
        <p>Formulir Tambah Transaksi</p>
        <form class="ftambah" action="{{route('data_transaksi.store')}}" method="POST">
            @csrf
            <div class="form-box">
                <label id="no_transaksi">Nomor Transaksi</label><br>
                <input type="text" name="no_transaksi" value="{{$newID}}" readonly><br>
            </div>
            <div class="form-box">
                <label id="customer">Nama Pelanggan</label><br>
                <input type="text" name="customer" required><br>
            </div>
            <div class="form-box">
                <label id="berat">Berat (KG)</label><br>
                <input type="number" name="berat" placeholder="Berat (KG)" autocomplete="off" id="beratInput" onkeyup="updateHargaTotal()"><br>
            </div>
            <div class="form-box">
                <label id="jenis">Kategori</label><br>
                <select name="nama_kategori" id="kategoriSelect" required>
                    <option value="" disabled selected hidden>-- Kategori --</option>
                    @foreach($kategori as $jenis)
                        <option value="{{$jenis->nama_kategori}}" data-harga="{{$jenis->harga}}" data-hari="{{$jenis->hari}}">{{$jenis->nama_kategori}}</option>
                    @endforeach
                </select><br>                    
            </div>
            <div class="form-box">
                <label id="harga">Harga (Rp)/KG </label><br>
                <input type="text" name="harga" id="hargaInput" placeholder="Harga (Rp)/KG" readonly><br>                    
            </div>
            <div class="form-box">
                <label id="hari">Hari </label><br>
                <input type="text" name="hari" id="hariInput" placeholder="Hari" readonly><br>                    
            </div>
            <div class="form-box">
                <label id="harga_akhir">Harga Total (Rp)</label><br>
                <input type="text" name="harga_akhir" id="hargaAkhir" placeholder="Harga Total" readonly><br>                    
            </div>
            <button type="submit" class="simpan" name="tblsubmit"><i class="fa-regular fa-floppy-disk"></i>  Tambah</button>
            <button type="button" class="close"><i class="fa-solid fa-xmark"></i>  Batal</button> 
        </form>
    </div>
</div>
{{-- Popup Tambah End --}}

<!-- Popup Edit Start -->
<div id="myModalEdit" class="modal">
    <div class="modal-content">
    <p>Formulir Edit Transaksi</p>
        <form class="fedit" action="prosesEdit.php" method="POST">
            <div class="form-box">
                <label id="notrans">Nomor Transaksi</label><br>
                <input type="text" name="no_pesanan" readonly><br>
            </div>
            <div class="form-box">
                <label id="berat">Berat (KG)</label><br>
                <input type="number" name="berat" placeholder="Berat (KG)" autocomplete="off" id="beratInput"><br>
            </div>
            <div class="form-box">
                <label id="jenis">Jenis Pesanan</label><br>
                <select name="jenis_pesanan" required>
                    <option value="" disabled selected hidden>-- Jenis Pesanan --</option>
                    <option value="Express">Express</option>
                    <option value="Regular">Regular</option>
                </select><br>                    
            </div>
            <div class="form-box">
                <label id="harga">Harga (Rp) </label><br>
                <input type="text" name="harga" placeholder="Harga (Rp)" autocomplete="off"><br>                    
            </div>
            <div class="form-box">
                <label id="tanggal">Tanggal Pesanan</label><br>
                <input type="text" name="tanggal" placeholder="dd/mm/yyyy" onfocus="(this.type='date')">                    
            </div>
            <button type="submit" class="simpan" name="tblsubmit"><i class="fa-regular fa-floppy-disk"></i>  Simpan</button>
            <button type="button" class="close"><i class="fa-solid fa-xmark"></i>  Batal</button> 
        </form>
    </div>
</div>
<!-- Popup Edit End -->

<!-- Popup Hapus Start -->
<div class="modal" id="modalHapus">
    <div class="keluarku" style="padding-top: 25px">
        <p id="pesanHapus" style="font-size: 20px;">Anda yakin ingin menghapus data?</p>
        <a id="hapusLink" href="#"><button class="simpan">Ya</button></a>
        <button class="close" id="tidakHapus">Tidak</button>
    </div>
</div>
<!-- Popup Hapus End -->
    
    <!-- Popup Selesai Start -->
    <div class="modal" id="modalSelesai">
        <div class="keluarku" style="padding-top: 25px">
            <p id="pesanSelesai" style="font-size: 22px;">Apakah transaksi sudah selesai?</p>
            <a id="selesaiLink" href="#"><button class="simpan">Ya</button></a>
            <button class="close" id="tidakSelesai">Tidak</button>
        </div>
    </div>
    <!-- Popup Hapus End -->
@endsection

@section('script')
	<!-- script -->
<script>
document.getElementById('kategoriSelect').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];

        var beratValue = parseFloat(document.getElementById('beratInput').value);
        var hargaValue = selectedOption.getAttribute('data-harga');
        var hariValue = selectedOption.getAttribute('data-hari');
        var hargaTotal = beratValue * hargaValue ||0;
        // Set nilai otomatis pada input harga
        document.getElementById('hargaInput').value = formatRupiah(hargaValue);
        document.getElementById('hariInput').value = hariValue;
        document.getElementById('hargaAkhir').value = formatRupiah(hargaTotal);
});

function updateHargaTotal() {
    var beratValue = parseFloat(document.getElementById('beratInput').value) || 0;
    var hargaInputValue = document.getElementById('hargaInput').value;

    var hargaValue = parseFloat(hargaInputValue.replace('.', '')) || 0;

    var hargaTotal = beratValue * hargaValue || 0;

    document.getElementById('hargaAkhir').value = formatRupiah(hargaTotal);
}

//Popup Tambah
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {          //Tampil Popup
  modal.style.display = "flex";
}
span.onclick = function() {         //Tutup Popup Tambah dan Reset
    var form = document.querySelector('.ftambah');
    form.reset(); // Reset form sebelum menampilkan
  modal.style.display = "none";
}

//Popup Edit
var modal2 = document.getElementById("myModalEdit");
var span2 = document.getElementsByClassName("close")[1];
span2.onclick = function() {
  modal2.style.display = "none";
}

//Konfirmasi Hapus
var btnHapus = document.getElementsByClassName("btnHapus")[0];
var modalHapus = document.getElementById("modalHapus");
var tidakHapus = document.getElementById("tidakHapus");
function openHapusPopup(id, no_pesanan) {
    var hapusLink = document.getElementById('hapusLink');
    hapusLink.href = 'prosesHapus.php?id=' + id;

    var pesanHapus = document.getElementById('pesanHapus');
    pesanHapus.innerHTML = "Apakah Anda yakin akan menghapus data <b>" + no_pesanan + "</b>?";

    modalHapus.style.display = "flex";
}
tidakHapus.onclick = function() {
    modalHapus.style.display = "none";
}

//Konfirmasi Selesai
var btnSelesai = document.getElementsByClassName("btnSelesai")[0];
var modalSelesai = document.getElementById("modalSelesai");
var tidakSelesai = document.getElementById("tidakSelesai");
function openSelesaiPopup(id, no_pesanan) {
    var selesaiLink = document.getElementById('selesaiLink');
    selesaiLink.href = 'prosesSelesai.php?id=' + id;

    var pesanSelesai = document.getElementById('pesanSelesai');
    pesanSelesai.innerHTML = "Apakah transaksi <b>" + no_pesanan + "</b><br>sudah selesai?";

    modalSelesai.style.display = "flex";
}
tidakSelesai.onclick = function() {
    modalSelesai.style.display = "none";
}

//Menutup Notifikasi
var clsnotif = document.getElementsByClassName("clsnotif")[0];
clsnotif.onclick = function() {
  notif.style.display = "none";
}

//Popup Edit
function openEditPopup(no_pesanan) {
    var modal = document.getElementById("myModalEdit");
    modal.style.display = "flex";

    var form = document.querySelector('.fedit');
    form.reset(); // Reset form sebelum menampilkan

    // Fetch data transaksi yang dipilih untuk diedit
    fetch('prosesAmbilData.php?id=' + no_pesanan)
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal mengambil data dari server');
            }
            return response.json();
        })
        .then(data => {
            // Mengisi nilai form dengan data yang diterima
            document.querySelector('.fedit input[name="no_pesanan"]').value = data.no_pesanan;
            document.querySelector('.fedit input[name="berat"]').value = data.berat;
            document.querySelector('.fedit select[name="jenis_pesanan"]').value = data.jenis_pesanan;
            var formattedHarga = new Intl.NumberFormat('id-ID').format(data.harga);
            document.querySelector('.fedit input[name="harga"]').value = formattedHarga;
            document.querySelector('.fedit input[name="tanggal"]').value = data.tanggal;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

//Merubah format harga
function formatRupiah(value) {
    return parseInt(value, 10).toLocaleString('in-id');
}
</script>
@endsection