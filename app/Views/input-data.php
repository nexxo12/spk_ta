<!DOCTYPE html>
<html lang="en">

<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<body>
	<div class="container">
		<h3 class="mt-4 text-center">Sistem Simulasi Harga Komputer Bekas Dengan Logika Fuzzy</h3>
		<div class="alert alert-primary mt-4" role="alert">
			Keterangan :
			<ol>
				<li>Format penulisan nama barang :<strong> [ Merk ][ Seri ][ Keterangan ] </strong>, Contoh:<strong> [ Intel ] [ Core i3-12100F ] [ 3.3Ghz LGA1700 ] </strong></li>
				<li>Pilih kategori berdasarkan merk dan tipe dengan benar agar tampil pada daftar komponen.</strong></li>
			</ol>
		</div>
		<form class="form-horizontal" action="/Home/saveBarang" id="form_pc" method="POST">

			<div class="card">
				<div class="card-header">
					<?= $title; ?>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<!-- kosong -->
						</div>
						<div class="form-group mt-4 col-md-6">
							<input type="text" value="BRSM<?= $itemid; ?>" name="itemID" hidden>
							<label for="inputEmail4" style="font-weight: bold;">Nama Merk / Seri Komponen :</label>
							<input type="text" class="form-control" id="hg_proc" name="nama-barang" autocomplete="off" required>
						</div>
						<div class="col-md-3">
							<!-- kosong -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<!-- kosong -->
						</div>
						<div class="form-group col-md-6 mb-4">
							<label for="inputState" style="font-weight: bold;">Kategori :</label>
							<select id="inputState" class="form-control" name="kategori">
								<option selected>Pilih kategori...</option>
								<?php foreach ($kategori as $type) : ?>

									<option value="<?= $type['ID_KATEGORI']; ?>"><?= $type['KATEGORI']; ?></option>

								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-3">
							<!-- kosong -->
						</div>

					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</div>
			</div>


		</form>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br><br>
	<br>
	<br>
	<br>
	<br>
	<br><br>
	<br>
	<br>
	<br>
	<br>
	<br>
</body>

</html>
<?= $this->include('layout/footer'); ?>
<?= $this->endSection(''); ?>