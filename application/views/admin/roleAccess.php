<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container mx-3">
        <section class="content-header">
            <h1><?= $title ?></h1>
            <hr>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-6">
                    <h5>Role : <?= $role['role']; ?></h5>
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Access</th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($menu as $m) :
                            ?>
                                <tr>
                                    <th><?= $i++; ?></th>
                                    <td><?= $m['menu'] ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input access" type="checkbox" <?= check_access($role['id'], $m['id']) ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->