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
				<li>Pilih Komponen : Memilih komponen (part) komputer sesuai merk dan seri yang dimiliki</li>
				<li>Harga : Masukan harga pembelian part pc kamu, <strong>range harga Rp.100.000 - Rp. 10.000.000</strong></li>
				<li>Pemakaian : Masukan durasi pemakaian dengan format sebagai berikut :
					<ul>
						<li>1 = format tahun</li>
						<li>1,1 = format tahun dan bulan</li>
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
					<?php foreach ($proc as $p) : ?>

						<option value="<?= $p['ID_BARANG']; ?>" data-tokens="<?= $p['NAMA_BARANG']; ?>"><?= $p['NAMA_BARANG']; ?></option>

					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group mt-4 col-md-2">
				<label for="inputEmail4" style="font-weight: bold;">Harga Beli :</label>
				<input type="number" class="form-control" id="hg_proc" autocomplete="off">
			</div>
			<div class="form-group mt-4 col-md-2">
				<label for="inputEmail4" style="font-weight: bold;">Pemakaian :</label>
				<input type="number" class="form-control" id="use_proc" autocomplete="off">
				<input type="number" class="form-control" id="sell_proc" autocomplete="off" readonly>
			</div>

			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Motherboard...</option>
					<?php foreach ($mobo as $mb) : ?>

						<option value="<?= $mb['ID_BARANG']; ?>" data-tokens="<?= $mb['NAMA_BARANG']; ?>"><?= $mb['NAMA_BARANG']; ?></option>

					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="hg_mb" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="use_mb" autocomplete="off">
				<input type="number" class="form-control" id="sell_mb" autocomplete="off" readonly>
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Memory...</option>
					<?php foreach ($ram as $mem) : ?>

						<option value="<?= $mem['ID_BARANG']; ?>" data-tokens="<?= $mem['NAMA_BARANG']; ?>"><?= $mem['NAMA_BARANG']; ?></option>

					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="hg_ram" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="use_ram" autocomplete="off">
				<input type="number" class="form-control" id="sell_ram" autocomplete="off" readonly>
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>SSD...</option>
					<?php foreach ($ssd as $sd) : ?>

						<option value="<?= $sd['ID_BARANG']; ?>" data-tokens="<?= $sd['NAMA_BARANG']; ?>"><?= $sd['NAMA_BARANG']; ?></option>

					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="hg_ssd" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="use_ssd" autocomplete="off">
				<input type="number" class="form-control" id="sell_ssd" autocomplete="off" readonly>
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Hardisk...</option>
					<?php foreach ($hdd as $hd) : ?>

						<option value="<?= $hd['ID_BARANG']; ?>" data-tokens="<?= $hd['NAMA_BARANG']; ?>"><?= $hd['NAMA_BARANG']; ?></option>

					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="hg_hdd" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="use_hdd" autocomplete="off">
				<input type="number" class="form-control" id="sell_hdd" autocomplete="off" readonly>
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Graphic Card (VGA)...</option>
					<?php foreach ($vga as $gpu) : ?>

						<option value="<?= $gpu['ID_BARANG']; ?>" data-tokens="<?= $gpu['NAMA_BARANG']; ?>"><?= $gpu['NAMA_BARANG']; ?></option>

					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="hg_vga" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="use_vga" autocomplete="off">
				<input type="number" class="form-control" id="sell_vga" autocomplete="off" readonly>
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Power Supply (PSU)...</option>
					<?php foreach ($psu as $ps) : ?>

						<option value="<?= $ps['ID_BARANG']; ?>" data-tokens="<?= $ps['NAMA_BARANG']; ?>"><?= $ps['NAMA_BARANG']; ?></option>

					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="hg_psu" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="use_psu" autocomplete="off">
				<input type="number" class="form-control" id="sell_psu" autocomplete="off" readonly>
			</div>
			<!-- ----------------------------------------------------------------------------------- -->
			<div class="form-group col-md-8">
				<select id="inputState" class="form-control selectpicker" data-live-search="true">
					<option selected>Casing (Case)...</option>
					<?php foreach ($case as $cs) : ?>

						<option value="<?= $cs['ID_BARANG']; ?>" data-tokens="<?= $cs['NAMA_BARANG']; ?>"><?= $cs['NAMA_BARANG']; ?></option>

					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="hg_case" autocomplete="off">
			</div>
			<div class="form-group col-md-2">
				<input type="number" class="form-control" id="use_case" autocomplete="off">
				<input type="number" class="form-control" id="sell_case" autocomplete="off" readonly>
			</div>
		</div>
		<div class="row">
			<div class="col text-center">
				<button type="submit" class="btn btn-primary" data-toggle="" data-target="#staticBackdrop" id="hitung">Hitung</button>
			</div>
		</div>
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