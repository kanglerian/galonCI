<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            padding: 2px;
        }
    </style>
</head>

<body>
    <?php foreach ($penjualan as $pj) : ?>
        <p>Kode: <?= $pj->id_sales ?></p>
        <p>Tanggal: <?= $pj->tgl_sales ?></p>
        <p>Kasir: <?= $pj->nama_user ?></p>
        <p>Barang:</p>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $jumlah = 0; ?>
                <?php foreach ($detail as $det) : ?>
                    <tr>
                        <td><?= $det->nama_barang ?></td>
                        <td><?= $det->qty ?>@<?= $det->harga_jual ?></td>
                        <td>Rp<?= number_format($det->qty * $det->harga_jual, 0, ",", ".") ?></td>
                        <?php $jumlah += $det->qty * $det->harga_jual ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <p>Potongan: Rp<?= number_format($pj->potongan, 0, ",", ".") ?></p>
        <p>Harga: Rp<?= number_format($jumlah, 0, ",", ".") ?></p>
        <h3>Total: Rp<?= number_format($jumlah - $pj->potongan, 0, ",", ".") ?></h3>
    <?php endforeach ?>
</body>

</html>