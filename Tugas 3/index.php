<?php
	require "fungsi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Tugas 3 | CRUD</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>


body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
/* table.table tr th:first-child {
	width: 80px;
} */
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tugas PAW</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
		<a class="nav-link" href='#profileModal' data-toggle='modal'>Profile</a>
    </div>
  </div>
</nav>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Data Barang</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Data</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-bordered table-hover table-sm">
				<thead class="table-dark">
					<tr>
						<th>ID BARANG</th>
						<th>NAMA BARANG</th>
						<th>STOK</th>
						<th>HARGA SATUAN</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        include "koneksi.php";
                        $query="SELECT * FROM tbl_047;";
                        $hasil = mysqli_query($koneksi,$query);
                        
                        if(mysqli_num_rows($hasil)>0){
                            while($data=mysqli_fetch_array($hasil)){
                                echo"
                                <tr>
                                    <td>$data[id_barang]</td>
                                    <td>$data[nama_barang]</td>
                                    <td>$data[stok]</td>
                                    <td>$data[harga_satuan]</td>
                                    <td>
                                        <a href='#editModal' class='edit' id='tombolubah' data-toggle='modal' data-id='$data[id_barang]' data-nama='$data[nama_barang]' data-stok='$data[stok]' data-harga='$data[harga_satuan]'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                                        <a href='#deleteModal' class='delete' id='tombolHapus' data-toggle='modal' data-id='$data[id_barang]'><i class='material-icons'data-toggle='tooltip'title='Delete'>&#xE872;</i></a>
                                    </td>
                                </tr>";
                            }
                        }else{
                            echo"
                            <tr>
                                <td>KOSONG</td>
                            </tr>
                            ";
                        }

                        ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
<!-- Create Modal HTML -->
<div id="addModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <input type="hidden" name="id_barang" id="id_barang">					

					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="text" class="form-control" name="stok" id="stok" required></input>
					</div>
					<div class="form-group">
						<label for="harga_satuan">Harga Satuan</label>
						<input type="text" class="form-control" name="harga_satuan" id="harga_satuan" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="tambah" class="btn btn-info" value="Save">
				</div>
			</form>
			<?php
				if(isset($_POST["tambah"])){

					if(tambahData($_POST) > 0){
						echo"<script>
							alert('Data Berhasil ditambahkan')
							document.location.href='index.php'
						</script>";
					}else{
						echo"<script>
							alert('Data Gagal ditambahkan')
							document.location.href='index.php'
						</script>";
					}
				}
			?>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <input type="hidden" name="id_barang" id="id_barang">					

					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="text" class="form-control" name="stok" id="stok" required></input>
					</div>
					<div class="form-group">
						<label for="harga_satuan">Harga Satuan</label>
						<input type="text" class="form-control" name="harga_satuan" id="harga_satuan" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="ubah" class="btn btn-info" value="Save">
				</div>
			</form>
			<?php
				if(isset($_POST["ubah"])){
					

					if(ubahData($_POST) > 0){
						echo"<script>
							alert('Data Berhasil di Update')
							document.location.href='index.php'
						</script>";
					}else{
						echo"<script>
							alert('Data Gagal di Update')
							document.location.href='index.php'
						</script>";
					}
				}
			?>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_barang" id="id_barang">					
					<p>Apakah Anda yakin untuk menghapus data ini?</p>
					<p class="text-warning"><small>aksi ini tidak dapat dibatalkan</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="hapus" class="btn btn-danger" value="Delete">
				</div>
			</form>
			<?php
				if(isset($_POST["hapus"])){
					

					if(hapusData($_POST) > 0){
						echo"<script>
							alert('Data Berhasil dihapus')
							document.location.href='index.php'
						</script>";
					}else{
						echo"<script>
							alert('Data Gagal dihapus')
							document.location.href='index.php'
						</script>";
					}
				}
			?>
		</div>
	</div>
</div>
<!-- profile Modal -->
<div id="profileModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">						
				<h4 class="modal-title">Profileku</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
				<div class="card p-4">
					<div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="img/fajar.jpg" height="100" width="100" /></button> <span class="name mt-3">Fajar Fatha Romadhan</span> <span class="idd">@fajar_fatha</span>
						<div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">200411100047</span> <span></span> </div>
						<div class="text mt-3"> <span>Universitas Trunojoyo Madura<br><br>Teknik Informatika</span> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).on("click", "#tombolubah", function(){
        let id_barang = $(this).data("id")
        let nama_barang = $(this).data("nama")
        let stok = $(this).data("stok")
        let harga_satuan = $(this).data("harga")

        $(".modal-body #id_barang").val(id_barang)
        $(".modal-body #nama_barang").val(nama_barang)
        $(".modal-body #stok").val(stok)
        $(".modal-body #harga_satuan").val(harga_satuan)

    });

	$(document).on("click", "#tombolHapus", function(){
        let id_barang = $(this).data("id")

        $(".modal-body #id_barang").val(id_barang)


    });

</script>
</body>
</html>
