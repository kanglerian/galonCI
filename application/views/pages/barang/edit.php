<!-- Begin Page Content -->
<div class="container-fluid">
	<?php foreach ($barang as $bar) : ?>
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><?= $bar->nama_barang ?></h1>
		</div>

		<!-- Content Row -->

		<div class="row">

			<!-- Area Chart -->
			<div class="col-xl-12 col-12">
				<form action="<?= base_url()?>barang/update" method="POST">
					<div class="card card-body border-left-primary shadow mb-4">
						<input type="hidden" name="id_barang" value="<?= $bar->id_barang ?>">
						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" class="form-control" name="nama_barang" value="<?= $bar->nama_barang ?>">
						</div>
						<div class="form-group">
							<label>Harga Pokok</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp</span>
								</div>
								<input type="number" name="harga_pokok" class="form-control" value="<?= $bar->harga_pokok ?>">
							</div>
						</div>
						<div class="form-group">
							<label>Harga Jual</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp</span>
								</div>
								<input type="number" name="harga_jual" class="form-control" value="<?= $bar->harga_jual ?>">
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