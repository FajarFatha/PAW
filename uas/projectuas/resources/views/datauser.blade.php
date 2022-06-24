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
                                    <h2><b>Data Pengguna</b></h2>
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
                                        <th >id</th>
										<th>nama</th>
										<th>level</th>
										<th>email</th>
                                        <th >aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach ($dtuser as $item)
										<tr>
											<td>{{ $item-> id}}</td>
											<td>{{ $item-> name}}</td>
											<td>{{ $item-> level}}</td>
											<td>{{ $item-> email}}</td>
											<td>
												<a href='#editModal' class='edit' id='tombolubah' data-toggle='modal' data-id='{{ $item->id }}' data-nama='{{ $item->name }}' data-level='{{ $item->level }}' data-email='{{ $item->email }}' ><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                                        		<a href='#deleteModal' class='delete' id='tombolHapus' data-toggle='modal' data-id='{{ $item->id }}'><i class='material-icons'data-toggle='tooltip'title='Delete'>&#xE872;</i></a>
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
		<form action="{{ route('simpandatauser') }}" method="POST">
			{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Data Panitia</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				{{-- <input type="hidden" class="form-control" name="id" id="id" required> --}}
                    <div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" required>
					</div>
					<div class="form-group">
						<label for="level">Level</label>
						<input type="text" class="form-control" name="level" id="level" required>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="text" class="form-control" name="email" id="email" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="text" class="form-control" name="password" id="password" required>
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
			<form action="{{ url('updateuser') }}" method="POST">
				{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Edit Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" class="form-control" name="id" id="id1" required>
                    <div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama1" required>
					</div>
					<div class="form-group">
						<label for="level">Level</label>
						<input type="text" class="form-control" name="level" id="level1" required>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="text" class="form-control" name="email" id="email1" required></input>
					</div>
					{{-- <div class="form-group">
						<label for="password">Password</label>
						<input type="text" class="form-control" name="password" id="password1" required>
					</div> --}}
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
			<form action="{{ url('hapususer') }}" method="POST">
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
        let level = $(this).data("level")
        let email = $(this).data("email")
        // let password = $(this).data("password")

		$(".modal-body #id1").val(id)
        $(".modal-body #nama1").val(nama)
        $(".modal-body #level1").val(level)
        $(".modal-body #email1").val(email)
        // $(".modal-body #password1").val(password)


    });

	$(document).on("click", "#tombolHapus", function(){
        let dataid = $(this).data("id")

        $(".modal-body #id3").val(dataid)


    });

</script>
@endsection