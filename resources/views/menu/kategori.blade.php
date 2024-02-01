@extends('component.layout')
@section('title','Kategori - E-Laundry')

@section('content')
{{-- Content Start --}}
@if ($message = Session::get('success'))
    <div class="notif" id="notif">
        {{$message}}
        <button class="clsnotif"><i class="fa-solid fa-xmark"></i></button>
    </div>
@endif
<div class="popbox">
    <button type="button" id="myBtn" class="tambah">
        <img src="gambar/tambah.svg">
        <p>Tambah</p>   
    </button>
    <table class="table_dt" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Harga/KG</th>
                <th>Hari</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if(!$kategori->isEmpty())
                <?php $no=1; ?>
                @foreach($kategori as $data)
                @php
                    $harga_rupiah = "Rp" . number_format($data->harga, 0, ',', '.');
                    $tanggal = date("d-M-Y", strtotime($data->tanggal));
                @endphp
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $data->nama_kategori }}</td>
                        <td>{{ $harga_rupiah }}</td>
                        <td>{{ $data->hari }}</td>
                        <td class="action">
                            <a onclick="openEditPopup({{ $data->id }});" title="Edit"><button class="edit"><i class="fa-regular fa-pen-to-square"></i></button></a> 
                            <button title="Hapus" class="btnHapus" onclick="openHapusPopup({{ $data->id }}, '{{ $data->nama_kategori }}');"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
                </tr>
                @else
                <tr>
                    <td style="text-align:center;font-weight: 350;" colspan="5">Data tidak tersedia di tabel</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
{{-- Content End --}}
@endsection

@section('modal')
<!-- Popup Tambah Start-->
<div id="myModal" class="modal">
    <div class="modal-content" style="height: 22rem">
        <p>Formulir Tambah Kategori</p>
        <form class="ftambah" action="{{route('kategori.store')}}" method="POST">
            @csrf
            <div class="form-box">
                <label id="nama_kategori">Nama Kategori</label><br>
                <input type="text" name="nama_kategori" placeholder="Nama Kategori" required><br>
            </div>
            <div class="form-box">
                <label id="harga">Harga (Rp) </label><br>
                <input type="text" name="harga" placeholder="Harga (Rp)" onkeyup="formatRupiah(this)" required><br>                    
            </div>
            <div class="form-box">
                <label id="berat">Hari</label><br>
                <input type="number" name="hari" placeholder="Hari" required><br>
            </div>
            <button type="submit" class="simpan" name="tblsubmit"><i class="fa-regular fa-floppy-disk"></i>  Tambah</button>
            <button type="button" class="close"><i class="fa-solid fa-xmark"></i>  Batal</button> 
        </form>
    </div>
</div>
<!-- Popup Tambah End -->

<!-- Popup Edit Start -->
<div id="myModalEdit" class="modal" id="edit_harga">
    <div class="modal-content" style="height: 22rem">
        <p>Formulir Edit Kategori</p>
        <form class="fedit" action="" method="POST" id="form-edit">
            @csrf @method('put')
            <div class="form-box">
                <label id="nama_kategori">Nama Kategori</label><br>
                <input type="text" name="nama_kategori" placeholder="Nama Kategori" required><br>
            </div>
            <div class="form-box">
                <label id="harga">Harga (Rp) </label><br>
                <input type="text" name="harga" placeholder="Harga (Rp)" onkeyup="formatRupiah(this)" required><br>                    
            </div>
            <div class="form-box">
                <label id="berat">Hari</label><br>
                <input type="number" name="hari" placeholder="Hari" required><br>
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
        <form action="" id="hapusLink" method="POST">
            @csrf @method('delete')
            <button class="simpan" type="submit">Ya</button>
        </form>
        <button class="close" id="tidakHapus">Tidak</button>
    </div>
</div>
<!-- Popup Hapus End -->
@endsection

@section('script')
<script>

//Popup Tambah
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[1];
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
var span2 = document.getElementsByClassName("close")[2];
span2.onclick = function() {
  modal2.style.display = "none";
}

//Konfirmasi Hapus
var btnHapus = document.getElementsByClassName("btnHapus");
var modalHapus = document.getElementById("modalHapus");
var tidakHapus = document.getElementById("tidakHapus");

function openHapusPopup(id, nama_kategori) {
    modalHapus.style.display = "flex";

    var pesanHapus = document.getElementById('pesanHapus');
    pesanHapus.innerHTML = "Apakah Anda yakin akan menghapus kategori <b>" + nama_kategori + "</b>?";
    var hapusLink = document.getElementById('hapusLink');
    hapusLink.action = '{{ route("kategori.destroy", ["kategori" => ":id"]) }}'.replace(':id', id);
}
tidakHapus.onclick = function() {
    modalHapus.style.display = "none";
}

//Menutup Notifikasi
var clsnotif = document.getElementsByClassName("clsnotif")[0];
clsnotif.onclick = function() {
  notif.style.display = "none";
}

//Popup Edit

function openEditPopup(id) {
    var modal = document.getElementById("myModalEdit");
    modal.style.display = "flex";

    var form = document.querySelector('.fedit');
    form.reset(); // Reset form sebelum menampilkan

    var actionform = document.getElementById('form-edit');
    actionform.action = '{{ route("kategori.update", ["kategori" => ":id"]) }}'.replace(':id', id);

    // Fetch data transaksi yang dipilih untuk diedit
    fetch('/kategori/'+id+'/edit')
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal mengambil data dari server');
            }
            return response.json();
        })
        .then(data => {
            // Mengisi nilai form dengan data yang diterima
            document.querySelector('.fedit input[name="nama_kategori"]').value = data.nama_kategori;
            var formattedHarga = new Intl.NumberFormat('id-ID').format(data.harga);
            document.querySelector('.fedit input[name="harga"]').value = formattedHarga;
            document.querySelector('.fedit input[name="hari"]').value = data.hari;
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