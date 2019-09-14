<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .judul{
            text-align:center;
            font-family:verdana;
        }
        table, td, th {  
            border: 1px solid #ddd;
            text-align: left;
            font-family:verdana;
        }

        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        padding: 15px;
        }
    </style>
     <script>
	window.print();
	</script>
</head>
<body>
    <h1 class="judul">Data Laporan Pengeluaran</h1>
    <table>
        <thead>
            <tr>
                <th data-field="id">No</th>
                <th data-field="name">ID Pengeluaran</th>
                <th data-field="email">Tujuan</th>
                <th data-field="phone">Nominal Pengeluaran</th>
                <th data-field="tgl">Keterangan</th>
                <th data-field="jk">Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
             <?php $i=0; foreach($pengeluaran as $row){ $i++; ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['id_pengeluaran']; ?></td>
                <td><?= $row['tujuan']; ?></td>
                <td>Rp. <?= number_format($row['nominal'],2,",",".") ;?></td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['tanggal_keluar']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>