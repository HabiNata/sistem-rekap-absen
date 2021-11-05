<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<?php if (session('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif (session('failed')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('failed'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<section class="container rounded bg-white">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="<?= base_url('image/' . $userData['foto']); ?>">
                    <span class="font-weight-bold"><?= $userData['nama'] ?></span>
                    <!-- <span class="text-black-50">edogaru@mail.com.my</span> -->
                    <span> </span>
                </div>
            </div>
            <div class="col-md-4 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="<?= route_to('update_profile', $userData['id']) ?>" method="post" enctype="multipart/form">
                        <?= csrf_field(); ?>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="nip">NIP</label>
                                <input type="text" id="nip" class="form-control" name="nip" value="<?= $userData['nip']; ?>" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="nama">Nama</label>
                                <input type="text" id="nama" class="form-control <?= $validation->getError('nama') ? 'is-invalid' : '' ?>" name="nama" value="<?= $userData['nama']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->showError('nama'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" class="form-control <?= $validation->getError('tanggal_lahir'); ?>" name="tanggal_lahir" value="<?= $userData['tanggal_lahir']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->showError('tanggal_lahir'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="role">Role</label>
                                <input type="text" id="role" class="form-control" name="role" value="<?= $userData['role']; ?>" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="jabatan">Jabatan</label>
                                <input type="text" id="jabatan" class="form-control" name="jabatan" value="<?= $userData['jabatan']; ?>" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="unit">Unit Kerja</label>
                                <input type="text" id="unit" class="form-control" name="unit" value="<?= $userData['unit']; ?>" disabled>
                            </div>
                        </div>
                        <div class="mt-5 text-end"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <form action="<?= route_to('update_password', $userData['id']); ?>" method="post" enctype="multipart/form-data">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Password Settings</h4>
                        </div>
                        <div class="col-md-12">
                            <label class="old_password">Old Password</label>
                            <input type="password" id="old_password" class="form-control <?= $validation->getError('old_password') ? 'is-invalid' : '' ?>" name="old_password">
                            <div class="invalid-feedback">
                                <?= $validation->showError('old_password'); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="new_password">New Password</label>
                            <input type="password" id="new_password" class="form-control <?= $validation->getError('new_password') ? 'is-invalid' : '' ?>" name="new_password">
                            <div class="invalid-feedback">
                                <?= $validation->showError('new_password'); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" class="form-control  <?= $validation->getError('confirm_password') ? 'is-invalid' : '' ?>" name="confirm_password">
                            <div class="invalid-feedback">
                                <?= $validation->showError('confirm_password'); ?>
                            </div>
                        </div>
                        <div class="mt-3 text-end"><button class="btn btn-primary profile-button" type="submit">Save Password</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>