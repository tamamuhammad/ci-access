<!DOCTYPE html>
<html lang="en"><head>
    <title></title>
</head><body>
    <h3>Detail <?= $admin['name'] ?></h3>
    <hr>
    <ul>
        <li>Nama : <?= $admin['name'] ?></li>
        <li>Email : <?= $admin['email'] ?></li>
        <?php 
        $roleId = $admin['role_id'];
        $role = $this->db->get_where('user_role', ['id' => $roleId])->row_array();
        ?>
        <li>Role : <?= $role['role'] ?></li>
        <li>Foto : <img src="<?= base_url('assets/img/') . $admin['image'] ?>"> <?= $admin['image'] ?></li>
    </ul>
</body></html>