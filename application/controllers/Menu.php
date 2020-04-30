<?php

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $menu = ['menu' => $this->input->post('menu')];
            $this->db->insert('user_menu', $menu);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('SubmenuModel', 'Submenu');
        $data['submenu'] = $this->Submenu->getAllSub();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('submenu', 'Submenu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('submenu'),
                'menu_id' => $this->input->post('menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('active')
            ];
            $this->db->insert('user_submenu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu Added</div>');
            redirect('menu/submenu');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu successful deleted</div>');
        redirect('menu');
    }

    public function getedit()
    {
        echo json_encode($this->db->get_where('user_menu', ['id' => $_POST['id']])->row_array());
    }

    public function edit($id)
    {
        $menu = ['menu' => $this->input->post('menu')];
        $this->db->set($menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu successful edited</div>');
        redirect('menu');
    }

    public function remove($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_submenu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu successful deleted</div>');
        redirect('menu/submenu');
    }

    public function geteditsm()
    {
        echo json_encode($this->db->get_where('user_submenu', ['id' => $_POST['id']])->row_array());
    }

    public function editsm($id)
    {
        $data = [
            'title' => $this->input->post('submenu'),
            'menu_id' => $this->input->post('menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('active')
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user_submenu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu successful edited</div>');
        redirect('menu/submenu');
    }
}
