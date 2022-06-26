<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Penjualan</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<form action="#" method="POST">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" name="tgl_sales" value="PJ<?= date("md")?><?= mt_rand(111,999);?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Pelanggan</label>
								<select name="id_customer" class="form-control">
									<?php foreach($pelanggan as $pelang) : ?>
										<option value="<?= $pelang->id_customer ?>"><?= $pelang->nama_customer?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
					</form>
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
					<button type="button" data-toggle="modal" data-target="#tambahPenjualan" class="btn btn-primary btn-sm">Tambah Data</button>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Sales</th>
									<th>Pelanggan</th>
									<th>Pengguna</th>
									<th>Potongan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($results as $result) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $result->tgl_sales ?></td>
										<td><?= $result->id_customer ?></td>
										<td><?= $result->id_users ?></td>
										<td><?= $result->potongan ?></td>
										<td>
											<a href="<?= base_url() ?>penjualan/edit/<?= $result->id_sales ?>" class="badge badge-warning">edit</a>
											<a href="<?= base_url() ?>penjualan/delete/<?= $result->id_sales ?>" class="badge badge-danger">hapus</a>
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
<div class="modal fade" id="tambahPenjualan" tabindex="-1" role="dialog">
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