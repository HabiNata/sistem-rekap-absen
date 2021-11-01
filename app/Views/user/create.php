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
                                        <label for="foto">Foto</label>
                                        <div class="input-group position-relative">
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-image"></i></span>
                                                <input class="form-control" type="file" id="file" name="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-icon">Role</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                                <select name="role" id="role" class="form-select">
                                                    <option value="admin">Administrator</option>
                                                    <option value="asn">ASN</option>
                                                    <option value="honorer">Honorer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" class="form-control" placeholder="Nama" id="Nama" name="nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                                <input type="number" class="form-control" placeholder="NIP" id="nip" name="nip">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                                <input type="text" class="form-control" id="absen" name="absen">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="unit_kerja">Unit Kerja</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-diagram-2"></i></span>
                                                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja">
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