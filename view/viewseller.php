<?php
    session_start();
        include '../model/database.php';
        $db=new database();
?>
<!DOCTYPE html>
<html>
<head>
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
    <link rel="stylesheet" href="../css/styleproduk.css">
</head>
<body>
<?php
        if (!empty($_SESSION['nama_user'])){
            if (!empty($_SESSION['loginseller'])) {
        
            ?>
<!-- MENU NAVBAR -->
<div class="spasi">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="btn btn-outline-dark" href="../view/view.php">Logout</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../view/view.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/profil.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/referensi.php">Source</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a class="alert-warning">WELCOME SELLER !</a>
            </form>
        </div>
    </nav>
</div>

<div class="bg">
    <div class="isi">
        <div class="tengah">
            <div class="container">

        <!-- CHEK INSERT JIKA EROR AKAN MENAMPILKAN ALERT -->
        <?php
            if (!empty($_SESSION['insertbarang'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eror Insert Barang!</strong> Coba chek kembali data sebelum menyimpan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset ($_SESSION['insertbarang']);
            }
        ?>
                    <!-- TAMPIL DATA Barang -->
                    <form>
                    <table class="table" border=2px>
                    <div class="shadow-lg p-3 mb-5 bg-white rounded">
                        <a class="btn btn-success" data-toggle="modal" data-target="#barang" >Tambahkan Barang</a>
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
                                            <a href="../view/edit.php?id=<?php echo $x['id']; ?>&aksi=edit_barang">Edit</a>
                                            <a 
                                            onclick="return confirm('Yakin ingin menghapus <?php echo $x['nama']; ?> ?')"
                                            href="../controler/proses.php?id=<?php echo $x['id']; ?>&aksi=hapus_barang&lokasi=<?php echo $x['lokasi']; ?>" >
                                            Hapus </a>
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
                </form>


<!-- Barang POP-UP -->
    <div class="modal fade" id="barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH BARANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                <!-- INSERT DATA -->
                <form action="../controler/proses.php?aksi=tambah_barang" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" name="nama" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="harga" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="stok" placeholder="Banyak Stok">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="jenis" placeholder="Jenis Barang">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name="file" id="file" placeholder="Pilih Gambar"><br>
                        <input type="hidden" value="tambah_barang" name="aksi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
            </form>
        </div>
    </div>


            </div>
        </div>
    </div>
</div>
<?php
            }else{ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>ALERT !!!</strong><br>Tidak dapat memuat data<br>SILAHKAN LOGIN SEBAGAI SELLER TERLEBIH DAHULU<br><BR>
                        <a class="btn btn-outline-dark" href="../view/view.php">Login</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
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
</body>
</html>