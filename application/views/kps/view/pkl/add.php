<?php echo $header, $navbar, $sidenav; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($wrapper as $value) : ?>
                            <li class="breadcrumb-item <?= $value->type; ?>">
                                <?php if ($value->link == null) { ?>
                                    <?= $value->title; ?>
                                <?php } else { ?>
                                    <a href="<?= base_url($value->link); ?>"><?= $value->title; ?></a>
                                <?php }; ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Data Dospem</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url('kps/pkl/create');?>" method="post">
                <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="pkl_id" value="<?=$dataPkl->pkl_id?>"/>
                  <label>Input Dosen Pembimbing</label>
                  <select name="dosen[]" id="select2" multiple="multiple" data-placeholder="Add Dosen Pembimbing" style="width: 100%;">
                    <?php foreach($dataDosen as $val): ?>
                        <option value="<?=$val->id?>"><?=$val->nama?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Dospem</button>
                  <a href="<?=base_url('kps/pkl');?>" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Informasi Pengajuan PKL</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input readonly type="text" value="<?=$dataPkl->nama_perusahaan?>" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal PKL</label>
                                <input readonly type="text" value="<?=$dataPkl->tanggal_pkl?>" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input readonly type="text" value="<?=$dataPkl->thn_ajaran?>" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Prodi</label>
                                <input readonly type="text" value="<?=$dataPkl->prodi?>" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input readonly type="text" value="<?=$dataPkl->jurusan?>" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Data Mahasiswa</label>
                        <select disabled multiple class="form-control">
                            <?php foreach ($dataMhs as $val) : ?>
                                <?php if($val->user_id == $dataPkl->user_id): ?>
                                    <option><?= $val->nama ?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Dosen Pembimbing</label>
                        <select disabled multiple class="form-control">
                            <?php foreach ($dataDospem as $val) : ?>
                                <?php if($val->pkl_id == $dataPkl->pkl_id): ?>
                                    <option><?= $val->nama_dosen ?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<!-- /.content-wrapper -->
<?php echo $footer; ?>
