<?php
    require_once '../vendor/autoload.php';
    session_start();
    include '../model/database.php';
    $db=new database();

    unset ($_SESSION['loginadmin']);
    unset ($_SESSION['loginseller']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styleproduk.css">
    <link rel="stylesheet" href="../css/styleprofil.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/png" href="temp/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="temp/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="temp/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="temp/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="temp/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="temp/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="temp/css/util.css">
	<link rel="stylesheet" type="text/css" href="temp/css/main.css">
	<link rel="stylesheet" type="text/css" href="temp/css/style.css">
    <link rel="stylesheet" href="../css/boostrap.min.css">
    <link rel="stylesheet" href="styleinput.css">
    <title>HOME</title>
</head>
        <!-- chek session login google akun -->
        <?php
            if (!empty($_SESSION['nama_user'])) {
        ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="btn btn-primary" href="../controler/logout.php">
                <?php
                if (!empty($_SESSION['nama_user'])){
                    echo "LOGOUT";
                }else{
                    echo "LOGIN";
                }
                ?>
                <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../view/profil.php">PROFIL <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                LOGIN AS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <p color="green" class="dropdown-item" data-toggle="modal" data-target="#loginadmin" >Admin</p>
                    <a class="dropdown-item" data-toggle="modal" data-target="#loginseller" >Seller</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../view/referensi.php">REFERENSI</a>
            </li>
            </ul>
            <form action="../controler/proses.php?aksi=cari" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="cari" placeholder="Search" aria-label="Search">
                <input type="hidden" name="aksi" value="cari">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- SESSION ALERT SAAT GAGAL LOGIN -->
    <?php
        if (!empty($_SESSION['chek'])) {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Gagal Login !</strong> Masukkan Username dan Password yang benar..
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            unset ($_SESSION['chek']);
        }
        ?>
<body>
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <div class="effect2 spasi">
                    <div class="table"><?php
                    echo '<div class="panel-heading">Selamat Datang  | Di Toko Online Kami</div><div class="panel-body">';
                    echo '<p class="user_welcom"e><b>User Name :</b> '.$_SESSION['nama_user'].' '.$_SESSION['nama_user_2'].'<br>'.'</p>';
                    ?>
                    </div>
                </div>
            </div>

<div class="bg">
    <div class="isi">
        <div class="tengah">
            <div class="container">
                <!-- TAMPIL DATA ADMIN -->
                <table class="table" border=2px>
                    <div class="shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="spasi">
                            <div class="table">
                            <div class="blog-posts">
                                <?php
                                    $no=1;
                                    foreach ($db->tampil_data_barang() as $x) {
                                ?>
                                    <div class="post">
                                    <img src="../img/<?php echo $x['lokasi']; ?>" alt="" class="post-img">
                                    <div href="../view/view.php" class="post-content">
                                        <h3>
                                        <dt>Nama  : <?php echo $x['nama']; ?></dt><br>
                                        <dt>Harga : <?php echo $x['harga'];?></dt><br>
                                        <dt>Stok  : <?php echo $x['stok']; ?></dt><br>
                                        <dt>Jenis : <?php echo $x['jenis'];?></dt><br>
                                        </h3>
                                        <span class="date">
                                        <div class="cell" data-title="Aksi">
                                            <a href="../view/profil.php?">BELI BARANG</a>
                                        </div>
                                        </span>
                                    </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="pop-upp">
    <!-- SELLER LOGIN POP-UP -->
    <div class="modal fade" id="loginseller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">LOGIN SELLER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- INPUT DATA -->
                    <form action="../controler/control.php?aksi=loginseller" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Seller">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="passw" placeholder="Password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ADMIN LOGIN POP-UP -->
    <div class="modal fade" id="loginadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">LOGIN ADMIN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- INPUT DATA -->
                    <form action="../controler/control.php?aksi=loginadmin" method="POST">
                        <div class="form-group">
                            <input name="nama" type="text" class="form-control" placeholder="Nama Admin">
                        </div>

                        <div class="form-group">
                            <input name="passw" type="password" class="form-control" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
     }else{ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>ALERT !!!</strong><br>Tidak dapat memuat data<br>SILAHKAN LOGIN MENGGUNAKAN AKUN GOOGLE TERLEBIH DAHULU<br><br>
            <a class="btn btn-primary" href="../">LOGIN</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
?>
<!-- SCRIPT -->
<div class="cript">
    <script>
        <script src="temp/vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="temp/vendor/bootstrap/js/popper.js"></script>
        <script src="temp/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="temp/vendor/select2/select2.min.js"></script>
        <script src="temp/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </script>
</div>
</body>
</html>