<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('user') ?>" class="brand-link py-3 text-center">
        <img src="<?= base_url('assets/img/tamamuhammad.png') ?>" width="55px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <!-- Query Menu-->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu` FROM `user_menu` JOIN `user_access` ON `user_menu`.`id` = `user_access`.`menu_id` WHERE `user_access`.`role_id` = $role_id ORDER BY `user_access`.`menu_id` ASC";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menu as $m) : ?>
                    <li class="nav-header pl-2"><?= $m['menu']; ?></li>
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT * FROM `user_submenu` WHERE `menu_id` = $menuId AND `is_active` = 1";
                    $submenu = $this->db->query($querySubMenu)->result_array();
                    foreach ($submenu as $sm) :
                        if ($title == $sm['title']) : ?>
                            <li class="nav-item has-treeview" style="background-color: darkslategrey; border-radius: 5px; height: 40px">
                            <?php else : ?>
                            <li class="nav-item has-treeview">
                            <?php endif; ?>
                            <a href="<?= base_url() . $sm['url'] ?>" class="nav-link">
                                <i class="nav-icon <?= $sm['icon'] ?> fa-fw"></i>
                                <p>
                                    <?= $sm['title'] ?>
                                </p>
                            </a>
                            </li>
                    <?php endforeach;
                endforeach; ?>
                    <li class="nav-header pl-2">ACTION</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt fa-fw"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>