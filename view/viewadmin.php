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
</head>
<body>

    <?php
        if (!empty($_SESSION['nama_user'])){
            if(!empty($_SESSION["loginadmin"])){
    ?>

<!-- MENU NAVBAR -->
<div class="spasi">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="btn btn-outline-dark" href="../view/view.php">Logout</a>
                </li>
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
                <a class="alert-warning">WELCOME ADMIN !</a>
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
            if (!empty($_SESSION['admin'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eror Insert Admin!</strong> Coba chek kembali data sebelum insert
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset ($_SESSION['admin']);
            }else if(!empty($_SESSION['seller'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eror Insert Seller!</strong> Coba chek kembali data sebelum insert
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset ($_SESSION['seller']);
            }
        ?>
                    <!-- TAMPIL DATA ADMIN -->
                <form>
                    <table class="table" border=2px>
                    <div class="shadow-lg p-3 mb-5 bg-white rounded">
                        <a class="btn btn-success" data-toggle="modal" data-target="#adminpop" >Tambahkan Admin</a>
                        <div class="spasi">
                            <div class="table">
                                <div class="row header">
                                    <div style=" background-color: 	rgb(40, 167, 69) ;" class="cell">Nama admin</div>
                                    <div style=" background-color: 	rgb(40, 167, 69) ;" class="cell">Tgl_Lahir</div>
                                    <div style=" background-color: 	rgb(40, 167, 69) ;" class="cell">Alamat</div>
                                    <div style=" background-color: 	rgb(40, 167, 69) ;" class="cell">Pendidikan</div>
                                    <div style=" background-color: 	rgb(40, 167, 69) ;" class="cell">Tindakan</div>
                                    <div style=" background-color: 	rgb(40, 167, 69) ;" class="cell"></div>
                                </div>
                                        <!-- ISI -->
                                <?php
                                    $no=1;
                                    foreach ($db->tampil_data_admin() as $x) {
                                ?>
                                <div class="row">
                                    <div class="cell" data-title="Nama Admin">
                                        <?php echo $x['nama']; ?>
                                        </div>
                                    <div class="cell" data-title="Tanggal Lahir">
                                        <?php echo $x['tgl_lahir']; ?>
                                        </div>
                                    <div class="cell" data-title="Alamat">
                                        <?php echo $x['alamat']; ?>
                                        </div>
                                    <div class="cell" data-title="Pendidikan">
                                        <?php echo $x['pendidikan']; ?>
                                        </div>
                                    <div class="cell" data-title="Aksi">
                                        <a href="../view/edit.php?id=<?php echo $x['id']; ?>&aksi=edit_admin">Edit</a>
                                        </div>
                                    <div class="cell" data-title="Aksi">
                                        <a 
                                            onclick="return confirm('Yakin ingin menghapus <?php echo $x['nama']; ?> ?')"
                                            href="../controler/proses.php?id=<?php echo $x['id']; ?>&aksi=hapus_admin" >
                                        Hapus </a>
                                        </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- TAMPIL DATA SELLER -->
                <form>
                    <table class="table" border=2px>
                    <div class="shadow-lg p-3 mb-5 bg-white rounded">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#sellerpop" >Tambahkan Seller</a>
                        <div class="spasi">
                            <div class="table">
                                <div class="row header">
                                    <div class="cell">Motivasi</div>
                                    <div class="cell">Nama Seller</div>
                                    <div class="cell">Tgl_Lahir</div>
                                    <div class="cell">Alamat</div>
                                    <div class="cell">Tindakan</div>
                                    <div class="cell"></div>
                                </div>
                                        <!-- ISI -->
                                <?php
                                    $no=1;
                                    foreach ($db->tampil_data_seller() as $x) {
                                ?>
                                <div class="row">
                                    <div class="cell" data-title="Full Name">
                                        <?php echo $x['biodata']; ?>
                                        </div>
                                    <div class="cell" data-title="Full Name">
                                        <?php echo $x['nama']; ?>
                                        </div>
                                    <div class="cell" data-title="Full Name">
                                        <?php echo $x['tgl_lahir']; ?>
                                        </div>
                                    <div class="cell" data-title="Full Name">
                                        <?php echo $x['alamat']; ?>
                                        </div>
                                    <div class="cell" data-title="Full Name">
                                        <a href="../view/edit.php?id=<?php echo $x['id']; ?>&aksi=edit_seller">Edit</a>
                                        </div>
                                    <div class="cell" data-title="Full Name">
                                        <a 
                                            onclick="return confirm('Yakin ingin menghapus <?php echo $x['nama']; ?> ?')"
                                            href="../controler/proses.php?id=<?php echo $x['id']; ?>&aksi=hapus_seller">
                                        Hapus   </a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>

        <!-- Seller POP-UP -->
    <div class="modal fade" id="sellerpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">INSERT SELLER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- INSERT DATA -->
            <form action="../controler/proses.php?aksi=tambah_seller" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Nama Seller">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="passw" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="biodata" placeholder="Biodata">
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

        <!--Admin POP-UP -->
    <div class="modal fade" id="adminpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">INSERT ADMIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- INSERT DATA -->
            <form action="../controler/proses.php?aksi=tambah_admin" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Nama Admin">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="passw" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan">
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
        } else{ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>ALERT !!!</strong><br>Tidak dapat memuat data<br>SILAHKAN LOGIN SEBAGAI ADMIN TERLEBIH DAHULU...<br><BR>
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