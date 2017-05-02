<?php
include_once 'data.php';
$con = new connect();

// data insert code starts here.
if(isset($_POST['btn-save']))
{
 $nim = $_POST['nim'];
 $nama = $_POST['nama'];
 $alamat = $_POST['alamat'];
 $kota = $_POST['kota'];
 $jurusan = $_POST['jurusan'];
 $con->setdata("INSERT INTO siswa(nim,nama,alamat,kota,jurusan) VALUES('$nim','$nama','$alamat','$kota','$jurusan')");
 header("Location: index.php");
}
// data insert code ends here.

// code for fetch user data via QueryString URL 
if(isset($_GET['edit_id']))
{
 $res=$con->getdata("SELECT * FROM siswa WHERE id=".$_GET['edit_id']);
 $row=mysql_fetch_array($res);
}
// code for fetch user data via QueryString URL 

// data update condition
if(isset($_POST['btn-update']))
{
 $con->setdata("UPDATE siswa SET nim='".$_POST['nim']."',
           nama='".$_POST['nama']."',
           alamat='".$_POST['alamt']."'
		   kota='".$_POST['kota']."'
		   jurusan='".$_POST['jurusan']."'
          WHERE id=".$_GET['edit_id']);
 header("Location: index.php");
}
// data update condition

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Mahasiswa</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Data Mahasiswa<a href="http://tobiweb.id" target="_blank"></a></label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td align="center"><a href="index.php">Kembali Ke Halaman Awal</a></td>
    </tr>
    <tr>
    <td><input type="text" name="nim" placeholder="Nama Depan" value="<?php if(isset($row))echo $row['nim']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="nama" placeholder="Nama Belakang" value="<?php if(isset($row))echo $row['nama']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="alamat" placeholder="Nama Belakang" value="<?php if(isset($row))echo $row['alamat']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="kota" placeholder="Asal Kota" value="<?php if(isset($row))echo $row['kota']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="jurusan" placeholder="Nama Belakang" value="<?php if(isset($row))echo $row['jurusan']; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <?php
 if(isset($_GET['edit_id']))
 {
  ?><button type="submit" name="btn-update"><strong>UPDATE</strong></button></td><?php
 }
 else
 {
  ?><button type="submit" name="btn-save"><strong>SAVE</strong></button></td><?php
 }
 ?>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>