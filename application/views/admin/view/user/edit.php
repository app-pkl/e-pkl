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
                <h3 class="card-title">Horizontal Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            if ($this->session->flashdata('err') == true) { ?>
                <p style="color: red;"><?php echo $this->session->flashdata('err'); ?></p>
            <?php } ?>
            <form class="form-horizontal" action="<?= base_url('admin/user/update'); ?>" method="post">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $user->id ?>" />
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input value="<?= $user->name; ?>" type="text" name="name" class="form-control" id="name" required placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">username</label>
                        <div class="col-sm-10">
                            <input value="<?= $user->username; ?>" type="text" name="username" class="form-control" id="username" required placeholder="Username" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input value="<?= $user->email; ?>" type="text" name="email" class="form-control" id="email" required placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="select2bs4" name="level" data-placeholder="Select a State" required>
                                <?php if ($user->level == 33) { ?>
                                    <option selected value="33">Mahasiswa</option>
                                    <option value="00">Admin</option>
                                    <option value="22">KPS</option>
                                    <option value="11">UP2AI</option>
                                <?php } else if ($user->level == 22) { ?>
                                    <option selected value="22">KPS</option>
                                    <option value="33">Mahasiswa</option>
                                    <option value="00">Admin</option>
                                    <option value="11">UP2AI</option>
                                <?php } else if ($user->level == 11) { ?>
                                    <option selected value="11">UP2AI</option>
                                    <option value="33">Mahasiswa</option>
                                    <option value="00">Admin</option>
                                    <option value="22">KPS</option>
                                <?php } else if ($user->level == 00) { ?>
                                    <option selected value="00">Admin</option>
                                    <option value="33">Mahasiswa</option>
                                    <option value="22">KPS</option>
                                    <option value="11">UP2AI</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update User</button>
                    <a href="<?= base_url('admin/user'); ?>" class="btn btn-default float-right">Cancel</a>
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