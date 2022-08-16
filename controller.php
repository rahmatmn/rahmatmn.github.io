<?php
include 'koneksi.php';
// // Inisial Penampilan Data
//     $no = 1;
//     $tampil = mysqli_query($conn, "SELECT * FROM tbarang order by id_barang desc");
//     while($data = mysqli_fetch_array($tampil)) :    

// tombol simpan
if(isset($_POST['tsimpan'])){
    // data baru disimpan
    $simpan = mysqli_query($conn, "INSERT INTO tbarang (kode, nama, asal, jumlah, satuan, tanggal_diterima) VALUE ('$_POST[kode_barang]', '$_POST[nama_barang]', '$_POST[asal_barang]', '$_POST[jumlah_barang]', '$_POST[ket_satuan]', '$_POST[tanggalditer]')");

    // uji sukses
    if($simpan){
        echo "<script> 
        alert('Simpan Data Sukses!'); 
        document.location='index.php';        
        </script>";
    }else{
        echo "<script> 
        alert('Simpan Data Gagal!'); 
        document.location='index.php';        
        </script>";
    }
}

// deklarasi variable data edit
$vkode = "";
$vnama = "";
$vasal = "";
$vjumlah = "";
$vsatuan = "";
$vtanggalditer = "";

// tombol edit dan hapus
if(isset($_GET['hal'])){
    // uji edit
    if($_GET['hal'] == "edit"){
        // tampil data edit
        $tampil = mysqli_query($conn, "SELECT * FROM tbarang WHERE id_barang = '$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        // jika data ditemukan ditampung ke deklarasi variable
        if($data){
            $vkode = $data['kode'];
            $vnama = $data['nama'];
            $vasal = $data['asal'];
            $vjumlah = $data['jumlah'];
            $vsatuan = $data['satuan'];
            $vtanggalditer = $data['tanggal_diterima'];
        }
    }
}

?>