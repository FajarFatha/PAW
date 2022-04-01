<?php

function ubahData($data){
    global $koneksi;

    $id=$data["id_barang"];
    $nama_barang=$data["nama_barang"];
    $stok=$data["stok"];
    $harga_satuan=$data["harga_satuan"];

    $query = "UPDATE tbl_047 SET nama_barang='$nama_barang', stok=$stok, harga_satuan='$harga_satuan' WHERE id_barang='$id'";
    $input = mysqli_query($koneksi, $query);

    if($input){
        echo"Input berhasil";
    }else{
        echo"Input GAGAL!!!";
    }

    return mysqli_affected_rows($koneksi);

}

function tambahData($data){
    global $koneksi;
    $nama_barang=$data["nama_barang"];
    $stok=$data["stok"];
    $harga_satuan=$data["harga_satuan"];

    $query = "SELECT * FROM `tbl_047` ORDER BY id_barang DESC LIMIT 1;";
    $data = mysqli_query($koneksi, $query);

    $ambilid=mysqli_fetch_assoc($data);
    $id = $ambilid["id_barang"];

    $sub_id=intval(substr($id, 3));

    if(mysqli_num_rows($data)!=0){
        $sub_id+=1;
    }else{
        $sub_id = "BRG1";
    }

    $hasilid = "BRG{$sub_id}";

    $queryadd= "INSERT INTO `tbl_047` (`id_barang`, `nama_barang`, `stok`, `harga_satuan`) VALUES ('$hasilid', '$nama_barang', $stok, $harga_satuan);";
    $add=mysqli_query($koneksi, $queryadd);

    if($add){
        echo"tambah berhasil";
    }else{
        echo"tambah GAGAL!!!";
    }

    return mysqli_affected_rows($koneksi);
    


}

function hapusData($data){
    global $koneksi;

    $id=$data["id_barang"];
    $query = "DELETE FROM tbl_047 WHERE id_barang='$id'";
    $delete = mysqli_query($koneksi, $query);

    if($delete){
        echo"hapus berhasil";
    }else{
        echo"hapus GAGAL!!!";
    }

    return mysqli_affected_rows($koneksi);
}

?>