<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/lapor">Lapor</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="<?= base_url() ?>/lapor/laporan_action" method="post">
                <?= csrf_field() ?>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Filter Data</h3>
                            </div>
                            <div class="card-body">
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>Tanggal Awal dan Akhir</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right tgl" id="reservation" name="tgl" value="<?= $tgl ?>">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <?php if(!has_permission('admin-jurusan') && !has_permission('w-admin-jurusan')): ?>
                                <div class="form-group">
                                    <label>Pilih Tujuan</label>
                                    <select name="tujuan" id="tujuan" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih Tujuan --</option>
                                        <?php foreach ($tujuan as $t) : ?>
                                            <option value="<?= $t->kode ?>" <?= ($tjn == $t->kode)?"selected":"" ?>> <?= $t->jurusan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php else: ?>
                                    <input type="hidden" name="tujuan" value="<?= jurusan() ?>">
                                <?php endif; ?>
                                <button type="submit" class="btn btn-success">Search <i class="fas fa-search"></i></button>
                                <!-- /.form group -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Pengaduan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Laporan</th>
                                        <th>Pengirim</th>
                                        <th>Judul</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php if($result): ?>
                                    <?php foreach ($result as $r) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $r->jenis ?></td>
                                            <td><?= (get_info($r->user_id) ? get_info($r->user_id)->username : "Anonim") ?></td>
                                            <td><?= $r->judul ?></td>
                                            <td><?= $r->lokasi ?></td>
                                            <td><?= $r->tgl ?></td>
                                            <td>
                                                <?php if ($r->sts == 0) : ?>
                                                    <span class="badge bg-secondary">Belum Dilihat</span>
                                                <?php elseif ($r->sts == 1) : ?>
                                                    <span class="badge bg-success">Dilihat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (has_permission('admin-jurusan')) : ?>
                                                    <a href="<?= base_url() ?>/lapor/show_admin/<?= $r->noref ?>" target="_blank" class="badge badge-success">Lihat Pengaduan</a>
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>/lapor/show/<?= $r->noref ?>" target="_blank" class="badge badge-success">Lihat Pengaduan</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Laporan</th>
                                        <th>Pengirim</th>
                                        <th>Judul</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>