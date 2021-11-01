<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar - Mazer Admin Dashboard</title>
    <?= $this->renderSection('before-style'); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.svg'); ?>" type="image/x-icon">
    <?= $this->renderSection('after-style'); ?>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="#"><img src="<?= base_url('assets/images/logo/logo.png'); ?>" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?= $dash_active ? 'active' : ''; ?>">
                            <a href="<?= route_to('home'); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub <?= $user_active ? 'active' : ''; ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Data User</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item">
                                    <a href="<?= route_to('list_user'); ?>">LIST</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?= route_to('create_user'); ?>">ADD</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub <?= $asn_active ? 'active' : ''; ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-check-square-fill"></i>
                                <span>ASN</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?= route_to('list_asn'); ?>">LIST</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?= route_to('create_asn'); ?>">ADD</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub <?= $hr_active ? 'active' : '' ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-clock-fill"></i>
                                <span>HONORER</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="<?= route_to('list_honorer') ?>">LIST</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?= route_to('create_honorer'); ?>">ADD</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="user-menu d-flex">
                                            <div class="user-name text-end me-3">
                                                <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                                <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                            </div>
                                            <div class="user-img d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="<?= base_url('assets/images/faces/1.jpg'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                        <li>
                                            <h6 class="dropdown-header">Hello, John!</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                                Profile</a>
                                        </li>
                                        <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3><?= $title ?></h3>
                            </div>
                        </div>
                    </div>
                    <?= $this->renderSection('content'); ?>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://ahmadsaugi.com">Saugi</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <?= $this->renderSection('before-script'); ?>
    <script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/mazer.js'); ?>"></script>
    <?= $this->renderSection('after-script'); ?>
</body>

</html>