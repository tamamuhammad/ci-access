<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('auth/forgot') ?>">Change your<b> Password</b></a>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="text-muted text-center">Change the password from</p>
            <small class="text-muted"><?= $this->session->userdata('reset_email') ?></small>
            <form action="<?= base_url('auth/change'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="New Password" name="password1" id="password1" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Repeat Password" name="password2" id="password2" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->