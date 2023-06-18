<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>/laporan">Laporan</a></li>
                        <li class="breadcrumb-item active">Detail Laporan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row invoice-info mb-4 mt-4">
                        <div class="col-md-6 invoice-col">
                            <h5 class="bg-success" style="width: max-content; padding: 4px 20px;">Data Pengajuan</h5>
                            <dl class="row">
                                <dt class="col-md-4"><b>No. Referensi</b></dt>
                                <dd class="col-md-8">: <?= $result->noref ?></dd>
                                <dt class="col-md-4"><b>Pengirim</b></dt>
                                <dd class="col-md-8">: <?= (get_info($result->user_id)?get_info($result->user_id)->username:"Anonim") ?></dd>
                                <dt class="col-md-4"><b>Judul</b></dt>
                                <dd class="col-md-8">: <?= $result->judul ?></dd>
                                <dt class="col-md-4"><b>Isi</b></dt>
                                <dd class="col-md-8">: <?= $result->isi ?></dd>
                            </dl>
                        </div>
                        <div class="col-md-6 invoice-col mt-5">
                            <dl class="row">
                                <dt class="col-md-4"><b>Tanggal</b></dt>
                                <dd class="col-md-8">: <?= ($result->tgl) ? tgl_indo($result->tgl) : "" ?></dd>
                                <dt class="col-md-4"><b>Lokasi</b></dt>
                                <dd class="col-md-8">: <?= $result->lokasi ?></dd>
                                <dt class="col-md-4"><b>Tujuan</b></dt>
                                <dd class="col-md-8">: <?= get_jurusan($result->tujuan)->jurusan ?></dd>
                            </dl>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="invoice p-3 mb-3">
                        <!-- The time line -->
                        <div class="timeline">
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-success">Feedback</span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <?php foreach ($result2 as $r) : ?>
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <div class="timeline-body p-0">
                                            <div class="card text-dark">
                                                <div class="card-header">
                                                    <h2 class="card-title"><?= get_info($r->user_id)->username ?></h2>
                                                    <small class="float-right"><?= ($r->tgl) ? $r->tgl : "" ?></small>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <p><?= $r->isi ?></p>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item col-md-3">
                                    <div class="timeline-body"> 
                                        <span class="btn bg-success" data-toggle="modal" data-target="#modal-add">Tambah Tanggapan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Tanggapan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/lapor/feedback" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" value="<?= $result->noref ?>" name="noref">
                    <div class="form-group">
                        <textarea name="isi" id="isi" class="form-control" cols="30" rows="10" placeholder="Isi" required></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
</script>
<?= $this->endSection() ?>