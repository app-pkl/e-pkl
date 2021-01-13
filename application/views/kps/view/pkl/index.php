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
                <h3 class="card-title">List Daftar Pengajuan PKL</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Perusahaan</th>
                            <th>Mahasiswa</th>
                            <th>Tanggal Pkl</th>
                            <th>Tahun Ajaran</th>
                            <th>Status Daftar</th>
                            <th>Status Validasi</th>
                            <th>Status Pkl</th>
                            <th>CreateAt</th>
                            <th>Dospem</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataPkl as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row->nama_perusahaan; ?></td>
                                <td>
                                    <?php foreach ($dataMhs as $val) : ?>
                                        <?php if($val->user_id == $row->user_id): ?>
                                            <span class="left badge badge-success"><?= $val->nama ?></span>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $row->tanggal_pkl; ?></td>
                                <td><?= $row->thn_ajaran; ?></td>
                                <td>
                                    <!-- status daftar -->
                                    <?php if ($row->status_daftar == 0) { ?>
                                        <span class="left badge badge-warning">Baru</span>
                                    <?php } else if ($row->status_daftar == 1) { ?>
                                        <span class="left badge badge-info">Surat</span>
                                    <?php } else if ($row->status_daftar == 2) { ?>
                                        <span class="left badge badge-primary">Proses</span>
                                    <?php } else if ($row->status_daftar == 3) { ?>
                                        <span class="left badge badge-success">Diterima</span>
                                    <?php } else if ($row->status_daftar == 4) { ?>
                                        <span class="left badge badge-danger">Ditolak</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <!-- status validasi -->
                                    <?php if ($row->status_val == 0) { ?>
                                        <span class="left badge badge-warning">noval</span>
                                    <?php } else if ($row->status_val == 1) { ?>
                                        <span class="left badge badge-info">valkps</span>
                                    <?php } else if ($row->status_val == 2) { ?>
                                        <span class="left badge badge-primary">valup2ai</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <!-- status pkl -->
                                    <?php if ($row->status_pkl == 0) { ?>
                                        <span class="left badge badge-warning">daftar</span>
                                    <?php } else if ($row->status_pkl == 1) { ?>
                                        <span class="left badge badge-info">proses</span>
                                    <?php } else if ($row->status_pkl == 2) { ?>
                                        <span class="left badge badge-primary">selesai</span>
                                    <?php } ?>
                                </td>
                                <td><?= $row->createAt; ?></td>
                                <td>
                                    <?php foreach ($dataDosen as $val) : ?>
                                        <?php if($val->pkl_id == $row->pkl_id): ?>
                                            <a href="<?=base_url('kps/pkl/deleteDospem/'.$row->pkl_id.'/'.$val->dosen_id);?>"><span class="left badge badge-info"><?= $val->nama_dosen ?></span></a>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php if($row->status_daftar == 3):?>
                                        <a href="<?= base_url('/kps/pkl/addDospem/' . $row->pkl_id); ?>" class="btn btn-outline-success">Add Dospem</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Perusahaan</th>
                            <th>Mahasiswa</th>
                            <th>Tanggal Pkl</th>
                            <th>Tahun Ajaran</th>
                            <th>Status Daftar</th>
                            <th>Status Validasu</th>
                            <th>Status Pkl</th>
                            <th>CreateAt</th>
                            <th>Dospem</th>
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