<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Tabel</title>
  </head>
  <body>
      <div class="container">
          <table class="table table-bordered" style="margin-top:30px">
          <thead>
              <th>id</th>
              <th>nama</th>
              <th>email</th>
              <th>alamat</th>
              <th>aksi</th>
          </thead>
          <tbody>
              <?php
              include "koneksi.php";

              $query="SELECT * FROM tbl_fjr";
              $hasil = mysqli_query($koneksi, $query);

              if(mysqli_num_rows($hasil)>0){
                  while($data=mysqli_fetch_array($hasil)){
                      echo "
                      <tr>
                      <td>$data[id_fjr]</td>
                      <td>$data[nama_fjr]</td>
                      <td>$data[email_fjr]</td>
                      <td>$data[alamat_fjr]</td>
                      <td>
                        <a href='formedit.php?id=$data[id_fjr]' id='tombolubah'>edit</a> | 
                        <a href='hapus.php?id=$data[id_fjr]' id='tombolhapus' >Hapus</a>
                      </td>
                      </tr>
                      ";
                  }
              }
              ?>
          </tbody>
          </table>
          <a href="formtambah.php">
            <button type="button" class="btn btn-success">Tambah data</button>
        </a>
      </div>
  </body>
</html>