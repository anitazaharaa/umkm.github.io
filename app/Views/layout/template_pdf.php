<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendapatan Tahunan <?= $year ?></title>
</head>
<body>
    <h1>Laporan Pendapatan Tahunan <?= $year ?></h1>
    
    <table border="1" cellpadding="7" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kecamatan</th>
                <?php foreach ($months as $index => $item): ?>
                    <th><?= date('F', strtotime($item['month'])) ?></th>
                <?php endforeach; ?>
            
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pendapatan as $index => $item): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $item['nama_kecamatan'] ?></td>
                    <?php foreach ($item['jumlah_pendapatan'] as $index => $pendapatan): ?>
                        <td>Rp. <?= $pendapatan ?></td>          
                    <?php endforeach; ?>
                </tr>
            <?php 
            $no++;
            endforeach; ?>
        </tbody>
    </table>
</body>
</html>