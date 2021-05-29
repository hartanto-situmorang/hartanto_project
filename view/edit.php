<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylea.css">
    <link rel="stylesheet" href="../https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style>
        body{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    </style>
</head>
<body>
<?php
        include '../model/database.php';
        $db= new database();
        $aksi = $_GET['aksi'];

        //AKSI UNTUK ADMIN
        if ($aksi=="edit_admin"){
        ?>
            <div class="tengah">
                <div class="tengah2">
                    <h1>EDIT DATA ADMIN</h1>
                    <div class="shadowdiv">
                    <div class="forminput">
                        <div class="spasi">
                            <form action="../controler/proses.php?aksi=update_admin" method="POST">
                                <?php
                                foreach ($db->edit_admin($_GET['id']) as $d) {
                                ?>
                                    <div class="form-group row" action="../controler/proses.php?aksi=update_admin" method="POST">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input name="id" type="hidden" value="<?php echo $d['id']?>">
                                            <input name="nama" type="text" class="form-control" value="<?php echo $d['nama']?>">
                                        </div>

                                        <label for="passw" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input name="passw" type="text" class="form-control" value="<?php echo $d['password']?>">
                                        </div>

                                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input name="tgl_lahir" type="date" class="form-control" value="<?php echo $d['tgl_lahir']?>">
                                        </div>

                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input name="alamat" type="text" class="form-control" value="<?php echo $d['alamat']?>">
                                        </div>

                                        <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-10">
                                            <input name="pendidikan" type="text" class="form-control" value="<?php echo $d['pendidikan']?>">
                                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                            </form>
                            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                                <a class="btn btn-outline-dark" href="../view/viewadmin.php">Kembali</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }

        //DATA DARI SELLER
        elseif($aksi=="edit_seller"){
            ?>
            <div class="tengah">
                <div class="tengah2">
                    <h1 style="color: rgb(40, 167, 69) ;">EDIT DATA SELLER</h1>
                    <div class="shadowdiv">
                    <div class="forminput">
                        <div class="spasi">
                            <form action="../controler/proses.php?aksi=update_seller" method="POST">
                                <?php
                                foreach ($db->edit_seller($_GET['id']) as $d) {
                                ?>
                                    <div class="form-group row" action="../controler/proses.php?aksi=update_seller" method="POST">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input name="nama" type="text" class="form-control" value="<?php echo $d['nama']?>">
                                            <input name="id" type="hidden" value="<?php echo $d['id']?>">
                                        </div>

                                        <label for="passw" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input name="passw" type="text" class="form-control" value="<?php echo $d['password']?>">
                                        </div>

                                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input name="tgl_lahir" type="date" class="form-control" value="<?php echo $d['tgl_lahir']?>">
                                        </div>

                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                            <input name="alamat" type="text" class="form-control" value="<?php echo $d['alamat']?>">
                                        </div>

                                        <label for="biodata" class="col-sm-2 col-form-label">Biodata</label>
                                        <div class="col-sm-10">
                                            <input name="biodata" type="text" class="form-control" value="<?php echo $d['biodata']?>">
                                            <button type="submit" class="btn btn-success">Simpan Data</button>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                            </form>
                            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                                <a class="btn btn-outline-dark" href="../view/viewadmin.php">Kembali</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }

        //EDIT DATA UNTUK BARANG
        elseif($aksi=="edit_barang"){
            ?>
            <div class="tengah">
                <div class="tengah2">
                    <h1 style="color: rgb(40, 167, 69) ;">EDIT DATA BARANG</h1>
                    <div class="shadowdiv">
                    <div class="forminput">
                        <div class="spasi">
                            <form action="../controler/proses.php?aksi=update_barang" method="POST">
                                <?php
                                foreach ($db->edit_barang($_GET['id']) as $d) {
                                ?>
                                    <div class="form-group row" action="../controler/proses.php?aksi=update_barang" method="POST">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input name="nama" type="text" class="form-control" value="<?php echo $d['nama']?>">
                                            <input name="id" type="hidden" value="<?php echo $d['id']?>">
                                        </div>

                                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input name="harga" type="number" class="form-control" value="<?php echo $d['harga']?>">
                                        </div>

                                        <label for="stok" class="col-sm-2 col-form-label">Jumlah Stok</label>
                                        <div class="col-sm-10">
                                            <input name="stok" type="number" class="form-control" value="<?php echo $d['stok']?>">
                                        </div>

                                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                                        <div class="col-sm-10">
                                            <input name="jenis" type="text" class="form-control" value="<?php echo $d['jenis']?>">
                                        </div>
                                        <label for="jenis" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success">Simpan Data</button>
                                            <a class="btn btn-outline-dark" href="../view/viewseller.php">Kembali</a>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
?>
</body>