<?= $this->extend('layout/app'); ?>

<?= $this->section('after-style'); ?>
<!-- Include Choices CSS -->
<link rel="stylesheet" href="<?= base_url('assets/vendors/choices.js/choices.min.css'); ?>" />
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <select class="form-select" name="nama" id="nama">
                                                <option value="square">Square</option>
                                                <option value="rectangle">Rectangle</option>
                                                <option value="rombo">Rombo</option>
                                                <option value="romboid">Romboid</option>
                                                <option value="trapeze">Trapeze</option>
                                                <option value="traible">Triangle</option>
                                                <option value="polygon">Polygon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                            <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="absen">Bulan Absen</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-calendar-month"></i></span>
                                            <input type="month" class="form-control" id="absen" name="absen">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Absen</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-calculator"></i></span>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('after-script'); ?>
<!-- Include Choices JavaScript -->
<script src="<?= base_url('assets/vendors/choices.js/choices.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/pages/form-element-select.js'); ?>"></script>
<?= $this->endSection(); ?>