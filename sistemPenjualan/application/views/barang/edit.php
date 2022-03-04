<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
			</div>
		</div>
	</div>
</div>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Edit Barang</h3>
				</div>
				<?= form_open(site_url('barang_controller/update/' . $barang['id']), ['method' => "POST"]) ?>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_barang">Nama Barang</label>
								<input type="text" class="form-control" id="barang" placeholder="Masukkan Nama Barang" name="nama_barang" value="<?php echo $barang['nama_barang'] ?>">
								<?php echo form_error('nama_barang'); ?>
							</div>
							<div class="form-group">
								<label for="harga_barang">Harga Barang</label>
								<input type="number" class="form-control" id="barang" placeholder="Masukkan Harga Barang" name="harga_barang" value="<?php echo $barang['harga_barang'] ?>">
								<?php echo form_error('harga_barang'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="jumlah_barang">Jumlah Barang</label>
								<input type="number" class="form-control" id="jumlah_barang" placeholder="Masukkan Jumlah Barang" name="jumlah_barang" value="<?php echo $barang['jumlah_barang'] ?>">
								<?php echo form_error('jumlah_barang'); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</section>