<div class="content-wrapper">
    <section class="content-header">
      <h1><?php echo $title ?></h1>
    </section>

    <section class="content">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Filter Data Gaji Pegawai</h3>
            </div>
            <div class="box-body">
                <form method="GET">
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
                            for($g=2020;$g<$tahun+5;$g++){ ?>
                            <option value="<?php echo $g ?>"><?php echo $g ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-8">
                        <br>
                        <button type="submit" class="btn bg-maroon"><i class="fa fa-eye"></i> Tampilkan Data </button>               
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
        <i class="icon fa fa-info"></i> Menampilkan Data Gaji Pegawai Bulan : <?php echo $bulan ?> Tahun : <?php echo $tahun ?>
        </div>

        <?php 
        $jml_data = count($gaji);
        if($jml_data > 0) { ?>

        <div class="table-responsive">
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

                <?php $no=1; foreach($gaji as $g): ?>
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
        </div>

        <?php }else{ ?>
            <div class="callout callout-warning">
                <i class="fa fa-exclamation-triangle"></i> Data masih kosong. Silahkan input data servis pada bulan dan tahun yang Anda pilih!
              </div>
        <?php } ?>
    
    </section>

  </div>