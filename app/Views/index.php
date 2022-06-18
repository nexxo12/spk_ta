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
		<form class="form-horizontal" action="<?= base_url() ?>/fuzzyC/insertHasilFuzzy" id="form_pc" method="POST">
			<div class="row mb-4">
				<input type="text" value="SM/PC/<?= $itemid; ?>" name="itemID" hidden>
				<div class="form-group mt-4 col-md-8">
					<label for="inputState" style="font-weight: bold;">Pilih komponen :</label>
					<select id="inputState" class="form-control selectpicker" data-live-search="true" name="itemNAME[]">
						<option selected>Processor...</option>
						<?php foreach ($proc as $p) : ?>

							<option id="id_proc" value="<?= $p['item_NAMEID']; ?>" data-tokens="<?= $p['NAMA_BARANG']; ?>"><?= $p['NAMA_BARANG']; ?></option>

						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group mt-4 col-md-2">
					<label for="inputEmail4" style="font-weight: bold;">Harga Beli :</label>
					<input type="number" class="form-control" id="hg_proc" name="itemPRICE[]" autocomplete="off">
				</div>
				<div class="form-group mt-4 col-md-2">
					<label for="inputEmail4" style="font-weight: bold;">Pemakaian :</label>
					<input type="number" class="form-control" id="use_proc" name="itemUSE[]" autocomplete="off">
					<input type="number" class="form-control" id="sell_proc" name="itemOutMamdani[]" autocomplete="off" readonly hidden>
					<input type="number" class="form-control" id="sell_procsg" name="itemOutSugeno[]" autocomplete="off" readonly hidden>
				</div>

				<!-- ----------------------------------------------------------------------------------- -->
				<div class="form-group col-md-8">
					<select id="inputState" class="form-control selectpicker" data-live-search="true" name="itemNAME[]">
						<option selected>Motherboard...</option>
						<?php foreach ($mobo as $mb) : ?>

							<option value="<?= $mb['item_NAMEID']; ?>" data-tokens="<?= $mb['NAMA_BARANG']; ?>"><?= $mb['NAMA_BARANG']; ?></option>

						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="hg_mb" name="itemPRICE[]" autocomplete="off">
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="use_mb" name="itemUSE[]" autocomplete="off">
					<input type="number" class="form-control" id="sell_mb" name="itemOutMamdani[]" autocomplete="off" readonly hidden>
					<input type="number" class="form-control" id="sell_mbsg" name="itemOutSugeno[]" autocomplete="off" readonly hidden>
				</div>
				<!-- ----------------------------------------------------------------------------------- -->
				<div class="form-group col-md-8">
					<select id="inputState" class="form-control selectpicker" data-live-search="true" name="itemNAME[]">
						<option selected>Memory...</option>
						<?php foreach ($ram as $mem) : ?>

							<option value="<?= $mem['item_NAMEID']; ?>" data-tokens="<?= $mem['NAMA_BARANG']; ?>"><?= $mem['NAMA_BARANG']; ?></option>

						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="hg_ram" name="itemPRICE[]" autocomplete="off">
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="use_ram" name="itemUSE[]" autocomplete="off">
					<input type="number" class="form-control" id="sell_ram" name="itemOutMamdani[]" autocomplete="off" readonly hidden>
					<input type="number" class="form-control" id="sell_ramsg" name="itemOutSugeno[]" autocomplete="off" readonly hidden>
				</div>
				<!-- ----------------------------------------------------------------------------------- -->
				<div class="form-group col-md-8">
					<select id="inputState" class="form-control selectpicker" data-live-search="true" name="itemNAME[]">
						<option selected>SSD...</option>
						<?php foreach ($ssd as $sd) : ?>

							<option value="<?= $sd['item_NAMEID']; ?>" data-tokens="<?= $sd['NAMA_BARANG']; ?>"><?= $sd['NAMA_BARANG']; ?></option>

						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="hg_ssd" name="itemPRICE[]" autocomplete="off">
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="use_ssd" name="itemUSE[]" autocomplete="off">
					<input type="number" class="form-control" id="sell_ssd" name="itemOutMamdani[]" autocomplete="off" readonly hidden>
					<input type="number" class="form-control" id="sell_ssdsg" name="itemOutSugeno[]" autocomplete="off" readonly hidden>
				</div>
				<!-- ----------------------------------------------------------------------------------- -->
				<div class="form-group col-md-8">
					<select id="inputState" class="form-control selectpicker" data-live-search="true" name="itemNAME[]">
						<option selected>Hardisk...</option>
						<?php foreach ($hdd as $hd) : ?>

							<option value="<?= $hd['item_NAMEID']; ?>" data-tokens="<?= $hd['NAMA_BARANG']; ?>"><?= $hd['NAMA_BARANG']; ?></option>

						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="hg_hdd" name="itemPRICE[]" autocomplete="off">
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="use_hdd" name="itemUSE[]" autocomplete="off">
					<input type="number" class="form-control" id="sell_hdd" name="itemOutMamdani[]" autocomplete="off" readonly hidden>
					<input type="number" class="form-control" id="sell_hddsg" name="itemOutSugeno[]" autocomplete="off" readonly hidden>
				</div>
				<!-- ----------------------------------------------------------------------------------- -->
				<div class="form-group col-md-8">
					<select id="inputState" class="form-control selectpicker" data-live-search="true" name="itemNAME[]">
						<option selected>Graphic Card (VGA)...</option>
						<?php foreach ($vga as $gpu) : ?>

							<option value="<?= $gpu['item_NAMEID']; ?>" data-tokens="<?= $gpu['NAMA_BARANG']; ?>"><?= $gpu['NAMA_BARANG']; ?></option>

						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="hg_vga" name="itemPRICE[]" autocomplete="off">
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="use_vga" name="itemUSE[]" autocomplete="off">
					<input type="number" class="form-control" id="sell_vga" name="itemOutMamdani[]" autocomplete="off" readonly hidden>
					<input type="number" class="form-control" id="sell_vgasg" name="itemOutSugeno[]" autocomplete="off" readonly hidden>
				</div>
				<!-- ----------------------------------------------------------------------------------- -->
				<div class="form-group col-md-8">
					<select id="inputState" class="form-control selectpicker" data-live-search="true" name="itemNAME[]">
						<option selected>Power Supply (PSU)...</option>
						<?php foreach ($psu as $ps) : ?>

							<option value="<?= $ps['item_NAMEID']; ?>" data-tokens="<?= $ps['NAMA_BARANG']; ?>"><?= $ps['NAMA_BARANG']; ?></option>

						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="hg_psu" name="itemPRICE[]" autocomplete="off">
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="use_psu" name="itemUSE[]" autocomplete="off">
					<input type="number" class="form-control" id="sell_psu" name="itemOutMamdani[]" autocomplete="off" readonly hidden>
					<input type="number" class="form-control" id="sell_psusg" name="itemOutSugeno[]" autocomplete="off" readonly hidden>
				</div>
				<!-- ----------------------------------------------------------------------------------- -->
				<div class="form-group col-md-8">
					<select id="inputState" class="form-control selectpicker" data-live-search="true" name="itemNAME[]">
						<option selected>Casing (Case)...</option>
						<?php foreach ($case as $cs) : ?>

							<option value="<?= $cs['item_NAMEID']; ?>" data-tokens="<?= $cs['NAMA_BARANG']; ?>"><?= $cs['NAMA_BARANG']; ?></option>

						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="hg_case" name="itemPRICE[]" autocomplete="off">
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" id="use_case" name="itemUSE[]" autocomplete="off">
					<input type="number" class="form-control" id="sell_case" name="itemOutMamdani[]" autocomplete="off" readonly hidden>
					<input type="number" class="form-control" id="sell_casesg" name="itemOutSugeno[]" autocomplete="off" readonly hidden>
				</div>
			</div>
			<div class="row">
				<div class="col text-center">
					<button type="submit" class="btn btn-primary" data-toggle="" data-target="#staticBackdrop" id="hitung">Hitung</button>
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

	<!-- -----------------------modal----------------------------------- -->
	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Detail Harga Penjualan Bekas</h5>
				</div>
				<div class="modal-body">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">No.</th>
								<th scope="col">Nama Barang</th>
								<th scope="col">Harga Beli</th>
								<th scope="col">Pemakaian</th>
								<th scope="col">Harga Jual (M)</th>
								<th scope="col" style="width:1%"></th>
								<th scope="col">Harga Jual (S)</th>
							</tr>
						</thead>
						<tbody id="data-itemlist">

						</tbody>
						<tfoot>
							<tr>
								<td colspan="2">
									<h5 style="text-align:right;">Total</h5>
								</td>
								<td>
									<h5>
										<input type="text" id="gtotal_buy" style="border: none; pointer-events: none;" size="11">
									</h5>
								</td>
								<td>
									<h5 style="text-align:right;">Estimasi harga jual :</h5>
								</td>
								<td>
									<h5>
										<input type="text" id="gtotal_mamdani" style="border: none; pointer-events: none;" size="11">
									</h5>
								</td>
								<td>
									<h5>s/d</h5>
								</td>
								<td>
									<h5>
										<input type="text" id="gtotal_sugeno" style="border: none; pointer-events: none;" size="11">
									</h5>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="modal-footer">
					<a class="hitung-ulang" href="/fuzzyC/delete?itemid=SM/PC/<?= $itemid; ?>"><button type="button" class="btn btn-secondary" onclick="delete_list()" data-dismiss="modal">Hitung Ulang</button></a>
					<button type="button" class="btn btn-primary" id="simpan" onclick="window.location.reload()">Simpan</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<?= $this->include('layout/footer'); ?>
<?= $this->endSection(''); ?>