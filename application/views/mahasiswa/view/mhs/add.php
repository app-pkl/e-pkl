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
                <h3 class="card-title">Add Data Kelompok</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            if ($this->session->flashdata('err') == true) { ?>
                <p style="color: red;"><?php echo $this->session->flashdata('err'); ?></p>
            <?php } ?>
            <form class="form-horizontal" action="<?= base_url('mahasiswa/mhs/create'); ?>" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="text" name="npm" class="form-control" id="npm" required placeholder="NPM">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" required placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jurusan" id="jurusan" required>
                                <option>Pilih Jurusan....</option>
                                <?php foreach ($jurusan as $val) : ?>
                                    <option value="<?= $val->id ?>"><?= $val->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="prodi" name="prodi" required>
                                <option>Pilih prodi....</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Cretae Mahasiswa</button>
                    <a href="<?= base_url('mahasiswa/usr'); ?>" class="btn btn-default float-right">Cancel</a>
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

<script>
    $(function() {
        $.ajaxSetup({
            type: 'POST',
            url: `<?= base_url('/mahasiswa/mhs/loadData') ?>`,
            caches: false
        });
        $('.form-horizontal #jurusan').change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        module: 'prodi',
                        id: value
                    },
                    success: function(response) {
                        $("#prodi").html(response);
                    }
                })
            }
        })

        const swall = $('.swall').data('swall');
        if (swall) {
            Swal.fire({
                title: 'Data Berhasil!',
                text: swall,
                icon: 'success'
            });
        }
    });
</script>