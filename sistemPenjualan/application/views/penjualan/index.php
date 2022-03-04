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
                        </br>
                        <form action="" method="GET">
                            <p>Filter Data</p>
                            <input type="date" value="<?= $this->input->get('start_date') ? date('Y-m-d', strtotime($this->input->get('start_date'))) : ""  ?>" name="start_date" class="form-control" style="min-width:100px;max-width:200px;width:100%;display:inline-block" placeholder="Dimulai dari tanggal" required>
                            <input type="date" value="<?= $this->input->get('end_date') ? date('Y-m-d', strtotime($this->input->get('end_date'))) : ""  ?>" name="end_date" class="form-control" style="min-width:100px;max-width:200px;width:100%;display:inline-block" placeholder="Hingga Tanggal" required>
                            <button class="btn btn-primary" style="position:relative;top:-2px"><i class="fa fa-search"></i></button>
                        </form>
                        <br />
                    </div>
                    <div class="card-body">
                        <table class="table" id="penjualan">
                            <thead>
                                <tr>
                                    <th>Nama Pemesan</th>
                                    <th>Total Pembelian</th>
                                    <th>Total Barang</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penjualan as $key => $j) { ?>
                                    <tr>
                                        <td><?= $j['nama_pemesan'] ?></td>
                                        <td>Rp.<?= number_format($j['total_pembelian']) ?></td>
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
                                            <a href="<?php echo site_url('penjualan_controller/printPenjualan/' . $j['id']) ?>">
                                                <button class="btn btn-info btn-sm text-white">
                                                    <i class="fa-solid fa-barcode"></i></i>
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