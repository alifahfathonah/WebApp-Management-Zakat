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
    <h1 class="judul">Data Laporan Keuangan <?= $tahun; ?></h1>
    <table>
        <thead>
            <tr>
                <th data-field="id">No</th>
                <th data-field="name">Bulan</th>
                <th data-field="email">Pemasukan</th>
                <th data-field="phone">Pengeluaran</th>
            </tr>
            <?php 
            $blnString = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            $dataKeluar = array();
            
            $i = 0; 
            $nomor = 1;
            $j =0;
            foreach($pengeluaran as $pBln){
                foreach($pBln as $p){   
                    $dataKeluar[$j] =  $p['jumlah'];
                    $j++;
                }
                }

                

            foreach($sumbangan as $bln){
                    foreach($bln as $namabln){
                        foreach($namabln as $jml){
                            
                ?>
                
                <tr>
                    <td><?= $nomor; ?></td>
                    <td><?= $blnString[$i] ?></td>
                    <td>Rp. <?= number_format($jml,2,",","."); ?></td>
                    <td>Rp. <?= number_format($dataKeluar[$i],2,",",".");?></td>
                </tr>
                    <?php  $i++; $nomor++; }}}?>
            </tbody>
                    
        </thead>
    </table>
</body>
</html>