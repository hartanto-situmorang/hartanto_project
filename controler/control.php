<?php
    session_start();
    include '../model/database.php';
    $db = new database();
    $aksi = $_GET['aksi'];
    
    if ($aksi=="tambah") {
        $db->input($_POST['nama'],$_POST['alamat'],$_POST['usia']);
        header("location: ../view/tampil.php");

    } elseif($aksi=="hapus") {
        $db->hapus($_GET['id']);
        header("location:../view/tampil.php");

    }elseif($aksi=="update"){
        $db->update($_POST['id'],$_POST['nama'],$_POST['alamat'],$_POST['usia']);
        header("location:../view/tampil.php");
    }

    // CHEK LOGIN ADMIN
    if ($aksi=="loginadmin") {
        $nama=$_POST["nama"];
        $password=$_POST["passw"];
        foreach ($db->tampil_data_admin() as $admin) {
            if(strcasecmp($nama, $admin['nama'] ) == 0 && ($password == $admin['password'] )) {
                $_SESSION["loginadmin"]="berhasil";
            }
        }
        
        if (!empty($_SESSION['loginadmin'])) {
            $_SESSION["loginadmin"]="berhasil";
            header("location:../view/viewadmin.php");
        }else{
            $_SESSION["chek"]="berhasil";
            header("location:../view/view.php");
        }

    // CHEK LOGIN SELLER
    } elseif($aksi=="loginseller") {
        $nama=$_POST["nama"];
        $password=$_POST["passw"];
        foreach ($db->tampil_data_seller() as $seller) {
            if(strcasecmp($nama,$seller['nama'] ) == 0 && ($password == $seller['password'] )) {
                $_SESSION["loginseller"]="berhasil";
            }
        }
        
        if (!empty($_SESSION['loginseller'])) {
            header("location:../view/viewseller.php");
        }else{
            $_SESSION["chek"]="berhasil";
            header("location:../view/view.php");
        }
    }

?>