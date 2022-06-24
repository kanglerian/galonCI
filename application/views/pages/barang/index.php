<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Barang</h1>
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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Barang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">3000</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-box fa-2x text-gray-300"></i>
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
					<button type="button" data-toggle="modal" data-target="#tambahBarang" class="btn btn-primary btn-sm">Tambah Data</button>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Harga Pokok</th>
									<th>Harga Jual</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($results as $result) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $result->nama_barang ?></td>
										<td>Rp<?= $result->harga_pokok ?></td>
										<td>Rp<?= $result->harga_jual ?></td>
										<td>
											<a href="<?= base_url() ?>barang/edit/<?= $result->id_barang ?>" class="badge badge-warning">edit</a>
											<a href="<?= base_url() ?>barang/delete/<?= $result->id_barang ?>" class="badge badge-danger">hapus</a>
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
<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url() ?>barang/add" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>ID Barang</label>
						<input type="number" class="form-control" name="id_barang" placeholder="Tulis ID Barang disini...">
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang" placeholder="Tulis Nama Barang disini...">
					</div>
					<div class="form-group">
						<label>Harga Pokok</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Rp</span>
							</div>
							<input type="number" name="harga_pokok" class="form-control" placeholder="0">
						</div>
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Rp</span>
							</div>
							<input type="number" name="harga_jual" class="form-control" placeholder="0">
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