<?php
    session_start();
    include '../model/database.php';
    $db = new database();
    $aksi = $_GET['aksi'];

    // AKSI UNTUK ADMIN
    if ($aksi=="tambah_admin") {
        $db->input_admin($_POST['nama'],$_POST['passw'],$_POST['tgl_lahir'],$_POST['alamat'],$_POST['pendidikan']);
        header("location:../view/viewadmin.php");
    }elseif($aksi=="hapus_admin") {
        $db->hapus_admin($_GET['id']);
        header("location:../view/viewadmin.php");
    }elseif($aksi=="update_admin"){
        $db->update_admin($_POST['id'],$_POST['nama'],$_POST['passw'],$_POST['tgl_lahir'],$_POST['alamat'],$_POST['pendidikan']);
        header("location:../view/viewadmin.php");
    }
    
    // AKSI UNTUK seller
    if ($aksi=="tambah_seller") {
            $db->input_seller($_POST['nama'],$_POST['passw'],$_POST['tgl_lahir'],$_POST['alamat'],$_POST['biodata']);
            header("location:../view/viewadmin.php");
        }elseif($aksi=="hapus_seller") {
            $db->hapus_seller($_GET['id']);
            header("location:../view/viewadmin.php");
        }elseif($aksi=="update_seller"){
            $db->update_seller($_POST['id'],$_POST['nama'],$_POST['passw'],$_POST['tgl_lahir'],$_POST['alamat'],$_POST['biodata']);
            header("location:../view/viewadmin.php");
    }

    // AKSI UNTUK BARANG
    if ($aksi=="tambah_barang") { 
        // CHEK FILE APAKAH EROR
        if ($_FILES["file"]["error"]>0) {
            $_SESSION['insertbarang']="eror";
            header("location:../view/viewseller.php");
            // echo "Error".$_FILES["file"]["error"]."<br>";
        } else {
            $uploadfolder="../img/";
            $namaFile=$_FILES["file"]["name"]; 
            $tmp=$_FILES["file"]["tmp_name"];
            $lokasi=".$uploadfolder.'/'.$namaFile";
            $namaFile; move_uploaded_file($tmp,"$uploadfolder/$namaFile");
            $db->input_barang($_POST['nama'],$_POST['harga'],$_POST['stok'],$_POST['jenis'],$namaFile);
            header("location:../view/viewseller.php");
        }
    }elseif($aksi=="hapus_barang") {
        $db->hapus_barang($_GET['id']);
        header("location:../view/viewseller.php");
    }elseif($aksi=="update_barang"){
        $db->update_barang($_POST['id'],$_POST['nama'],$_POST['harga'],$_POST['stok'],$_POST['jenis']);
        header("location:../view/viewseller.php");
    }
?>