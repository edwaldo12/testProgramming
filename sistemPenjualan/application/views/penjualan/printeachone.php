<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan penjualan Per Hari</title>
</head>

<body>
    <h1>
        Laporan penjualan Per Hari
    </h1>
    <h2>
        Nama Pelanggan : <?php echo $namaPembeli['nama_pemesan'] ?>
    </h2>
    <table border="1" cellpadding="5px" style="width:100%" class="table table-striped">
        <tr>
            <th>Tanggal penjualan</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>Jumlah Pesanan</th>
            <th>Sub Total</th>
        </tr>
        <?php foreach ($penjualan as $detail_penjualan) { ?>
            <tr>
                <td><?php echo date('Y-m-d', strtotime($detail_penjualan['tanggal'])) ?></td>
                <td><?php echo $detail_penjualan['nama_barang'] ?></td>
                <td>Rp.<?php echo number_format($detail_penjualan['harga_barang']) ?></td>
                <td><?php echo $detail_penjualan['jumlah_pembelian'] ?></td>
                <td>Rp.<?php echo number_format($detail_penjualan['harga_barang'] * $detail_penjualan['jumlah_pembelian'])  ?></td>
            </tr>
        <?php }; ?>
    </table>
    <table style="width:100%">
        <tr>
            <td align="right">Total : Rp. <?php echo number_format($penjualan[0]['total_pembelian']) ?></td>
        </tr>
    </table>
</body>

<script>
    window.print();
</script>

</html>