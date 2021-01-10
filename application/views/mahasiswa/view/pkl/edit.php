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
                <h3 class="card-title">Edit Data Perusahaan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            if ($this->session->flashdata('err') == true) { ?>
                <p style="color: red;"><?php echo $this->session->flashdata('err'); ?></p>
            <?php } ?>
            <form class="form-horizontal" action="<?= base_url('mahasiswa/pkl/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $dataPerusahaan->id ?>" />
                <input type="hidden" name="user_id" value="<?= $dataPerusahaan->user_id ?>" />
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="<?= $dataPerusahaan->nama ?>" class="form-control" id="name" required placeholder="Nama Perusahaan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="<?= $dataPerusahaan->email ?>" class="form-control" id="email" required placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">telphon</label>
                        <div class="col-sm-10">
                            <input type="text" name="telphon" value="<?= $dataPerusahaan->telphon ?>" class="form-control" id="telphon" required placeholder="telphon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" name="provinsi" value="<?= $dataPerusahaan->provinsi ?>" class="form-control" id="provinsi" required placeholder="provinsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" name="kabupaten" value="<?= $dataPerusahaan->kabupaten ?>" class="form-control" id="kabupaten" required placeholder="kabupaten">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" name="kecamatan" value="<?= $dataPerusahaan->kecamatan ?>" class="form-control" id="kecamatan" required placeholder="kecamatan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Kode Pos</label>
                        <div class="col-sm-10">
                            <input type="text" name="kode_pos" class="form-control" value="<?= $dataPerusahaan->kode_pos ?>" id="kode_pos" required placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="alamat"><?= $dataPerusahaan->alamat ?></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Perusahaan</button>
                    <a href="<?= base_url('mahasiswa/pkl'); ?>" class="btn btn-default float-right">Cancel</a>
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