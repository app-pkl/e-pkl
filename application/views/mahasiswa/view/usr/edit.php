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
                <h3 class="card-title">Edit User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            if ($this->session->flashdata('err') == true) { ?>
                <p style="color: red;"><?php echo $this->session->flashdata('err'); ?></p>
            <?php } ?>
            <form class="form-horizontal" action="<?= base_url('mahasiswa/usr/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $dataUser->id ?>" />
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?= $dataUser->name ?>" name=" name" class="form-control" id="name" required placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" readonly value="<?= $dataUser->username ?>" class=" form-control" id="username" required placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="<?= $dataUser->email ?>" class=" form-control" id="email" required placeholder="Email">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Edit User</button>
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