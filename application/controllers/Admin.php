<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
	 function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['level'] != 1) {
        	redirect('auth/logout');
        }
                $this->load->model('Jobdes_model');
        $this->load->model('Profile_model');
        $this->load->model('Aktivitas_model');
        // $this->load->helper(array('url', 'html', 'new'));
    } 

	public function index()
	{
		$data ['title'] = 'Dashboard';
		$data ['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
	}
	public function get_pdf_test(){
$this->load->library('pdf');
        $data['job'] = $this->Jobdes_model->getJob($this->uri->segment(3));
        $data['aktivitas'] = $this->Aktivitas_model->get_all_aktivitas();
        $data['profile'] = $this->Profile_model->get_profile($this->uri->segment(3));
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan.pdf";
    $this->pdf->load_view('aplikasi/cetak', $data);
      }
}