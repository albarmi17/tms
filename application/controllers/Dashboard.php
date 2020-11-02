<?php


class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['level'] != 1) {
            redirect('auth/logout');
            $this->load->helper(array('url', 'html', 'new'));
        }
    }

    function index()
    {
        $this->load->model('Aktivitas_model');
        $this->load->model('Jobdes_model');
        $this->load->model('Profile_model');
        $data['profile'] = $this->Profile_model->all_jobdes();
        $data['_view'] = 'aplikasi/dashboard';
        $this->load->view('layouts/main', $data);
    }
    
  public function get_pdf_test(){
      $data = array(
        'title' => 'Add PDF | ERP',
        'data' => 'Test');
    generate_pdf("welcome.pdf", "welcome.php", $data);
      }
}
