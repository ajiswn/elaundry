@php
    use App\Models\Transaksi;
    setlocale(LC_TIME, 'id_ID');
    $transaksi = transaksi::where('status_order', 'Proses')->orderByDesc('tgl_transaksi')->orderByDesc('id')->get();
@endphp

@auth
@extends('component.layout')

@section('title','Data Transaksi - E-Laundry')
@section('content')
	<!-- main content -->
    @if(session('notif'))
        {{ session('notif') }}
        @php
            session(['notif' => '']);
        @endphp
    @endif
    <div class="popbox">
        <button type="button" id="myBtn" class="tambah">
            <img src="{{ asset('gambar/tambah.svg') }}">
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
            @forelse($transaksi as $data)
                @php
                    $harga_rupiah = "Rp" . number_format($data->harga, 0, ',', '.');
                    $tanggal = date("d-M-Y", strtotime($data->tanggal));
                @endphp
                <tr>
                    <td>{{ $data->no_pesanan }}</td>
                    <td>{{ $data->berat }}</td>
                    <td>{{ $data->jenis_pesanan }}</td>
                    <td>{{ $harga_rupiah }}</td>
                    <td>{{ $tanggal }}</td>
                    <td class="action">
                        <a onclick="openEditPopup({{ $data->no_pesanan }});" title="Edit">
                            <button class="edit"><i class="fa-regular fa-pen-to-square"></i></button>
                        </a>
                        <button title="Hapus" class="btnHapus" onclick="openHapusPopup({{ $data->no_pesanan }}, '{{ $data->no_pesanan }}');">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                        <button title="Selesai" class="btnSelesai" onclick="openSelesaiPopup({{ $data->no_pesanan }}, '{{ $data->no_pesanan }}');">
                            <i class="fa-regular fa-square-check"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td style="text-align:center;font-weight: 350;" colspan="6">Data tidak tersedia di tabel</td>
                </tr>
            @endforelse
            </tbody>   
        </table>
    </div>

<!-- Popup Tambah Start -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <p>Formulir Tambah Transaksi</p>
        <form class="ftambah" action="{{route('data_transaksi.store')}}" method="POST">
            @csrf
            <div class="form-box">
                <label id="notrans">Nomor Transaksi</label><br>
                <input type="text" name="no_pesanan" value=' ' readonly><br>
            </div>
            <div class="form-box">
                <label id="berat">Berat (KG)</label><br>
                <input type="number" name="berat" placeholder="Berat (KG)" autocomplete="off"><br>
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
                <input type="text" name="harga" placeholder="Harga (Rp)" autocomplete="off" onkeyup="formatRupiah(this)"><br>                    
            </div>
            <div class="form-box">
                <label id="tanggal">Tanggal Pesanan</label><br>
                <input type="date" name="tanggal" placeholder="dd/mm/yyyy">
            </div>
            <button type="submit" class="simpan" name="tblsubmit"><i class="fa-regular fa-floppy-disk"></i>  Tambah</button>
            <button type="button" class="close"><i class="fa-solid fa-xmark"></i>  Batal</button> 
        </form>
    </div>
</div>

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
                    <input type="number" name="berat" placeholder="Berat (KG)" autocomplete="off"><br>
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
                    <input type="text" name="harga" placeholder="Harga (Rp)" onkeyup="formatRupiah(this)" autocomplete="off"><br>                    
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

    <!-- Popup Keluar Start -->
    <div class="modal" id="modalKeluar">
        <div class="keluarku">
            <p>Anda yakin ingin keluar?</p>
            <a href="keluar.php"><button class="simpan">Ya</button></a>
            <button class="close" id="tidakKeluar">Tidak</button>
        </div>
    </div>
    <!-- Popup Keluar End -->

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
//Konfirmasi Keluar
var keluar = document.getElementById("modalKeluar");
var tidak = document.getElementById("tidakKeluar");
function openKeluarPopup() {
    keluar.style.display = "flex";
}
tidak.onclick = function() {
    keluar.style.display = "none";
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
function formatRupiah(input) {
    // Mengambil nilai tanpa karakter non-digit
    let nominal = input.value.replace(/\D/g, '');

    // Memastikan nilai yang dimasukkan bukan karakter kosong atau non-digit
    if (nominal !== "") {
        // Menambahkan pemisah ribuan
        nominal = parseInt(nominal, 10).toLocaleString('in-id');

        // Menetapkan nilai yang sudah diformat kembali ke input
        input.value = nominal;
    }
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