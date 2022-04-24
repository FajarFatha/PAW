
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>edit</title>
  </head>
  <body>
      
      <?php
      include "koneksi.php";
      $id=$_GET['id'];
      $query="SELECT * FROM tbl_fjr WHERE id_fjr='$id'";
      $hasil=mysqli_query($koneksi, $query);
      $data=mysqli_fetch_array($hasil);
      ?>
      <div class="container">
      <h1>Edit Data</h1>
      <form method="post" action="edit.php">
          <input type="hidden" name="id" value='<?= $data['id_fjr']?>'>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value='<?= $data['nama_fjr']?>'>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value='<?= $data['email_fjr']?>'>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value='<?= $data['alamat_fjr']?>'>
        </div>
        <a href="index.php">
            <button type="button" class="btn btn-danger">Batal</button>
        </a>
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        </form>
      </div>
  </body>
</html>