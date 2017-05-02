<?php
include_once 'data.php';
$con = new connect();

// delete condition
if(isset($_GET['delete_id']))
{
 $con->Hapus("DELETE FROM siswa WHERE id=".$_GET['delete_id']);
 header("Location: index.php");
}
// delete condition

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Mahasiswa</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function edt_id(id)
{
 if(confirm('Yakin akan diedit ?'))
 {
  window.location.href='insert-update.php?edit_id='+id;
 }
}
function delete_id(id)
{
 if(confirm('Yakin akan hapus ?'))
 {
  window.location.href='index.php?delete_id='+id;
 }
}
</script>
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
 <h2><font color="#E9090D"><a href="insert-update.php">Tambah Data</a></font></h2>
    <table align="center">
    <th>Nim</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Asal Kota</th>
    <th>Jurusan</th>
    <th colspan="2">Aksi</th>
    </tr>
    <?php
$res=$con->getdata("SELECT * FROM siswa");
if(mysql_num_rows($res)==0)
{
 ?>
    <tr>
    <td colspan="5">Data Tidak Ada !</td>
    </tr>
    <?php
}
else
{
 while($row=mysql_fetch_array($res))
 {
  ?>
        <tr>
        <td><?php echo $row['nim'];  ?></td>
        <td><?php echo $row['nama'];  ?></td>
        <td><?php echo $row['alamat'];  ?></td>
        <td><?php echo $row['kota'];  ?></td>
        <td><?php echo $row['jurusan'];  ?></td>
        <td align="center"><a href="javascript:edt_id('<?php echo $row['id']; ?>')">Edit / Hapus</td>
      
        </tr>
        <?php
 }
}
?>
    </table>
    </div>
</div>

</center>
</body>
</html>