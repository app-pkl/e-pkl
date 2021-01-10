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
                        <?php foreach ($wrapper as $val) : ?>
                            <?php if ($val->link) { ?>
                                <li class="breadcrumb-item"><a href="<?= base_url($val->link) ?>"><?= $val->title ?></a></li>
                            <?php } else { ?>
                                <li class="breadcrumb-item active"><?= $val->title ?></li>
                        <?php }
                        endforeach; ?>
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
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                    </div>
                    <div>
                        <a href="<?= base_url('mahasiswa/mhs/add'); ?>" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add Anggota</a>
                    </div>
                </div>
                </br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataMahasiswa as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row->npm; ?></td>
                                <td><?= $row->nama; ?></td>
                                <td><?= $row->nama_prodi; ?></td>
                                <td align="center">
                                    <a href="<?= base_url('/mahasiswa/mhs/edit/' . $row->id); ?>" class="btn btn-outline-info">Edit</a>
                                    <?php if ($row->user_id == $this->session->userdata('iduser')) : ?>
                                        <a href="<?= base_url('/mahasiswa/mhs/delete/' . $row->id); ?>" class="btn btn-outline-danger">Delete</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php echo $footer; ?>