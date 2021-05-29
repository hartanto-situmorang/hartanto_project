
<link rel="stylesheet" href="../model/style.css">
<?php
    class database{
        var $host='localhost';
        var $uname ='root';
        var $pass= "";
        var $db = "Hartanto_UTS";
        var $con;

        function __construct(){
            $this->con= mysqli_connect($this->host,$this->uname,$this->pass,$this->db);
            mysqli_select_db($this->con,$this->db);
        }
        
        function tampil_data_admin(){
            $data=mysqli_query($this->con,"select * from admin");
            while ($db=mysqli_fetch_array($data)) {
            $daftar_admin[]=$db;
            }
            return $daftar_admin;
        }
        function input_admin($nama,$passw,$tgl_lahir,$alamat,$pendidikan){
            mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "insert into admin
            values('','$nama','$passw','$tgl_lahir','$alamat','$pendidikan')");
        }

        function hapus_admin($id){
            mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "delete from admin
            where id='$id'");   
        }

        function edit_admin($id){
            $data = mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "select * from admin
            where id='$id'");
                while ($db=mysqli_fetch_array($data)) {
                        $daftar_admin[]=$db;
                    }
                    return $daftar_admin;
                }
        function update_admin($id,$nama,$passw,$tgl_lahir,$alamat,$pendidikan){
            $data = mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), 
            "update admin set nama='$nama',password='$passw',tgl_lahir='$tgl_lahir',alamat='$alamat',pendidikan='$pendidikan'
            where id='$id'");
        }    
        
        //CLASS-CLASS UNTUK DATA SELLER
        function tampil_data_seller(){
            $data=mysqli_query($this->con,"select * from seller");
            while ($db=mysqli_fetch_array($data)) {
            $daftar_seller[]=$db;
            }
            return $daftar_seller;
        }
        function input_seller($nama,$passw,$tgl_lahir,$alamat,$biodata){
            mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "insert into seller
            values('','$nama','$passw','$tgl_lahir','$alamat','$biodata')");
        }

        function hapus_seller($id){
            mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "delete from seller
            where id='$id'");   
        }

        function edit_seller($id){
            $data = mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "select * from seller
            where id='$id'");
                while ($db=mysqli_fetch_array($data)) {
                        $daftar_seller[]=$db;
                    }
                    return $daftar_seller;
                }
        function update_seller($id,$nama,$passw,$tgl_lahir,$alamat,$biodata){
            $data = mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), 
            "update seller set nama='$nama',password='$passw',tgl_lahir='$tgl_lahir',alamat='$alamat',biodata='$biodata'
            where id='$id'");
        }    

        //CLASS-CLASS UNTUK DATA BARANG
        
        function tampil_data_barang(){
            $data=mysqli_query($this->con,"select * from barang");
            while ($db=mysqli_fetch_array($data)) {
                $daftar_barang[]=$db;
            }
            return $daftar_barang;
        }
        function input_barang($nama,$harga,$stok,$jenis,$namaFile){
            mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "insert into barang
            values('','$nama','$harga','$stok','$jenis','$namaFile')");
        }

        function hapus_barang($id){
            mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "delete from barang
            where id='$id'");   
        }

        function edit_barang($id){
            $data = mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), "select * from barang
            where id='$id'");
                while ($db=mysqli_fetch_array($data)) {
                        $daftar_barang[]=$db;
                    }
                    return $daftar_barang;
                }
        function update_barang($id,$nama,$harga,$stok,$jenis){
            $data = mysqli_query(mysqli_connect($this->host,$this->uname,$this->pass,$this->db), 
            "update barang set nama='$nama',harga='$harga',stok='$stok',jenis='$jenis'
            where id='$id'");
        }    
        }
?>