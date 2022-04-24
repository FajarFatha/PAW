<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "koneksi.php";

    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $email=$_POST['email'];
    $alamat=$_POST['alamat'];
    $query = "UPDATE tbl_fjr SET nama_fjr = '$nama', email_fjr = '$email', alamat_fjr = '$alamat' WHERE id_fjr = $id;";
    $hasil=mysqli_query($koneksi, $query);
    if($hasil){
        echo "<script>
                alert('Data Berhasil di Update')
                document.location.href='index.php'
            </script>";
    }else{
        echo "<script>
                alert('Data gagal di Update')
                document.location.href='index.php'
            </script>";
    }
    ?>
</body>
</html>