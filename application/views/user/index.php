<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pl-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= $title; ?></h1>
        <hr>
        <div class="container-fluid">
            <div class="col-md-4 pl-0">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="row mb-2">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/') . $user['image']; ?>" alt="" class="card-img mr-5" style="width: 142px!important">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user['name'] ?></h5>
                                <p class="card-text"><?= $user['email'] ?></p>
                                <p class="card-text"><small>Member since <?= date('d F Y', $user['date_created']) ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->