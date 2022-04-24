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
    $query = "INSERT INTO tbl_fjr (id_fjr, nama_fjr, email_fjr, alamat_fjr) VALUES ('', '$nama', '$email', '$alamat');";
    $hasil=mysqli_query($koneksi, $query);
    if($hasil){
        echo "<script>
                alert('Data Berhasil ditambahkan')
                document.location.href='index.php'
            </script>";
    }else{
        echo "<script>
                alert('Data gagal ditambahkan')
                document.location.href='index.php'
            </script>";
    }
    ?>
</body>
</html>