<?= $this->extend('layout/app'); ?>

<?= $this->section('after-style'); ?>
<!-- Include Choices CSS -->
<link rel="stylesheet" href="<?= base_url('assets/vendors/choices.js/choices.min.css'); ?>" />
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="row">
    <div class="col-12 col-lg-12">
        <?php if (session('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="input-group position-relative">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" value="<?= $asnData['nama'] ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <div class="input-group position-relative">
                                        <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                        <input type="text" class="form-control" value="<?= $asnData['nip'] ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <div class="input-group position-relative">
                                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                        <input type="text" class="form-control" value="<?= $asnData['jabatan'] ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="absen">Bulan Absen</label>
                                    <div class="input-group position-relative">
                                        <span class="input-group-text"><i class="bi bi-calendar-month"></i></span>
                                        <input type="text" class="form-control" value="<?= date_format(date_create($asnData['absen']), 'Y-F'); ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Absen</label>
                                    <div class="input-group position-relative">
                                        <span class="input-group-text"><i class="bi bi-calculator"></i></span>
                                        <input type="text" class="form-control" value="<?= $asnData['jumlah']; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <div class="input-group position-relative">
                                        <textarea cols="30" rows="5" class="form-control" disabled><?= $asnData['keterangan']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="<?= route_to('list_asn'); ?>" class="btn btn-light">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('after-script'); ?>
<script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
<!-- Include Choices JavaScript -->
<script src="<?= base_url('assets/vendors/choices.js/choices.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/pages/form-element-select.js'); ?>"></script>
<?= $this->endSection(); ?>