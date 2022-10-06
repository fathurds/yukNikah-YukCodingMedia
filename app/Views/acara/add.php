<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Tambah Acara &mdash; yukNikah</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <h1>Acara</h1>
    </div>
    
    <div class="section-body">
        <div class="card">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="<?= site_url('acara'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h4>Data Acara</h4>
            </div>
            <div class="p-0">
            <div class="card-body col-md-6">
                <form action="<?= site_url('acara'); ?>" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Nama Acara</label>
                        <input type="text" name="nama_acara" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Acara</label>
                        <input type="date" name="tanggal_acara" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Info</label>
                        <textarea name="info_acara" class="form-control"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>