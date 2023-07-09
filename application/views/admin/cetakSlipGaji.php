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
        <h2> Slip Gaji Pegawai </h2>
        <hr style="width:50%"; border-width:5px; color:black">
    </center>

    <?php foreach($cetak_slip as $cs) :?>
        <?php $komisi = $cs->biaya_servis/100*40 ?>
        <?php 
        
        if($cs->biaya_servis >= 3000000) {
            $insentif = 150000;
        }else{
            $insentif = 0;
        }?>
    <table style="width:100%">
        <tr>
            <td width="20%">NIK </td>
            <td width="2%"> : </td>
            <td> <?php echo $cs->nik ?></td>
        </tr>
        <tr>
            <td>Nama Pegawai </td>
            <td> : </td>
            <td> <?php echo $cs->nama_pegawai ?></td>
        </tr>
        <tr>
            <td>Jabatan </td>
            <td> : </td>
            <td> <?php echo $cs->nama_jabatan ?></td>
        </tr>
        <tr>
            <td>Bulan </td>
            <td> : </td>
            <td> <?php echo substr($cs->bulan, 0,2) ?></td>
        </tr>
        <tr>
            <td>Tahun </td>
            <td> : </td>
            <td> <?php echo substr($cs->bulan, 2,4) ?></td>
        </tr>
    </table>
   
    <table class="table table-bordered table-striped">
    <br>
        <tr>
            <th class="text-center" width="5%">No</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Jumlah </th>
       
        </tr>
        <tr>
            <td class="text-center">1</td>
            <td>Gaji Pokok</td>
            <td>Rp<?php echo number_format ($cs->gaji_pokok,0,',','.') ?></td>
        </tr>
        <tr>
            <td class="text-center">2</td>
            <td>Tunjangan Transport</td>
            <td>Rp<?php echo number_format ($cs->tj_transport,0,',','.') ?></td>
        </tr>
        <tr>
            <td class="text-center">3</td>
            <td>Uang Makan</td>
            <td>Rp<?php echo number_format ($cs->uang_makan,0,',','.') ?></td>
        </tr>
        <tr>
            <td class="text-center">4</td>
            <td>Komisi</td>
            <td>Rp<?php echo number_format ($komisi,0,',','.') ?></td>
        </tr>
        <tr>
            <td class="text-center">5</td>
            <td>Insentif</td>
            <td>Rp<?php echo number_format ($insentif,0,',','.') ?></td>
        </tr>
        <tr>
            <th colspan="2" style="text-align:right;">Total Gaji</th>
            <th>Rp<?php echo number_format ($cs->gaji_pokok+$cs->tj_transport+$cs->uang_makan+$komisi+$insentif,0,',','.') ?></th>
        </tr>
    </table>

    <table width="100%">
    <tr>
        <td></td>
        <td>
            <p>Pegawai</p>
            <br>
            <br>
            <p><?php echo $cs->nama_pegawai ?></p>
        </td>
        <td></td>
        <td width="200px">
            <p>Palembang, <?php echo date("d M Y") ?> <br> Owner</p>
            <br>
            <br>
            <p> _____________________ </p>
        </td>
    </tr>
    </table>
    
    <?php endforeach; ?>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>