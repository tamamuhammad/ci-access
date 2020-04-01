<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Login </b>Page</a>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="text-muted text-center">Log In to Already Account</p>
            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" name="email" id="email" autofocus value="<?= set_value('email') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <hr>
            <div class="text-center">
                <p class="mb-1">
                    <a href="<?= base_url('auth/forgot') ?>">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('auth/signup') ?>" class="text-center">Create An Account!</a>
                </p>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->