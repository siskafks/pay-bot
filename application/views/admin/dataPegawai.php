<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $title ?></h1>
    </section>

    <section class="content">
    <?php echo $this->session->flashdata('pesan')?>
    <p><a class="btn btn-sm btn-info" href="<?php echo base_url('admin/dataPegawai/addData') ?>"><i class="fa fa-plus"></i> Tambah Pegawai</a></p>
    <table class="table table-bordered table-striped">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIK</th>
        <th class="text-center">Nama Pegawai</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Jabatan</th>
        <th class="text-center">Tanggal Masuk</th>
        <th class="text-center">Status</th>
        <th class="text-center">Hak Akses</th>
        <th class="text-center">Photo</th>
        <th class="text-center">Action</th>
    </tr>
    <?php $no=1; foreach($pegawai as $p) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $p->nik ?></td>
            <td><?php echo $p->nama_pegawai ?></td>
            <td><?php echo $p->jenis_kelamin ?></td>
            <td><?php echo $p->jabatan ?></td>
            <td><?php echo $p->tanggal_masuk ?></td>
            <td><?php echo $p->status ?></td>
                <?php if($p->hak_akses == 1) { ?>
                    <td>Admin</td>
                <?php }else{ ?>
                    <td>Pegawai</td>
                <?php } ?>


            <td><img src="<?php echo base_url().'assets/dist/img/'.$p->photo ?>" width="75px"></td>
            <td>
                <center>
                    <a class="btn btn-sm bg-orange" href ="<?php echo base_url('admin/dataPegawai/updateData/' .$p->id_pegawai) ?>"><i class="fa fa-pencil-square-o"></i></a>
                    <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href ="<?php echo base_url('admin/dataPegawai/deleteData/' .$p->id_pegawai) ?>"><i class="fa fa-close"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    </section>
</div>