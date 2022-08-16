
<?php
include 'koneksi.php';

// // Inisial Penampilan Data
//     $no = 1;
//     $tampil = mysqli_query($conn, "SELECT * FROM tbarang order by id_barang desc");
//     while($data = mysqli_fetch_array($tampil)) :    

// tombol simpan
if(isset($_POST['tsimpan'])){
    // uji data apakah disimpan atau edit
    if(isset($_GET['hal'])== "edit"){
        // edit data
        $edit = mysqli_query($conn, "UPDATE tbarang SET nama = '$_POST[nama_barang]', asal = '$_POST[asal_barang]', jumlah = '$_POST[jumlah_barang]', satuan = '$_POST[ket_satuan]', tanggal_diterima = '$_POST[tanggalditer]' WHERE id_barang = '$_GET[id]'");
        // uji edit sukses 
        if($edit){
            
            echo "<script>
            document.location='index.php';        
            </script>";

            
        }else{
            echo "<script> 
            alert('Edit Data Gagal!'); 
            document.location='index.php';        
            </script>";
            
        }
    
    }else{
        // data baru disimpan
        $simpan = mysqli_query($conn, "INSERT INTO tbarang (kode, nama, asal, jumlah, satuan, tanggal_diterima) VALUE ('$_POST[kode_barang]', '$_POST[nama_barang]', '$_POST[asal_barang]', '$_POST[jumlah_barang]', '$_POST[ket_satuan]', '$_POST[tanggalditer]')");
        // uji simpan sukses
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
}

// deklarasi variable data edit
$vkode = "";
$vnamabarang = "";
$vasal = "";
$vjumlah = "";
$vsatuan = "";
$vtanggalditer = "";

// tombol edit dan hapus
if(isset($_GET['hal'])){
    // uji edit
    if($_GET['hal'] == "edit"){
        // tampil data edit
        $id = $_GET['id'];
        $tampil = mysqli_query($conn, "SELECT * FROM tbarang WHERE id_barang = '$id'");
        $data = mysqli_fetch_array($tampil);
        
        // jika data ditemukan ditampung ke deklarasi variable
        if($data){
            $vkode = $data['kode'];
            $vnamabarang = $data['nama'];
            $vasal = $data['asal'];
            $vjumlah = $data['jumlah'];
            $vsatuan = $data['satuan'];
            $vtanggalditer = $data['tanggal_diterima'];
        }
    }
}

?>