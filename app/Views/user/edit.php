<?php

use CodeIgniter\Filters\CSRF;
?>
<?= $this->extend('layout/app'); ?>

<?= $this->section('after-style'); ?>
<!-- Include Choices CSS -->
<link rel="stylesheet" href="<?= base_url('assets/vendors/choices.js/choices.min.css'); ?>" />
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="row">
    <div class="col-12 col-lg-12">
        <?php if (session('failed')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('failed'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form method="post" action="<?= route_to('update_user', $userData['id']) ?>" enctype='multipart/form-data' class="form form-vertical">
                        <?= csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <div class="input-group position-relative">
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-image"></i></span>
                                                <input class="form-control <?= $validation->hasError('foto') ? 'is-invalid' : '' ?>" type="file" id="foto" name="foto">
                                                <div class="invalid-feedback">
                                                    <?= $validation->showError('foto'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-icon">Role</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                                <select name="role" id="role" class="form-select <?= ($validation->hasError('role')) ? 'is-invalid' : '' ?>">
                                                    <option value="admin" <?= old('role') == 'admin' || $userData['role'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
                                                    <option value="asn" <?= old('role') == 'asn' || $userData['role'] == 'asn' ? 'selected' : '' ?>>ASN</option>
                                                    <option value="honorer" <?= old('role') == 'honorer' || $userData['role'] == 'honorer' ? 'selected' : '' ?>>Honorer</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('role'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" placeholder="Nama" id="Nama" name="nama" value="<?= old('nama') ? old('nama') : $userData['nama']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                                <input type="number" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : '' ?>" placeholder="NIP" id="nip" name="nip" value="<?= old('nip') ? old('nip') : $userData['nip']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nip'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                                <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : '' ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir') ? old('tanggal_lahir') : $userData['tanggal_lahir']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_lahir'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                                <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '' ?>" id="jabatan" name="jabatan" value="<?= old('jabatan') ? old('jabatan') : $userData['jabatan']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jabatan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="unit">Unit Kerja</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-diagram-2"></i></span>
                                                <input type="text" class="form-control <?= ($validation->hasError('unit')) ? 'is-invalid' : '' ?>" id="unit" name="unit" value="<?= old('unit') ? old('unit') : $userData['unit']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('unit'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="input-group position-relative">
                                                <span class="input-group-text"><i class="bi bi-file-earmark-binary -2"></i></span>
                                                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" id="password" name="password">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('password'); ?>
                                                </div>
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