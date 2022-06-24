@extends('layouts.main')
@section('logout')
@include('partials.tombollogout')
@endsection
@section('main')
<div class="container-fluid">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col">
                    </div>
					<form class="d-flex justify-content-between" action="" method="post">
                    <h2><b>Data Transaksi Zakat</b></h2>
                    <div class="d-flex justify-content-between">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari" style="width: 300px">
                        <div >
                            <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Data</span></a>
                            <button style="width: 150px; margin-right:40px" class="btn btn-primary" type="submit" name="tombolsemua">Tampilkan Semua</button>
                            <button style="width: 90px;" class="btn btn-success" type="submit" name="tombolcari">Search</button>
                        </div>
                    </div>
					</form>
					{{-- <div class="col col-lg-2">
					</div> --}}
				</div>
			</div>
			<table class="table table-bordered table-hover table-sm">
				<thead class="table-dark">
					<tr>
						<th>No</th>
						<th>ID Transaksi</th>
						<th >Nama Muzakki</th>
						<th>tanggal</th>
						<th>jumlah tanggungan</th>
						<th>nama barang</th>
						<th>jumlah yang dibayarkan</th>
						<th>satuan</th>
						<th>bukti</th>
                        <th >aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($dttransaksi as $item)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $item-> idtransaksi }}</td>
							<td>{{ $item-> muzakki->nama_muzakki }}</td>
							<td>{{ $item-> tanggal }}</td>
							<td>{{ $item-> jumlah_tanggungan }}</td>
							<td>{{ $item-> barang->namabarang }}</td>
							<td>{{ ($item->jumlah_tanggungan)*($item->barang->besaranperjiwa) }}</td>
							<td>{{ $item->barang->satuan }}</td>
							<td>
								<?php
								if($item->bukti!=null){
									echo"<a href='http://localhost:8000/img/$item->bukti' target='blank' rel='noopener noreferrer'>Lihat Gambar</a>";
								}else{
									echo " ";
								}
								?>
								{{-- <a href='{{ asset('img/'.$item->bukti) }}' target='blank' rel='noopener noreferrer'>Lihat Gambar</a> --}}
							</td>
							<td>
								<a href='#editModal' class='edit' id='tombolubah' data-toggle='modal' data-id='{{ $item->idtransaksi }}' data-idmuzakki='{{ $item->muzakki->id_muzakki }}' data-muzakki='{{ $item->muzakki->nama_muzakki }}' data-tanggal='{{ $item->tanggal }}' data-barang='{{ $item->barang->namabarang }}' data-jumlahtanggungan='{{ $item->jumlah_tanggungan }}' data-alamat='{{ $item->muzakki->alamat }}'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
								<a href='#deleteModal' class='delete' id='tombolHapus' data-toggle='modal' data-id='{{ $item->idtransaksi }}'><i class='material-icons'data-toggle='tooltip'title='Delete'>&#xE872;</i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>        
</div>

<!-- Create Modal HTML -->
<div id="addModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="{{ route('simpandatatransaksi') }}" method="POST">
			{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Transaksi</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				{{-- <input type="hidden" class="form-control" name="id" id="id" required> --}}
                    <div class="form-group">
						<label for="namamuzakki">Nama Muzakki</label>
						<input type="text" class="form-control" name="namamuzakki" id="namamuzakki" required>
					</div>
					<div class="form-group">
						<label for="alamat">alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat" required>
					</div>
					<div class="form-group">
						<label for="tanggal">tanggal</label>
						<input type="date" class="form-control" name="tanggal" id="tanggal" required>
					</div>
					<div class="form-group">
						<label for="tanggungan">tanggungan</label>
						<input type="number" class="form-control" name="tanggungan" id="tanggungan" required>
					</div>
					<div class="form-group">
						<label for="jenisbarang">Jenis Barang</label>
						<select class="form-select" id="jenisbarang" name="jenis">
							<option selected>pilih jenis barang</option>
							<option value="1">Beras</option>
							<option value="2">Uang</option>
						</select>
					</div>
					<input type="hidden" class="form-control" name="jumlah" id="jumlah">
					<input type="hidden" class="form-control" name="satuan" id="satuan">		
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="tambah" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="{{ route('editdatatransaksi') }}" method="POST">
			{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Edit data transaksi</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				<input type="hidden" class="form-control" name="id" id="id1" required>
                    <div class="form-group">
						<label for="namamuzakki">Nama Muzakki</label>
						<input type="text" class="form-control" name="namamuzakki" id="namamuzakki1" required>
					</div>
					<input type="hidden" class="form-control" name="idmuzakki" id="idmuzakki1" required>
					<div class="form-group">
						<label for="alamat">alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat1" required>
					</div>
					<div class="form-group">
						<label for="tanggal">tanggal</label>
						<input type="date" class="form-control" name="tanggal" id="tanggal1" required>
					</div>
					<div class="form-group">
						<label for="tanggungan">tanggungan</label>
						<input type="number" class="form-control" name="tanggungan" id="tanggungan1" required>
					</div>
					<div class="form-group">
						<label for="jenisbarang">Jenis Barang</label>
						<select class="form-select" id="jenisbarang1" name="jenis">
							<option selected>pilih jenis barang</option>
							<option value="1">Beras</option>
							<option value="2">Uang</option>
						</select>
					</div>		
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="tambah" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ url('hapusdatatransaksi') }}" method="POST">
				{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Hapus Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" id="id3">					
					<p>Apakah Anda yakin untuk menghapus data ini?</p>
					<p class="text-warning"><small>aksi ini tidak dapat dibatalkan</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="hapus" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    $(document).on("click", "#tombolubah", function(){
		let id = $(this).data("id")
        let muzakki = $(this).data("muzakki")
		let idmuzakki = $(this).data("idmuzakki")
		let alamat = $(this).data("alamat")
        let tanggal = $(this).data("tanggal")
        let barang = $(this).data("barang")
		let jumlah = $(this).data("jumlahtanggungan")
        // let password = $(this).data("password")

		$(".modal-body #id1").val(id)
        $(".modal-body #namamuzakki1").val(muzakki)
		$(".modal-body #idmuzakki1").val(idmuzakki)
        $(".modal-body #alamat1").val(alamat)
        $(".modal-body #tanggal1").val(tanggal)
        $(".modal-body #tanggungan1").val(jumlah)


    });

	$(document).on("click", "#tombolHapus", function(){
        let dataid = $(this).data("id")

        $(".modal-body #id3").val(dataid)


    });
	
	$(document).on("change", "#jenisbarang", function(){
        let jenis=$(".modal-body #jenisbarang").val()
		let tanggungan=$(".modal-body #tanggungan").val()
		if(jenis=="1"){
			$(".modal-body #jumlah").val(tanggungan*3)
			$(".modal-body #satuan").val("kg")
		}else if(jenis=="2"){
			$(".modal-body #jumlah").val(tanggungan*30000)
			$(".modal-body #satuan").val("rupiah")
		}

    });
function myFunction() {
  var x = document.getElementById("tanggungan").value;
  document.getElementById("nominal").innerHTML= "Rp."+x*30000;
}

</script>
@endsection