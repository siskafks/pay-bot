<div class="content-wrapper">
    <section class="content-header">
      <h1><?php echo $title ?></h1>
    </section>
    <section class="content">
        <div class="box box-info text-center" style="width:45%">
            <div class="box-header with-border">
                <h3 class="box-title">Filter Slip Gaji</h3>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/slipGaji/cetakSlipGaji') ?>">
              <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Bulan</label>
                        <div class="col-sm-7">
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
                    </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Tahun</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="tahun" >
                            <option value="">--Pilih Tahun--</option>
                            <?php $tahun = date('Y');
                            for($g=2020;$g<$tahun+5;$g++){ ?>
                            <option value="<?php echo $g ?>"><?php echo $g ?></option>
                            <?php } ?>
                            </select>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Pegawai</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="nama_pegawai" >
                            <option value="">--Pilih Pegawai--</option>
                            <?php foreach($pegawai as $p) : ?>
                            <option value="<?php echo $p->nama_pegawai ?>"><?php echo $p->nama_pegawai ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
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
                <button style="width:100%" type="submit" class="btn btn-info">
                <i class="fa fa-print"></i>  Cetak Slip Gaji </button>
              </div>
            </div>
            </form>
        </div>
    </section>

</div>