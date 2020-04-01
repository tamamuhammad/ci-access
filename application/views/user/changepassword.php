<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pl-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= $title ?></h1>
        <hr>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-10">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="currentPassword" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                        <?= form_error('currentPassword', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                        <?= form_error('newPassword', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="repeatPassword" class="col-sm-2 col-form-label">Repeat Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="repeatPassword" name="repeatPassword">
                        <?= form_error('repeatPassword', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-warning" type="submit">Change Password</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->