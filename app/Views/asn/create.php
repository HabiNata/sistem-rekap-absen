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
                    <form action="<?= route_to('store_asn'); ?>" method="post" enctype="multipart/form-data" class="form form-vertical">
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
                                                    <option value="<?= $userData['id'] ?>" <?= old('nama') ? 'selected' : '' ?>><?= $userData['nama']; ?></option>
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
                                        <label for="nip">NIP</label>
                                        <div class="input-group position-relative">
                                            <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                            <input type="number" class="form-control <?= $validation->hasError('nip') ? 'is-invalid' : '' ?>" placeholder="NIP" id="nip" name="nip" readonly value="<?= old('nip'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nip'); ?>
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
                                            <input type="date" class="form-control <?= $validation->hasError('absen') ? 'is-invalid' : '' ?>" id="absen" name="absen" value="<?= old('absen'); ?>">
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
            url: 'data/' + $('#nama').val(),

            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $('#nama').val(),
            },
            success: function(data) {
                $('#nip').val(data.nip);
                $('#jabatan').val(data.jabatan);
                console.log(data);
            },
            error: function(e) {
                console.log(e.message);
            }
        });
    });
</script>
<?= $this->endSection(); ?>