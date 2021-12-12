<?= $this->extend('layout/app'); ?>

<!-- Style -->
<?= $this->section('after-style'); ?>
<link rel="stylesheet" href="<?= base_url('assets/vendors/simple-datatables/style.css'); ?>">
<style>
    table.dataTable td {
        padding: 15px 8px;
    }

    .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
</style>
<link rel="stylesheet" href="<?= base_url('assets/vendors/fontawesome/all.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendors/sweetalert2/sweetalert2.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Basic Tables start -->
<section class="section">
    <?php if (session('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            Jquery Datatable
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Jabatan</th>
                        <th>Bulan Absen</th>
                        <th>Jumlah Absen</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($asnDatas as $asnData) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $asnData['nama']; ?></td>
                            <td><?= $asnData['nip']; ?></td>
                            <td><?= $asnData['jabatan']; ?></td>
                            <td><?= date_format(date_create($asnData['absen']), 'Y-F'); ?></td>
                            <td><?= $asnData['jumlah']; ?></td>
                            <td><?= word_limiter($asnData['keterangan'], 10) . '....' ?></td>
                            <td>
                                <a href="<?= route_to('show_asn', $asnData['id']); ?>" class="btn btn-light btn-sm">Show</a>
                                <?php if (session()->get('role') === 'admin') : ?>
                                    <a href="<?= route_to('edit_asn', $asnData['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm removeEventDB" data-id="<?= $asnData['id']; ?>" data-url="<?= route_to('delete_asn', $asnData['id']); ?>">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<!-- Basic Tables end -->
<?= $this->endSection() ?>

<!-- script -->
<?= $this->section('after-script'); ?>
<script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/fontawesome/all.min.js') ?>"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<script src="<?= base_url('assets/vendors/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/ConfirmDelete.js'); ?>"></script>
<?= $this->endSection() ?>