<!DOCTYPE html>
<html lang="en"><head>
    <title></title>
</head><body>
    <h3>Daftar User</h3>
    <hr>
    <table>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Image</th>
        </tr>
            <?php
            $i = 1;
            foreach ($admin as $u) :
            ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $u['name'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td>
                        <?php
                        $roleId = $u['role_id'];
                        $role = $this->db->get_where('user_role', ['id' => $roleId])->row_array();
                        echo $role['role'];
                        ?>
                    </td>
                    <td><img src="<?= base_url('assets/img/') . $u['image'] ?>" width="75px"></td>
                </tr>
            <?php
            endforeach;
            ?>
    </table>
</body></html>