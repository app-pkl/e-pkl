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
        <!-- Default box -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Data Pengajuan PKL</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            if ($this->session->flashdata('err') == true) { ?>
                <p style="color: red;"><?php echo $this->session->flashdata('err'); ?></p>
            <?php } ?>
            <form class="form-horizontal" action="<?= base_url('mahasiswa/home/updatePengajuan'); ?>" method="post">
                <div class="card-body">
                    <input name="user_id" value="<?= $id ?>" type="hidden" />
                    <input name="id" value="<?= $dataPengajuan->id ?>" type="hidden" />

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Perusahaan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="perusahaan">
                                <option>Pilih Perusahaan....</option>
                                <?php foreach ($perusahaan as $val) : ?>
                                    <?php if ($val->id == $dataPengajuan->perusahaan_id) { ?>
                                        <option selected value="<?= $val->id ?>"><?= $val->nama ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $val->id ?>"><?= $val->nama ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Tanggal PKL</label>
                        <div class="col-sm-10">
                            <input type="date" value="<?= $dataPengajuan->tanggal_pkl ?>" name="tanggal" class="form-control" id="tanggal" required placeholder="Tanggal PKL">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Tahun Ajaran</label>
                        <div class="col-sm-10">
                            <input type="number" value="<?= $dataPengajuan->thn_ajaran ?>" name="tahun" class="form-control" id="tahun" required placeholder="Tahun Ajaran">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Cretae Pengajuan</button>
                    <a href="<?= base_url('mahasiswa/home'); ?>" class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


<!-- /.content-wrapper -->
<?php echo $footer; ?>