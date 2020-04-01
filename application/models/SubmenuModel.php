<?php

class SubmenuModel extends CI_Model
{
    public function getAllSub()
    {
        $query = "SELECT `user_submenu`.*, `user_menu`.`menu` FROM `user_submenu` JOIN `user_menu` ON `user_submenu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }
}
