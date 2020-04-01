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
                    <?php echo form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>');
                    echo $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#addRole">Add New Role</a>
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($role as $r) :
                            ?>
                                <tr>
                                    <th><?= $i++; ?></th>
                                    <td><?= $r['role'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/roleAccess/') . $r['id'] ?>" class="badge badge-warning">access</a>
                                        <a href="" class="badge badge-success">edit</a>
                                        <a href="" class="badge badge-danger">delete</a>
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

<!-- Modal -->
<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addNewRole" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewRole">Add new Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="role" id="role" placeholder="Role Name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Add Role</button>
                    </div>
            </form>
        </div>
    </div>
</div>