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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <h3 class="card-title">List Daftar Pengajuan PKL</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add Pengajuan</button>
                    </div>
                </div>
                </br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Perusahaan</th>
                            <th>Tanggal Pkl</th>
                            <th>Tahun Ajaran</th>
                            <th>Status Daftar</th>
                            <th>Status Validasi</th>
                            <th>Status Pkl</th>
                            <th>CreateAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataPkl as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row->perusahaan_id; ?></td>
                                <td><?= $row->tanggal_pkl; ?></td>
                                <td><?= $row->thn_ajaran; ?></td>
                                <td><?= $row->status_daftar; ?></td>
                                <td><?= $row->status_val; ?></td>
                                <td><?= $row->status_pkl; ?></td>
                                <td><?= $row->createAt; ?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-outline-info">Edit</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Perusahaan</th>
                            <th>Tanggal Pkl</th>
                            <th>Tahun Ajaran</th>
                            <th>Status Daftar</th>
                            <th>Status Validasu</th>
                            <th>Status Pkl</th>
                            <th>CreateAt</th>
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