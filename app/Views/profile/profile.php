<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<section class="container rounded bg-white">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
            </div>
            <div class="col-md-4 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="nip">NIP</label>
                            <input type="number" id="nip" class="form-control" name="nip">
                        </div>
                        <div class="col-md-12">
                            <label class="nama">Nama</label>
                            <input type="number" id="nama" class="form-control" name="nama">
                        </div>
                        <div class="col-md-12">
                            <label class="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir">
                        </div>
                        <div class="col-md-12">
                            <label class="role">Role</label>
                            <input type="text" id="role" class="form-control" name="role" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="jabatan">Jabatan</label>
                            <input type="text" id="jabatan" class="form-control" name="jabatan" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="unit">Unit Kerja</label>
                            <input type="text" id="unit" class="form-control" name="unit" disabled>
                        </div>
                    </div>
                    <div class="mt-5 text-end"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Password Settings</h4>
                    </div>
                    <div class="col-md-12">
                        <label class="old_password">Old Password</label>
                        <input type="password" id="old_password" class="form-control" name="old_password">
                    </div>
                    <div class="col-md-12">
                        <label class="new_password">New Password</label>
                        <input type="password" id="new_password" class="form-control" name="new_password">
                    </div>
                    <div class="col-md-12">
                        <label class="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control" name="confirm_password">
                    </div>
                    <div class="mt-3 text-end"><button class="btn btn-primary profile-button" type="button">Save Password</button></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>