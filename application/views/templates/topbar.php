<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-danger navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('user') ?>" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link d-block py-0" role="button" data-toggle="dropdown" id="userDropdown" aria-haspopup="true" aria-expanded="false"><?= $user['name'] ?>
                <img src="<?= base_url('assets/img/') . $user['image'] ?>" class="img-circle elevation-2 ml-2" alt="User Image" width="40">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a href="" class="dropdown-item"><i class="fas fa-fw fa-user"></i>
                    My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item"><i class="fas fa-fw fa-sign-out-alt"></i>
                    Logout
                </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->