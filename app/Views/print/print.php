<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- table bordered -->
                        <div class="table-responsive" id="printableArea">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Unit</th>
                                        <th>Bulan absen</th>
                                        <th>Jumlah Hadir</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($absens->getResult('array') as $absen) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $absen['nama']; ?></td>
                                            <td><?= $absen['jabatan']; ?></td>
                                            <td><?= $absen['unit']; ?></td>
                                            <td><?= $absen['absen']; ?></td>
                                            <td><?= $absen['jumlah']; ?></td>
                                            <td><?= $absen['keterangan']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="button" onclick="printDiv('printableArea')" value="print a div!" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('before-script'); ?>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<?= $this->endSection(); ?>