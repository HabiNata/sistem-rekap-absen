<?= $this->extend('layout/app'); ?>

<?= $this->section('after-style'); ?>
<link rel="stylesheet" href="<?= base_url('assets/vendors/iconly/bold.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?= $this->endSection() ?>

<?= $this->section('after-script'); ?>

<script src="<?= base_url('assets/js/pages/dashboard.js'); ?>"></script>
<?= $this->endSection(); ?>