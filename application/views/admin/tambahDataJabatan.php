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
                    <form method="POST" action="<?php echo base_url('admin/dataJabatan/tambahDataAksi')?>">
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input type="text" name="nama_jabatan" class="form-control">
                            <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="text" name="gaji_pokok" class="form-control">
                            <?php echo form_error('gaji_pokok','<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Tunjangan Transport</label>
                            <input type="text" name="tj_transport" class="form-control">
                            <?php echo form_error('tj_transport','<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Uang Makan</label>
                            <input type="text" name="uang_makan" class="form-control">
                            <?php echo form_error('uang_makan','<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Target Servis</label>
                            <input type="text" name="target_servis" class="form-control">
                            <?php echo form_error('target_servis','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</div>