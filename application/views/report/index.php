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
                <div class="col-10">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                    <?php else : ?>
                        <?= $this->session->flashdata('message'); ?>
                    <?php endif; ?>
                    <div class="col-12 d-flex mb-3">
                        <div class="col-4">
                            <a href="<?= base_url(); ?>report/excel/" class="btn btn-success float-left w-100"><i class="fas fa-file-excel mr-3"></i>Export Excel</a>
                        </div>
                        <div class="col-4">
                            <a href="<?= base_url(); ?>report/pdf/" class="btn btn-warning float-left w-100"><i class="fas fa-file-pdf mr-3"></i>Export PDF</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Active</th>
                            <th scope="col">Image</th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($admin as $u) :
                            ?>
                                <tr>
                                    <th><?= $i; ?></th>
                                    <td><?= $u['name'] ?></td>
                                    <td><?= $u['email'] ?></td>
                                    <td>
                                        <?php
                                        $roleId = $u['role_id'];
                                        $queryRole = "SELECT * FROM `user_role` WHERE `id` = $roleId";
                                        $role = $this->db->query($queryRole)->row_array();
                                        echo $role['role'];
                                        ?>
                                    </td>
                                    <td><?= $u['is_active'] ?></td>
                                    <td><img src="<?= base_url('assets/img/') . $u['image'] ?>" width="75px"></td>
                                    <td>
                                        <a href="<?= base_url(); ?>report/pdfRow/<?= $u['id'] ?>" class="btn btn-warning"><i class="fas fa-file-pdf"></i></a> -
                                        <a href="<?= base_url(); ?>report/excelRow/<?= $u['id'] ?>" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
                                        <?php if ($i > 1) : ?>
                                            - <a href="<?= base_url('report/delete/') . $u['id'] ?>" class="btn btn-danger" onclick="confirm('yakin?')"><i class="fas fa-trash-alt"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->