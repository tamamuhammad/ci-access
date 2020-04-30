<?php

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->db->get('user')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User successful deleted</div>');
        redirect('report');
    }

    public function excel()
    {
        $data['admin'] = $this->db->get('user')->result_array();
        require(APPPATH . 'PHPExcel/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

        $excel = new PHPExcel();
        $excel->getProperties()->setCreator('Tamam Muhammad');
        $excel->getProperties()->setLastModifiedBy('Tamam Muhammad');

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('A1', 'No.');
        $excel->getActiveSheet()->setCellValue('B1', 'Nama');
        $excel->getActiveSheet()->setCellValue('C1', 'Email');
        $excel->getActiveSheet()->setCellValue('D1', 'Role');
        $excel->getActiveSheet()->setCellValue('E1', 'Image');

        $baris = 2;
        $no = 1;

        foreach ($data['admin'] as $a) {
            $excel->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $excel->getActiveSheet()->setCellValue('B' . $baris, $a['name']);
            $excel->getActiveSheet()->setCellValue('C' . $baris, $a['email']);
            $roleId = $a['role_id'];
            $role = $this->db->get_where('user_role', ['id' => $roleId])->row_array();
            $excel->getActiveSheet()->setCellValue('D' . $baris, $role['role']);
            $excel->getActiveSheet()->setCellValue('E' . $baris, $a['image']);

            $baris++;
        }

        $filename = 'User.xlsx';
        $excel->getProperties()->setTitle('User and Admin');

        ob_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($excel, 'Excel2007');
        $writer->save('php://output');
    }

    public function excelRow($id)
    {
        $data['admin'] = $this->db->get_where('user', ['id' => $id])->row_array();
        require(APPPATH . 'PHPExcel/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

        $excel = new PHPExcel();
        $excel->getProperties()->setCreator('Tamam Muhammad');
        $excel->getProperties()->setLastModifiedBy('Tamam Muhammad');

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('A1', 'No. :');
        $excel->getActiveSheet()->setCellValue('A2', 'Nama :');
        $excel->getActiveSheet()->setCellValue('A3', 'Email :');
        $excel->getActiveSheet()->setCellValue('A4', 'Role :');
        $excel->getActiveSheet()->setCellValue('A5', 'Image :');

        $no = 1;
        $cell = 'B';

        $excel->getActiveSheet()->setCellValue($cell . '1', $no++);
        $excel->getActiveSheet()->setCellValue($cell . '2', $data['admin']['name']);
        $excel->getActiveSheet()->setCellValue($cell . '3', $data['admin']['email']);
        $roleId = $data['admin']['role_id'];
        $role = $this->db->get_where('user_role', ['id' => $roleId])->row_array();
        $excel->getActiveSheet()->setCellValue($cell . '4', $role['role']);
        $excel->getActiveSheet()->setCellValue($cell . '5', $data['admin']['image']);
        
        $filename = $data['admin']['name'] . '.xlsx';
        $excel->getProperties()->setTitle($data['admin']['name']);

        ob_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($excel, 'Excel2007');
        $writer->save('php://output');
    }

    public function pdfRow($id)
    {
        $data['admin'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $this->load->view('pdfRow', $data);
        $papersize = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($papersize, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Detail ' . $data['admin']['nama'] . '.pdf', ['Attachment' => 0]);
    }

    public function pdf()
    {
        $data['admin'] = $this->db->get('user')->result_array();
        $this->load->view('pdf', $data);
        $papersize = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($papersize, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Daftar User.pdf', ['Attachment' => 0]);
    }
}
