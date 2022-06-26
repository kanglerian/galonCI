<!-- Begin Page Content -->
<div class="container-fluid">
	<?php foreach ($pelanggan as $user) : ?>
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><?= $user->nama_customer ?></h1>
		</div>

		<!-- Content Row -->

		<div class="row">

			<!-- Area Chart -->
			<div class="col-xl-12 col-12">
				<form action="<?= base_url() ?>pelanggan/update" method="POST">
					<div class="card card-body border-left-primary shadow mb-4">
						<input type="hidden" name="id_customer" value="<?= $user->id_customer ?>">
						<div class="form-group">
							<label>Nama Pelanggan</label>
							<input type="text" class="form-control" name="nama_customer"  value="<?= $user->nama_customer ?>">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" value="<?= $user->alamat ?>"><?= $user->alamat ?></textarea>
						</div>
						<div class="form-group">
							<label>No Telp</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-phone"></i>
									</span>
								</div>
								<input type="number" name="no_tlp" class="form-control"  value="<?= $user->no_tlp ?>">
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
						</div>
				</form>
			</div>
		</div>
</div>
<?php endforeach ?>
</div>