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
					<form action="<?= base_url() ?>penjualan/tambah" method="POST">
						<div class="form-row">
							<div class="col-md-3">
								<div class="form-group">
									<label>No. Transaksi</label>
									<input type="text" class="form-control" name="id_sales" value="PJ<?= date("md") ?><?= mt_rand(111, 999); ?>">
									<input type="hidden" name="tgl_sales" value="<?= date("Y-m-d"); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Pelanggan</label>
									<select name="id_customer" class="form-control">
										<?php foreach ($pelanggan as $pelang) : ?>
											<option value="<?= $pelang->id_customer ?>"><?= $pelang->nama_customer ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Potongan</label>
									<input type="number" class="form-control" name="potongan">
								</div>
							</div>
							<div class="col-md-2">
								<div class="d-flex">
									<button type="button" style="margin-top:35px" onclick="tambahForm()" class="btn btn-primary btn-sm mr-2 btn-block">(+)</button>
									<button type="button" style="margin-top:35px" onclick="hapusForm()" class="btn btn-danger btn-sm btn-block">(-)</button>
								</div>
								<input type="submit" class="d-none">
							</div>
						</div>
						<div class="form-row mt-3">
							<div class="col-md-12" id="hasil">
								<!-- Content ID Barang -->
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
					<!-- <button type="button" data-toggle="modal" data-target="#tambahPenjualan" class="btn btn-primary btn-sm">Tambah Data</button> -->
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>No. Transaksi</th>
									<th>Tanggal Sales</th>
									<th>Pelanggan</th>
									<th>Potongan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($results as $result) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $result->id_sales ?></td>
										<td><?= $result->tgl_sales ?></td>
										<td><?= $result->id_customer ?></td>
										<td>Rp<?= number_format($result->potongan, 0, ",", ".") ?></td>
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

<script>
	function tambahForm() {
		const element = `
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
						<input type="number" class="form-control" name="id_barang[]" placeholder="Tulis ID Barang disini..." autofocus>
					</div>
				</div>
			<div class="col-md-6">
				<div class="form-group">
						<input type="number" class="form-control" name="qty[]" placeholder="Tulis jumlah disini...">
					</div>
				</div>
			</div>
		</div>
		`;
		const form = document.createElement("div");
		form.innerHTML = element;
		document.getElementById('hasil').appendChild(form);
	}

	function hapusForm() {
		const list = document.getElementById('hasil');
		list.removeChild(list.lastElementChild);
	}
	document.addEventListener('keyup', (event) => {
		if (event.code === 'Equal') {
			tambahForm();
		} else if (event.code === 'Minus') {
			hapusForm();
		}
	}, false);
	// document.addEventListener('keyup', (event) => {
	// 	var name = event.key;
	// 	var code = event.code;
	// 	// Alert the key name and key code on keydown
	// 	alert(`Key pressed ${name} \r\n Key code value: ${code}`);
	// }, false);
</script>
