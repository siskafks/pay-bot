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
        <h2> Laporan Servis Pegawai </h2>
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
            <th class="text-center">Total Servis</th>
        </tr>
        
        <?php $no=1; foreach($lap_servis as $l): ?>
            <?php if(($l->nama_jabatan) == 'Mekanik'){ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $l->nik ?></td>
            <td><?php echo $l->nama_pegawai ?></td>
            <td><?php echo $l->nama_jabatan ?></td>
            <td>Rp<?php echo number_format ($l->biaya_servis,0,',','.') ?></td>
        </tr>
            <?php }else{ ?>
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