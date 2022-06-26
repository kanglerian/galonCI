<!-- Begin Page Content -->
<div class="container-fluid">
	<?php foreach ($pengguna as $user) : ?>
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><?= $user->nama_user ?></h1>
		</div>

		<!-- Content Row -->

		<div class="row">

			<!-- Area Chart -->
			<div class="col-xl-12 col-12">
				<form action="<?= base_url() ?>pengguna/update" method="POST">
					<div class="card card-body border-left-primary shadow mb-4">
						<input type="hidden" name="id_users" value="<?= $user->id_users ?>">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" value="<?= $user->nama_user ?>" class="form-control" name="nama_user">
						</div>
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">@</span>
								</div>
								<input type="text" name="username" class="form-control"  value="<?= $user->username ?>">
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
								<input type="password" name="password" class="form-control"  value="<?= $user->password ?>">
							</div>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select name="level" class="form-control">
								<option value="<?= $user->level ?>"><?= $user->level === '1' ? 'Administrator': 'Pengguna' ?></option>
								<option value="1">Adminstrator</option>
								<option value="2">Pengguna</option>
							</select>
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