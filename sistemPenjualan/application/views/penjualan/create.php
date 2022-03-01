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
                    <h3 class="card-title">Tambah Penjualan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_barang">Nama Pemesan</label>
                                <input type="text" class="form-control" id="jabatan" placeholder="Masukkan Nama Barang" name="nama_barang" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    Pesanan Detail
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-xs-5 col-sm-5">
                            <div class="form-group">
                                <label>Nama Barang:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-basket-shopping"></i></span>
                                    </div>
                                    <select name="nama_barang" id="nama_barang" class="form-control">
                                        <option value="">Makan Bakcang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-5 col-sm-5">
                            <div class="form-group">
                                <label>Jumlah Pembelian:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-basket-shopping"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="jumlah_pembelian" placeholder="Masukkan Jumlah Pembelian" name="jumlah_pembelian" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-2 col-sm-2">
                            <div class="form-group">
                                <label for=""></label>
                                <div style="margin-top:9px;">
                                    <button type="button" class="btn btn-sm btn-success" onclick="addPenjualanOrder()">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_pembelian_body"></tbody>
                            </table>
                            <p id="total" style="padding-left:8px"></p>
                            <button type="button" class="btn btn-sm btn-success" onclick="storePenjualan()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /.container-fluid -->
</section>
<!-- /.content -->