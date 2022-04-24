
<?php
include "koneksi.php";
$id=$_GET['id'];
echo "$id";
$query = "DELETE FROM tbl_fjr WHERE id_fjr='$id';";
$hasil=mysqli_query($koneksi, $query);
if($hasil){
    echo "<script>
            alert('Data Berhasil dihapus')
            document.location.href='index.php'
        </script>";
}else{
    echo "<script>
            alert('Data gagal dihapus')
            document.location.href='index.php'
        </script>";
}
?>