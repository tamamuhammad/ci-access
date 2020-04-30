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
                    <a href="" class="btn btn-info mb-3 tambah" data-toggle="modal" data-target="#addModal">Add New Menu</a>
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Actions</th>
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
                                        <a href="<?= base_url('menu/edit/') . $m['id'] ?>" class="badge badge-success edit" data-toggle="modal" data-target="#addModal" data-id="<?= $m['id'] ?>">edit</a>
                                        <a href="<?= base_url('menu/delete/') . $m['id'] ?>" class="badge badge-danger" onclick="confirm('yakin?')">delete</a>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addNewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModal">Add new Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu'); ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="menu" id="menu" placeholder="Menu Name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Add Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>