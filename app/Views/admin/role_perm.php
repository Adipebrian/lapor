<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Group And Permission</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/admin">Admin</a></li>
                        <li class="breadcrumb-item active">Group And Permission</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Flashdata -->
    <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('gagal'); ?>"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Group and Permission</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-add">Add Role</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Group</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>

                                    <?php foreach ($group as $g) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $g->gn; ?></td>
                                            <td><?= $g->pn; ?></td>
                                            <td><a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-edit<?= $g->group_id ?>">Change Role</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Group</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php foreach ($group as $g) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-edit<?= $g->group_id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>/admin/change_role_perm" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="group">Group</label>
                                <select name="group" id="group" class="form-control">
                                    <option selected value="<?= $g->group_id ?>"><?= $g->gn ?></option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="perm">Permission</label>
                                <select name="perm" id="perm" class="form-control">
                                    <?php foreach ($perm_all as $pa) : ?>
                                        <option value="<?= $pa->id ?>" <?= ($g->permission_id == $pa->id) ? 'selected' : '' ?>><?= $pa->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-key"></i> Change</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/admin/add_role_perm" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="group">Group</label>
                            <select name="group" id="group" class="form-control" required>
                                <option value="" selected disabled>-- Select --</option>
                                <?php foreach ($group_all as $ga) : ?>
                                    <option value="<?= $ga->id ?>"><?= $ga->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="perm">Permission</label>
                            <select name="perm" id="perm" class="form-control" required>
                                <option value="" selected disabled>-- Select --</option>
                                <?php foreach ($perm_all as $pa) : ?>
                                    <option value="<?= $pa->id ?>"><?= $pa->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-key"></i> Add</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?= $this->endSection() ?>