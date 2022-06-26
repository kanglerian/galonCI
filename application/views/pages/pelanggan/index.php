<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pelanggan</div>
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
					<button type="button" data-toggle="modal" data-target="#tambahPelanggan" class="btn btn-primary btn-sm">Tambah Data</button>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pelanggan</th>
									<th>Alamat</th>
									<th>No Telp</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($results as $result) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $result->nama_customer ?></td>
										<td><?= $result->alamat ?></td>
										<td><?= $result->no_tlp ?></td>
										<td>
											<a href="<?= base_url() ?>pelanggan/edit/<?= $result->id_customer ?>" class="badge badge-warning">edit</a>
											<a href="<?= base_url() ?>pelanggan/delete/<?= $result->id_customer ?>" class="badge badge-danger">hapus</a>
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
<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url() ?>pelanggan/tambah" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>ID Pelanggan</label>
						<input type="number" class="form-control" name="id_customer" placeholder="Tulis ID pelanggan disini...">
					</div>
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input type="text" class="form-control" name="nama_customer" placeholder="Tulis nama pelanggan disini...">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" placeholder="Tulis alamat pelanggan disini..."></textarea>
					</div>
					<div class="form-group">
						<label>No Telp</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-phone"></i>
								</span>
							</div>
							<input type="number" name="no_tlp" class="form-control" placeholder="Tulis no telepon disini...">
						</div>
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