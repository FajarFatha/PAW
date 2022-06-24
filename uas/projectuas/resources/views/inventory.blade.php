@extends('layouts.main')
@section('logout')
@include('partials.tombollogout')
@endsection
@section('main')
<link rel="stylesheet" href="/css1/style2.css">
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    @include('partials.sidebar')
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Page content-->
        <div class="container-fluid">
            <div class="content">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col">
                                    </div>
                                    <form class="d-flex justify-content-between" action="" method="post">
                                    <h2><b>Data Inventory</b></h2>
                                    <div class="d-flex justify-content-between">
                                        <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Data</span></a>
                                    </div>
                                    </form>
                                    {{-- <div class="col col-lg-2">
                                    </div> --}}
                                </div>
                            </div>
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th >id</th>
										<th>nama barang</th>
										<th>besaran per jiwa</th>
										<th>stok</th>
                                        <th >satuan</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach ($dtbarang as $item)
										<tr>
											<td>{{ $item-> idbarang}}</td>
											<td>{{ $item-> namabarang}}</td>
											<td>{{ $item-> besaranperjiwa}}</td>
											<td>{{ $item-> stok}}</td>
                                            <td>{{ $item-> satuan }}</td>
											<td>
												<a href='#editModal' class='edit' id='tombolubah' data-toggle='modal' data-id='{{ $item->idbarang }}' data-nama='{{ $item->namabarang }}' data-besaran='{{ $item->besaranperjiwa }}' data-stok='{{ $item->stok }}' data-satuan='{{ $item->satuan }}' ><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                                        		<a href='#deleteModal' class='delete' id='tombolHapus' data-toggle='modal' data-id='{{ $item->idbarang }}'><i class='material-icons'data-toggle='tooltip'title='Delete'>&#xE872;</i></a>
											</td>
										</tr>
									@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal HTML -->
<div id="addModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="{{ route('simpandatabarang') }}" method="POST">
			{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Data Panitia</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				{{-- <input type="hidden" class="form-control" name="id" id="id" required> --}}
                    <div class="form-group">
						<label for="nama">Nama Barang</label>
						<input type="text" class="form-control" name="nama" id="nama" required>
					</div>
					<div class="form-group">
						<label for="besaran">Besaranperjiwa</label>
						<input type="number" class="form-control" name="besaran" id="besaran" required>
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="number" class="form-control" name="stok" id="stok" required>
					</div>
					<div class="form-group">
						<label for="satuan">Satuan</label>
						<input type="text" class="form-control" name="satuan" id="satuan" required>
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
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ url('editdatabarang') }}" method="POST">
				{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Edit Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" class="form-control" name="id" id="id1" required>
                    <div class="form-group">
						<label for="nama">Nama Barang</label>
						<input type="text" class="form-control" name="nama" id="nama1" required>
					</div>
					<div class="form-group">
						<label for="besaran">Besaran per jiwa</label>
						<input type="number" class="form-control" name="besaran" id="besaran1" required>
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="number" class="form-control" name="stok" id="stok1" required>
					</div>
					<div class="form-group">
						<label for="satuan">Satuan</label>
						<input type="text" class="form-control" name="satuan" id="satuan1" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="ubah" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ url('hapusdatabarang') }}" method="POST">
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
        let nama = $(this).data("nama")
        let besaran = $(this).data("besaran")
        let stok = $(this).data("stok")
		let satuan = $(this).data("satuan")

		$(".modal-body #id1").val(id)
        $(".modal-body #nama1").val(nama)
        $(".modal-body #besaran1").val(besaran)
        $(".modal-body #stok1").val(stok)
        $(".modal-body #satuan1").val(satuan)


    });

	$(document).on("click", "#tombolHapus", function(){
        let dataid = $(this).data("id")

        $(".modal-body #id3").val(dataid)


    });

</script>
@endsection