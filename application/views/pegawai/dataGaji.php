  <div class="content-wrapper">
    <section class="content-header">
      <h1><?php echo $title ?></h1>
    </section>

    <section class="content">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Bulan/Tahun</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan Transport</th>
                <th>Uang Makan</th>
                <th>Komisi</th>
                <th>Insentif</th>
                <th>Total Gaji</th>
                <th>Cetak Slip</th>
            </tr>
            <?php foreach($gaji as $g) : ?>
                <?php $komisi = $g->biaya_servis/100*40 ?>
                <?php 
                    if($g->biaya_servis >= 3000000) {
                        $insentif = 150000;
                    }else{
                        $insentif = 0;
                }?>
            <tr>
                <td><?php echo $g->bulan ?></td>
                <td>Rp<?php echo number_format ($g->gaji_pokok,0,',','.') ?></td>
                <td>Rp<?php echo number_format ($g->tj_transport,0,',','.') ?></td>
                <td>Rp<?php echo number_format ($g->uang_makan,0,',','.') ?></td>
                <td>Rp<?php echo number_format ($komisi,0,',','.') ?></td>
                <td>Rp<?php echo number_format ($insentif,0,',','.') ?></td>
                <td>Rp<?php echo number_format ($g->gaji_pokok + $g->tj_transport + $g->uang_makan + $komisi + $insentif,0,',','.') ?></td>
                <td>
                    <center>
                        <a class="btn btn-info" href="<?php echo base_url('pegawai/dataGaji/cetakSlip/'.$g->id_servis) ?>">
                        <i class="fa fa-print"></i></a>
                    </center>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>

</div>




