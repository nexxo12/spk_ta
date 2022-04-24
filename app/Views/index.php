<!DOCTYPE html>
<html lang="en">

<?= $this->extend('layout/header'); ?>
<?= $this->section('content'); ?>

<body>
	<div class="container">
		<h3 class="mt-4 text-center">Sistem Simulasi Harga Komputer Bekas</h3>
		<div class="alert alert-primary mt-4" role="alert">
			Keterangan :
			<ol>
				<li>Pilih Komponen : Memilih komponen (part) komputer sesuai merk dan seri yang dimiliki</li>
				<li>Harga : Masukan harga pembelian, jika lupa / tidak tahu bisa menggunakan harga rekomendasi system</li>
				<li>Pemakaian : Masukan durasi pemakaian dengan format sebagai berikut :
					<ul>
						<li>0,1 = format bulan</li>
						<li>1,1 = format tahun dan bulan</li>
						<li>1 = format tahun</li>
						<li>contoh : 2,3 = 2 tahun 3 bulan</li>
					</ul>
				</li>
			</ol>
		</div>
		<div class="row mb-4">
			<div class="form-group mt-4 col-md-8">
				<label for="inputState" style="font-weight: bold;">Pilih komponen :</label>
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Processor...</option>
					<option value="Intel Core i3-10105F" data-tokens="Intel Core i3-10105F">Intel Core i3-10105F</option>
					<option value="Intel Core i5-10400F" data-tokens="Intel Core i5-10400F">Intel Core i5-10400F</option>
					<option value="AMD Ryzen 5-5600G" data-tokens="AMD Ryzen 5-5600G">AMD Ryzen 5-5600G</option>
					<option value="AMD Ryzen 3-3200G" data-tokens="AMD Ryzen 3-3200G">AMD Ryzen 3-3200G</option>
				</select>
			</div>
			<div class="form-group mt-4 col-md-2">
				<label for="inputEmail4" style="font-weight: bold;">Harga :</label>
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<div class="form-group mt-4 col-md-2">
				<label for="inputEmail4" style="font-weight: bold;">Pemakaian :</label>
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Motherboard...</option>
					<option value="Intel Core i3-10105F" data-tokens="Intel Core i3-10105F">Intel Core i3-10105F</option>
					<option value="Intel Core i5-10400F" data-tokens="Intel Core i5-10400F">Intel Core i5-10400F</option>
					<option value="AMD Ryzen 5-5600G" data-tokens="AMD Ryzen 5-5600G">AMD Ryzen 5-5600G</option>
					<option value="AMD Ryzen 3-3200G" data-tokens="AMD Ryzen 3-3200G">AMD Ryzen 3-3200G</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Memory...</option>
					<option value="Intel Core i3-10105F" data-tokens="Intel Core i3-10105F">Intel Core i3-10105F</option>
					<option value="Intel Core i5-10400F" data-tokens="Intel Core i5-10400F">Intel Core i5-10400F</option>
					<option value="AMD Ryzen 5-5600G" data-tokens="AMD Ryzen 5-5600G">AMD Ryzen 5-5600G</option>
					<option value="AMD Ryzen 3-3200G" data-tokens="AMD Ryzen 3-3200G">AMD Ryzen 3-3200G</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>SSD...</option>
					<option value="Intel Core i3-10105F" data-tokens="Intel Core i3-10105F">Intel Core i3-10105F</option>
					<option value="Intel Core i5-10400F" data-tokens="Intel Core i5-10400F">Intel Core i5-10400F</option>
					<option value="AMD Ryzen 5-5600G" data-tokens="AMD Ryzen 5-5600G">AMD Ryzen 5-5600G</option>
					<option value="AMD Ryzen 3-3200G" data-tokens="AMD Ryzen 3-3200G">AMD Ryzen 3-3200G</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Hardisk...</option>
					<option value="Intel Core i3-10105F" data-tokens="Intel Core i3-10105F">Intel Core i3-10105F</option>
					<option value="Intel Core i5-10400F" data-tokens="Intel Core i5-10400F">Intel Core i5-10400F</option>
					<option value="AMD Ryzen 5-5600G" data-tokens="AMD Ryzen 5-5600G">AMD Ryzen 5-5600G</option>
					<option value="AMD Ryzen 3-3200G" data-tokens="AMD Ryzen 3-3200G">AMD Ryzen 3-3200G</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Graphic Card (VGA)...</option>
					<option value="Intel Core i3-10105F" data-tokens="Intel Core i3-10105F">Intel Core i3-10105F</option>
					<option value="Intel Core i5-10400F" data-tokens="Intel Core i5-10400F">Intel Core i5-10400F</option>
					<option value="AMD Ryzen 5-5600G" data-tokens="AMD Ryzen 5-5600G">AMD Ryzen 5-5600G</option>
					<option value="AMD Ryzen 3-3200G" data-tokens="AMD Ryzen 3-3200G">AMD Ryzen 3-3200G</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Power Supply (PSU)...</option>
					<option value="Intel Core i3-10105F" data-tokens="Intel Core i3-10105F">Intel Core i3-10105F</option>
					<option value="Intel Core i5-10400F" data-tokens="Intel Core i5-10400F">Intel Core i5-10400F</option>
					<option value="AMD Ryzen 5-5600G" data-tokens="AMD Ryzen 5-5600G">AMD Ryzen 5-5600G</option>
					<option value="AMD Ryzen 3-3200G" data-tokens="AMD Ryzen 3-3200G">AMD Ryzen 3-3200G</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Casing (Case)...</option>
					<option value="Intel Core i3-10105F" data-tokens="Intel Core i3-10105F">Intel Core i3-10105F</option>
					<option value="Intel Core i5-10400F" data-tokens="Intel Core i5-10400F">Intel Core i5-10400F</option>
					<option value="AMD Ryzen 5-5600G" data-tokens="AMD Ryzen 5-5600G">AMD Ryzen 5-5600G</option>
					<option value="AMD Ryzen 3-3200G" data-tokens="AMD Ryzen 3-3200G">AMD Ryzen 3-3200G</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="email" class="form-control" id="inputEmail4" autocomplete="off">
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Hitung</button>
			</div>
		</div>
	</div>

	<!-- -----------------------modal----------------------------------- -->
	<!-- Modal -->
	<div class="modal  fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Understood</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<?= $this->include('layout/footer'); ?>
<?= $this->endSection(''); ?>