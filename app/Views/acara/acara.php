<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Acara &mdash; yukNikah</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <h1>Acara</h1>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success</b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error</b>
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="section-body">
        <div class="card">
            <div class="section-header">
            <h4>Data Acara</h4>
            <div class="section-header-button">
                <a href="<?= site_url('acara/add'); ?>" class="btn btn-primary">Add New</a>
            </div>
            </div>
            <div class="p-0">
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                <tbody>
                <tr>
                    <th>#</th>
                    <th>Nama Acara</th>
                    <th>Tanggal Acara</th>
                    <th>Info</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($acara as $key => $value) : ?>
                <tr>
                    <td><?= $key+1; ?></td>
                    <td><?= $value->nama_acara; ?></td>
                    <td><?= date('d/m/Y', strtotime($value->tanggal_acara)); ?></td>
                    <td><?= $value->info_acara; ?></td>
                    <td>
                        <a href="<?= site_url('acara/edit/'.$value->id_acara); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        <form action="<?= site_url('acara/'.$value->id_acara); ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin menghapus acara <?= $value->nama_acara; ?>')">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody></table>
            </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>