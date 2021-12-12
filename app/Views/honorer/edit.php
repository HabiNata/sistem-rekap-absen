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
                    <form action="<?= route_to('update_honorer', $honorerData['id']); ?>" method="post" enctype="multipart/form-data" class="form form-vertical">
                        <?= csrf_field() ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <select class="form-select <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" name="nama" id="nama">
                                                <option value="" disabled selected>--Select--</option>
                                                <?php foreach ($userDatas as $userData) : ?>
                                                    <option value="<?= $userData['id'] ?>" <?= old('nama') == $userData['id'] || $userData['id'] == $honorerData['user_id'] ? 'selected' : '' ?>><?= $userData['nama']; ?></option>
                                                <?php endforeach; ?> ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                            <input type="text" class="form-control <?= $validation->hasError('jabatan') ? 'is-invalid' : '' ?>" placeholder="Jabatan" id="jabatan" name="jabatan" readonly value="<?= old('jabatan') ? old('jabatan') : $honorerData['jabatan']; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="absen">Bulan Absen</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-calendar-month"></i></span>
                                            <select name="absen" id="absen" class="form-select <?= $validation->hasError('absen') ? 'is-invalid' : '' ?>">
                                                <option value="01" <?= old('absen') || $honorerData['absen'] == '01' ? 'selected' : '' ?>>Januari</option>
                                                <option value="02" <?= old('absen') || $honorerData['absen'] == '02' ? 'selected' : '' ?>>Februari</option>
                                                <option value="03" <?= old('absen') || $honorerData['absen'] == '03' ? 'selected' : '' ?>>Maret</option>
                                                <option value="04" <?= old('absen') || $honorerData['absen'] == '04' ? 'selected' : '' ?>>April</option>
                                                <option value="05" <?= old('absen') || $honorerData['absen'] == '05' ? 'selected' : '' ?>>Mei</option>
                                                <option value="06" <?= old('absen') || $honorerData['absen'] == '06' ? 'selected' : '' ?>>Juni</option>
                                                <option value="07" <?= old('absen') || $honorerData['absen'] == '07' ? 'selected' : '' ?>>Juli</option>
                                                <option value="08" <?= old('absen') ||  $honorerData['absen'] == '08' ? 'selected' : '' ?>>Agustus</option>
                                                <option value="09" <?= old('absen') ||  $honorerData['absen'] == '09' ? 'selected' : '' ?>>September</option>
                                                <option value="10" <?= old('absen') || $honorerData['absen'] == '10' ? 'selected' : '' ?>>Oktober</option>
                                                <option value="11" <?= old('absen') || $honorerData['absen'] == '11' ? 'selected' : '' ?>>November</option>
                                                <option value="12" <?= old('absen') || $honorerData['absen'] == '12' ? 'selected' : '' ?>>Desember</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('absen'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Absen</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-calculator"></i></span>
                                            <input type="number" class="form-control <?= $validation->hasError('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('jumlah') ? old('jumlah') : $honorerData['jumlah']; ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jumlah'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <div class="input-group position-relative">
                                            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : '' ?>"><?= old('keterangan') ? old('keterangan') : $honorerData['keterangan']; ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keterangan'); ?>

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
<script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
<!-- Include Choices JavaScript -->
<script src="<?= base_url('assets/vendors/choices.js/choices.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/pages/form-element-select.js'); ?>"></script>
<script>
    $('#nama').on('change', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/honorer/data/' + $('#nama').val(),

            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $('#nama').val(),
            },
            success: function(data) {
                $('#jabatan').val(data.jabatan);
                console.log(data.nama);
            },
            error: function(e) {
                console.log(e.message);
            }
        });
    });
</script>
<?= $this->endSection(); ?>