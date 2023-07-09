<div class="content-wrapper">
    <section class="content-header">
      <h1><?php echo $title ?></h1>
    </section>
    <section class="content">
        <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Data Pegawai</h3>
                </div>
                <?php foreach($pegawai as $p) : ?>
                <div class="box-body">
                    <div class="col-xs-3">
                        <img style="width:75%" src="<?php echo base_url('/assets/dist/img/'.$p->photo) ?>">
                    </div>
                    <div class="col-xs-5">
                    <table class="table">
                        <tr>
                            <td>Nama Pegawai</td>
                            <td> : </td>
                            <td><?php echo $p->nama_pegawai ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td> : </td>
                            <td><?php echo $p->jabatan ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td> : </td>
                            <td><?php echo $p->tanggal_masuk ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td> : </td>
                            <td><?php echo $p->status ?></td>
                        </tr>
                    </table>
                    </div>

                </div>
                <?php endforeach; ?>
        </div>
    </section>

</div>




