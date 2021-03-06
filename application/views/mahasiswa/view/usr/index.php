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
                        <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/usr') ?>">Usr</a></li>
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
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                    </div>
                    <div>
                        <?php if (!$this->session->userdata('parent')) : ?>
                            <a href="<?= base_url('mahasiswa/usr/add'); ?>" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add User Kelompok</a>
                        <?php endif; ?>
                    </div>
                </div>
                </br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataUser as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $row->username; ?></td>
                                <td><?= $row->email; ?></td>
                                <td align="center">
                                    <?php if ($row->id == !$row->parent) { ?>
                                        <span class="right badge badge-success">Ketua Anggota</span>
                                    <?php } else { ?>
                                        <span class="right badge badge-info">Anggota</span>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php if (!$this->session->userdata('parent')) : ?>
                                        <a href="<?= base_url('mahasiswa/usr/delete/' . $row->id); ?>" class="btn btn-outline-danger">Delete</a>
                                    <?php endif; ?>
                                    <a href="<?= base_url('mahasiswa/usr/change/' . $row->id); ?>" class="btn btn-outline-primary">Change Password</a>
                                    <a href="<?= base_url('mahasiswa/usr/edit/' . $row->id); ?>" class="btn btn-outline-info">Edit</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
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