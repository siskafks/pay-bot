<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $title ?></h1>
    </section>

<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <div class="card" style="width:60%">
                <div class="card-body">
                    <?php foreach ($jabatan as $j): ?>
                    <form method="POST" action="<?php echo base_url('admin/dataJabatan/updateDataAksi')?>">
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input type="hidden" name="id_jabatan" class="form-control" value="<?php echo $j->id_jabatan ?>">
                            <input type="text" name="nama_jabatan" class="form-control" value="<?php echo $j->nama_jabatan ?>">
                            <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="number" name="gaji_pokok" class="form-control" value="<?php echo $j->gaji_pokok ?>">
                            <?php echo form_error('gaji_pokok','<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Tunjangan Transport</label>
                            <input type="number" name="tj_transport" class="form-control" value="<?php echo $j->tj_transport ?>">
                            <?php echo form_error('tj_transport','<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Uang Makan</label>
                            <input type="number" name="uang_makan" class="form-control" value="<?php echo $j->uang_makan ?>">
                            <?php echo form_error('uang_makan','<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Target Servis</label>
                            <input type="number" name="target_servis" class="form-control" value="<?php echo $j->target_servis ?>">
                            <?php echo form_error('target_servis','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <button type="submit" class="btn bg-orange">Update</button>
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

</div>