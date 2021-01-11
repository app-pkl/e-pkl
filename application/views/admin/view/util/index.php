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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/user') ?>">User</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List <?= $title ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                            </div>
                            <div>
                                <a href="<?= base_url('admin/util/addJurusan'); ?>" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add Jurusan</a>
                            </div>
                        </div>
                        </br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jurusan</th>
                                    <th>Code Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($jurusan as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row->nama; ?></td>
                                        <td><?= $row->kd_jurusan; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url('admin/util/editJurusan/' . $row->id); ?>" class="btn btn-outline-info">Edit</a>
                                            <a href="<?= base_url('admin/util/deleteJurusan/' . $row->id); ?>" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jurusan</th>
                                    <th>Code Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                            </div>
                            <div>
                                <a href="<?= base_url('admin/util/addProdi'); ?>" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add Prodi</a>
                            </div>
                        </div>
                        </br>
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Prodi</th>
                                    <th>Code Prodi</th>
                                    <th>Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($prodi as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row->nama; ?></td>
                                        <td><?= $row->kd_prodi; ?></td>
                                        <td><?= $row->nama_jurusan; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url('admin/util/editProdi/' . $row->id); ?>" class="btn btn-outline-info">Edit</a>
                                            <a href="<?= base_url('admin/util/deleteProdi/' . $row->id); ?>" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Prodi</th>
                                    <th>Code Prodi</th>
                                    <th>Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php echo $footer; ?>