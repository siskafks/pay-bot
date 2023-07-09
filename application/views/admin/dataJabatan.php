  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $title ?></h1>
    </section>

    <section class="content">
    <p><a class="btn btn-sm btn-info" href ="<?php echo base_url('admin/dataJabatan/addData') ?>"><i class="fa fa-plus"></i> Tambah Data</a></p>
    <?php echo $this->session->flashdata('pesan')?>
    <table class="table table-bordered table-striped">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Jabatan</th>
        <th class="text-center">Gaji Pokok</th>
        <th class="text-center">Tj. Transport</th>
        <th class="text-center">Uang Makan</th>
        <th class="text-center">Target Servis</th>
        <th class="text-center">Total Gaji</th>
        <th class="text-center">Action</th>
    </tr>
    <?php $no=1; foreach($jabatan as $j) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $j->nama_jabatan?></td>
            <td>Rp<?php echo number_format($j->gaji_pokok,0,',','.')?></td>
            <td>Rp<?php echo number_format($j->tj_transport,0,',','.')?></td>
            <td>Rp<?php echo number_format($j->uang_makan,0,',','.')?></td>
            <td>Rp<?php echo number_format($j->target_servis,0,',','.')?></td>
            <td>Rp<?php echo number_format($j->gaji_pokok +$j->tj_transport + $j->uang_makan,0,',','.')?></td>
            <td>
                <center>
                    <a class="btn btn-sm bg-orange" href ="<?php echo base_url('admin/dataJabatan/updateData/' .$j->id_jabatan) ?>"><i class="fa fa-pencil-square-o"></i></a>
                    <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href ="<?php echo base_url('admin/dataJabatan/deleteData/' .$j->id_jabatan) ?>"><i class="fa fa-close"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
  </table>
</section>

  </div>
 



