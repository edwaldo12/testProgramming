<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="">Penjualan</h4>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url('penjualan_controller/halamanTambah') ?>">
                    <button type="button" class="mb-3 btn btn-primary">Tambah Penjualan</button>
                </a>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Penjualan</h4>
                    </div>

                    <div class="card-body">
                        <table class="table" id="penjualan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pemesan</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Pembelian</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penjualan as $key => $j) { ?>
                                    <tr>
                                        <td><?= $j['id'] ?></td>
                                        <td><?= $j['nama_pemesan'] ?></td>
                                        <td><?= $j['nama_barang'] ?></td>
                                        <td><?= $j['harga_barang'] ?></td>
                                        <td><?= $j['jumlah_pembelian'] ?></td>
                                        <td><?= $j['tanggal'] ?></td>
                                        <td>
                                            <a href="<?php echo site_url('penjualan_controller/halamanEdit/' . $j['id']) ?>">
                                                <button class="btn btn-warning btn-sm text-white">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            <a href="<?php echo site_url('penjualan_controller/delete/' . $j['id']) ?>">
                                                <button class="btn btn-danger btn-sm text-white">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $("#penjualan").DataTable()
    })
</script>

<?php if ($this->session->flashdata('tambah_penjualan')) { ?>
    <?php unset($_SESSION['tambah_penjualan']) ?>
    <script>
        alert('Tambah Penjualan berhasil!');
    </script>
<?php } ?>

<?php if ($this->session->flashdata('update_penjualan')) { ?>
    <?php unset($_SESSION['update_penjualan']) ?>
    <script>
        alert('Update Penjualan berhasil!');
    </script>
<?php } ?>

<?php if ($this->session->flashdata('hapus_penjualan')) { ?>
    <?php unset($_SESSION['hapus_penjualan']) ?>
    <script>
        alert('Hapus Penjualan berhasil!');
    </script>
<?php } ?>