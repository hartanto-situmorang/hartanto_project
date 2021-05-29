create database Hartanto_UTS;

use Hartanto_UTS;

CREATE TABLE `admin`(
  `id` int(13) auto_increment,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100),
  `tgl_lahir` varchar(100),
  `alamat` varchar(100),
  `pendidikan` varchar(100),
  PRIMARY KEY (`id`)
);

INSERT INTO `admin` (`id`, `nama`, `password`, `tgl_lahir`, `alamat`, `pendidikan`)
VALUES
('1', 'admin', 'admin123', '2001-01-01', 'Toba Samosir', 'D4'),
('2', 'hartanto', 'hartanto123', '2001-02-03', 'Rumbai Atas', 'S1');

CREATE TABLE `seller`(
  `id` int(12) auto_increment,
  `nama` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_lahir` date,
  `alamat` varchar(200),
  `biodata` varchar(100),
  PRIMARY KEY (`id`)
);

INSERT INTO `seller` (`id`, `nama`, `password`, `tgl_lahir`, `alamat`, `biodata`)
VALUES
('1', 'seller', 'seller123', '2001-01-01','Amerika Serikat','If you cannot do great things, do small things in a great way.'),
('2', 'Sufriadi', 'Sufriadi123', '2001-02-03', 'Rumbai Timur', 'Without hustle, talent will only carry you so far');

CREATE TABLE `barang`(
  `id` int(12) auto_increment,
  `nama` varchar(200) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `lokasi` varchar(100),  -- lokasi untuk posisi gambar hasil upload
  PRIMARY KEY (`id`)
);

INSERT INTO `barang` (`id`, `nama`, `harga`, `stok`, `jenis`, `lokasi`) 
VALUES
('1', 'Jam Tangan Rolex', '90000000', '1', 'Aksesoris','6.jpg'),
('2', 'Headset', '150000', '100', 'Elektronik','1.jpg'),
('3', 'sepatu', '300000', '80', 'Pakaian','3.jpg'),
('4', 'Laptop GAMING', '15000000', '5', 'Elektronik','4.jpg'),
('5', 'Tas Cantik', '50000', '21', 'Alat Sekolah','5.jpg'),
('6', 'Jam tangan', '200000', '20', 'Aksesoris','2.jpg');
