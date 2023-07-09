<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $title ?></h1>
    </section>

    <section class="content">
      
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Input Servis Pegawai</h3>
            </div>
            <div class="box-body">
                <form mehod="GET">
                    <div class="col-xs-2">
                    <label>Bulan : </label>
                        <select class="form-control" name="bulan">
                                <option value="">--Pilih Bulan--</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="col-xs-2">
                    <label>Tahun : </label>
                        <select class="form-control" name="tahun" >
                            <option value="">--Pilih Tahun--</option>
                            <?php $tahun = date('Y');
                            for($i=2020;$i<$tahun+5;$i++){ ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-8">
                        <br>
                        <button type="submit" class="btn bg-maroon"><i class="fa fa-caret-down"></i> Generate </button>
                    </div>
                </form>
            </div>
        </div>

        <?php 
            if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
        ?> 
        <div class="alert alert-info">
        <i class="icon fa fa-info"></i> Menampilkan Data Servis Pegawai Bulan : <?php echo $bulan ?> Tahun : <?php echo $tahun ?>
        </div>
        
        <form method="POST">
        <button class="btn bg-orange margin pull-right" type="submit" name="submit" value="submit"><i class="fa fa-save"></i> Simpan</button>

        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Total Servis</th>
            </tr>

            <?php $no=1; foreach($inputServis as $s): ?>
                <tr>
                <input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulantahun ?>">
                <input type="hidden" name="nik[]" class="form-control" value="<?php echo $s->nik ?>">
                <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?php echo $s->nama_pegawai ?>">
                <input type="hidden" name="nama_jabatan[]" class="form-control" value="<?php echo $s->nama_jabatan ?>">

                    <td><?php echo $no++ ?></td>
                    <td><?php echo $s->nik ?></td>
                    <td><?php echo $s->nama_pegawai ?></td>
                    <td><?php echo $s->nama_jabatan ?></td>
                    
                    <?php if($s->jabatan == 'Mekanik') { ?>
                    <td><input type="number" name="biaya_servis[]" class="form-control" value="0"></td>
                    <?php }else { ?>
                        <td><input type="number" name="biaya_servis[]" class="form-control" readonly value="0"></td>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>
        </table>
        </form>
    </section>

</div>