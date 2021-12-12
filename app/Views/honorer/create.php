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
                    <form action="<?= route_to('store_honorer'); ?>" method="post" enctype="multipart/form-data" class="form form-vertical">
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
                                                    <option value="<?= $userData['id'] ?>" <?= old('nama') == $userData['id'] ? 'selected' : '' ?>><?= $userData['nama']; ?></option>
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
                                            <input type="text" class="form-control <?= $validation->hasError('jabatan') ? 'is-invalid' : '' ?>" placeholder="Jabatan" id="jabatan" name="jabatan" readonly value="<?= old('jabatan'); ?>">
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
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
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
                                            <input type="number" class="form-control <?= $validation->hasError('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>">
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
                                            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : '' ?>"><?= old('keterangan'); ?></textarea>
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