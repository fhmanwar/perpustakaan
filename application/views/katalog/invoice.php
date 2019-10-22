
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body>
    
<table style="border:solid;width: 100%" align="center" border="1" >
    <thead>
        <tr>
            <th align="center">No.</th>
            <th align="center">Buku</th>
            <th align="center">Judul Buku</th>
            <th align="center">Tgl Pinjam</th>
            <th align="center">Tgl Harus Kembali</th> 
        </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach ($limit as $lmt ) { ?>
        <tr>
            <td align="center"><?php echo $i ?></td>
            <td align="center" style="width:250px;height:150px; padding:1em;">
                <a href="<?php echo base_url('katalog/detail/'.$lmt->id_buku)?>">
                    <img src="<?php echo base_url('assets/upload/buku/'.$lmt->cover_buku) ?>" alt=" " class="img-responsive" style="width:130px;height:150px;">
                </a>
            </td>
            <td align="center"><?php echo $lmt->judul_buku?></td>

            <td align="center"><?php echo date('d-m-Y', strtotime($lmt->tanggal_pinjam)) ?></td>
            <td align="center"><?php echo date('d-m-Y', strtotime($lmt->tanggal_kembali)) ?></td>
        </tr>
    <?php $i++; } ?>
    </tbody>
</table>
</body>
</html>

