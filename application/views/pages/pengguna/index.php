<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
			<i class="far fa-file-excel text-white-50 mr-2"></i>Unduh laporan</a>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-12">
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<button type="button" data-toggle="modal" data-target="#tambahPengguna" class="btn btn-primary btn-sm">Tambah Data</button>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pengguna</th>
									<th>Username</th>
									<th>Password</th>
									<th>Level</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($results as $result) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $result->nama_user ?></td>
										<td><?= $result->username ?></td>
										<td><?= $result->password ?></td>
										<td><?= $result->level === '1' ? 'Administrator': 'Pengguna' ?></td>
										<td>
											<a href="<?= base_url() ?>pengguna/edit/<?= $result->id_users ?>" class="badge badge-warning">edit</a>
											<a href="<?= base_url() ?>pengguna/delete/<?= $result->id_users ?>" class="badge badge-danger">hapus</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->


<!-- Modal -->
<div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url() ?>pengguna/tambah" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>ID Pengguna</label>
						<input type="number" class="form-control" name="id_users" placeholder="Tulis ID pengguna disini...">
					</div>
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama_user" placeholder="Tulis nama lengkap disini...">
					</div>
					<div class="form-group">
						<label>Username</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">@</span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Tulis username disini...">
						</div>
					</div>
					<div class="form-group">
						<label>Password</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-key"></i>
								</span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="Tulis password disini...">
						</div>
					</div>
					<div class="form-group">
						<label>Level</label>
						<select name="level" class="form-control">
							<option selected>Pilih</option>
							<option value="1">Adminstrator</option>
							<option value="2">Pengguna</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>