<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>

    <center>
        <h1> ANUGRAH MOTOR PLAJU </h1>
        <h2> Laporan Gaji Pegawai </h2>
        <hr style="width:50%"; border-width:5px; color:black">
    </center>
    <?php
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    ?>
    <table>
        <tr>
            <td>Bulan </td>
            <td> : </td>
            <td> <?php echo $bulan ?></td>
        </tr>
        <tr>
            <td>Tahun </td>
            <td> : </td>
            <td> <?php echo $tahun ?></td>
        </tr>
    </table>
    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tj. Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Komisi</th>
            <th class="text-center">Insentif</th>
            <th class="text-center">Total Gaji</th>
        </tr>

        <?php $no=1; foreach($cetakGaji as $g): ?>
        <?php $komisi = $g->biaya_servis/100*40 ?>
        <?php 
        
        if($g->biaya_servis >= 3000000) {
            $insentif = 150000;
        }else{
            $insentif = 0;
        }?>
        
        <?php if(($g->nama_jabatan) == 'Owner'){ ?>

        <?php }else{ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $g->nik ?></td>
            <td><?php echo $g->nama_pegawai ?></td>
            <td><?php echo $g->nama_jabatan ?></td>
            <td>Rp<?php echo number_format ($g->gaji_pokok,0,',','.') ?></td>
            <td>Rp<?php echo number_format ($g->tj_transport,0,',','.') ?></td>
            <td>Rp<?php echo number_format ($g->uang_makan,0,',','.') ?></td>
            <td>Rp<?php echo number_format ($komisi,0,',','.') ?></td>
            <td>Rp<?php echo number_format ($insentif,0,',','.') ?></td>
            <td>Rp<?php echo number_format ($g->gaji_pokok + $g->tj_transport + $g->uang_makan + $komisi + $insentif,0,',','.') ?></td>
        </tr>
        <?php } ?>
        <?php endforeach; ?>
    </table>

    <table width="100%">
    <tr>
        <td></td>
        <td width="200px">
            <p>Palembang, <?php echo date("d M Y") ?> <br> Owner</p>
            <br>
            <br>
            <p> _____________________ </p>
        </td>
    </tr>
    </table>
    
</body>
</html>

<script type="text/javascript">
    window.print();
</script>