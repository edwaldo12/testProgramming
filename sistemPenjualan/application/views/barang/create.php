<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Tambah Barang</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form method="POST" action="<?php echo site_url('barang_controller/storeBarang') ?>">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_barang">Nama Barang</label>
									<input type="text" class="form-control" id="jabatan" placeholder="Masukkan Nama Barang" name="nama_barang" required>
								</div>
								<div class="form-group">
									<label for="harga_barang">Harga Barang</label>
									<input type="number" class="form-control" id="harga_barang" placeholder="Masukkan Harga Barang" name="harga_barang" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="jumlah_barang">Jumlah Barang</label>
									<input type="number" class="form-control" id="jumlah_barang" placeholder="Masukkan Jumlah Barang" name="jumlah_barang" required>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
					</div>

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>
<!-- /.content -->