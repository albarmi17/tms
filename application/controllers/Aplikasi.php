<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Aplikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Jobdes_model');
        $this->load->model('Profile_model');
        $this->load->model('Aktivitas_model');
    }

    public function index()
    {
        if ($this->session->userdata['level'] != 2) {
            redirect('auth/logout');
        }
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['_view'] = 'aplikasi/dashboard';

        $data['profile'] = $this->Profile_model->get_jobdes($this->session->userdata['id_user']);

        $this->load->view('layouts/main', $data);
    }
    public function Addjobdes()
    {
        if ($this->session->userdata['level'] != 2) {
            redirect('auth/logout');
        }
        $jadwal = $this->db->get_where('jadwal', ['id_profile' => $this->uri->segment(3), 'id_user' => $this->session->userdata('id_user'), 'tanggal' => date('Y-m-d')])->row_array();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('jobdes[]', 'Jobdes', 'required');
        $this->form_validation->set_rules('aktivitas[]', 'Aktivitas', 'required');
        if ($this->form_validation->run()) {
            $params = array(
                'id_jadwal' => $jadwal['id_jadwal'],
                'jobdes' => $this->input->post('jobdes[0]'),
            );
            $jobdes_id = $this->Jobdes_model->add_jobdes($params);
            for ($i = 0; $i < count($this->input->post('aktivitas')); $i++) {
                $rr = [
                    'uraian' => $this->input->post('aktivitas[' . $i . ']'),
                    'periode' => $this->input->post('period[' . $i . ']'),
                    'waktu' => $this->input->post('waktu[' . $i . ']'),
                    'frekuensi' => $this->input->post('frekuensi[' . $i . ']'),
                    'id_jobdes' => $jobdes_id,
                ];
                $isi = $this->Jobdes_model->add_aktivitas($rr);
            }
            if ($isi) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Membuat Jobdes Baru</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Gagal Membuat Jobdes Baru</div>');
            }
            redirect('aplikasi/addjobdes/' . $this->uri->segment(3));
        } else {

            $file = base_url('assets/period.json');
            $period = file_get_contents($file);
            $dataPeriod = json_decode($period, true);
            // var_dump($dataPeriod['period']);
            // die;
            $dt = array();
            foreach ($dataPeriod as $d) {
                if ($d['name'] == 'daily') {
                    $value = array();
                    foreach ($d['value']['data'] as $v) {
                        array_push($value, $v['value']);
                    }
                    $vl = array_sum($value);
                    $params = [
                        "name" => $d['name'],
                        "value" => 365 - $vl
                    ];
                } else {
                    $params = [
                        "name" => $d['name'],
                        "value" => $d['value']
                    ];
                }
                array_push($dt, $params);
            }
            $data['period'] = $dt;
            $this->load->model('User_model');
            $data['all_user'] = $this->User_model->get_all_user();

            $this->load->model('Profile_model');
            $data['profile'] = $this->Profile_model->get_profile($this->uri->segment(3));
            $data['jobdes'] = $this->Jobdes_model->viewJob($jadwal['id_jadwal']);
            $data['aktivitas'] = $this->Aktivitas_model->get_all_aktivitas();

            $data['_view'] = 'aplikasi/addjob';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a jobdes
     */
    function edit($id_jobdes, $id_profile)
    {
        $jobdes = $this->Jobdes_model->get_jobdes($id_jobdes);
        $this->load->library('form_validation');

        $this->form_validation->set_rules('jobdes', 'Jobdes', 'required');
        // check if the jobdes exists before trying to delete it
        if (isset($jobdes['id_jobdes'])) {
            if ($this->form_validation->run()) {
                $params = array(
                    'jobdes' => $this->input->post('jobdes'),
                );

                $this->Jobdes_model->update_jobdes($id_jobdes, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit Jobdes</div>');
                redirect('aplikasi/addjobdes/' . $id_profile);
            } else {
                $this->load->model('User_model');
                $data['jobdes'] = $this->Jobdes_model->get_jobdes($id_jobdes);
                $data['id_profile'] = $id_profile;

                $data['_view'] = 'jobdes/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The jobdes you are trying to delete does not exist.');
    }
    public function info()
    {
        if ($this->session->userdata['level'] != 2) {
            redirect('auth/logout');
        }
        $data['job'] = $this->Jobdes_model->getJob($this->uri->segment(3));
        $data['aktivitas'] = $this->Aktivitas_model->get_all_aktivitas();
        $data['profile'] = $this->Profile_model->get_profile($this->uri->segment(3));
        $data['title'] = 'Informasi';
        $data['_view'] = 'aplikasi/info';
        $this->load->view('layouts/main', $data);
    }
    public function infoadmin()
    {
        if ($this->session->userdata['level'] != 1) {
            redirect('auth/logout');
        }
        $data['job'] = $this->Jobdes_model->getJob($this->uri->segment(3));

        $data['aktivitas'] = $this->Aktivitas_model->get_all_aktivitas();
        $data['profile'] = $this->Profile_model->get_profile($this->uri->segment(3));
        $data['title'] = 'Informasi';
        $data['_view'] = 'aplikasi/info';
        $this->load->view('layouts/main', $data);
    }

    public function selesai($idprofile)
    {
        if ($this->session->userdata['level'] != 2) {
            redirect('auth/logout');
        }
        $jadwal = $this->db->get_where('jadwal', ['id_profile' => $idprofile, 'id_user' => $this->session->userdata('id_user'), 'tanggal' => date('Y-m-d')])->row_array();

        $this->db->where('id_jadwal', $jadwal['id_jadwal']);
        $this->db->update('jadwal', ['status' => 2]);
        redirect('aplikasi');
    }

    function remove($id_jobdes, $id_profile)
    {
        if ($this->session->userdata['level'] != 2) {
            redirect('auth/logout');
        }
        $jobdes = $this->Jobdes_model->get_jobdes($id_jobdes);

        // check if the jobdes exists before trying to delete it
        if (isset($jobdes['id_jobdes'])) {
            $this->Jobdes_model->delete_jobdes($id_jobdes);
            redirect('aplikasi/addjobdes/' . $id_profile);
        } else
            show_error('The jobdes you are trying to delete does not exist.');
    }

    function add_aktivitas($id_jobdes, $id_profile)
    {
        $this->load->library('form_validation');

        // var_dump($_POST);
        // die;
        $this->form_validation->set_rules('aktivitas[]', 'Uraian', 'required');
        $this->form_validation->set_rules('period[]', 'Periode', 'required');
        $this->form_validation->set_rules('waktu[]', 'Waktu', 'required|integer');
        $this->form_validation->set_rules('frekuensi[]', 'Frekuensi', 'required|integer');

        if ($this->form_validation->run()) {

            for ($i = 0; $i < count($this->input->post('aktivitas')); $i++) {
                $rr = [
                    'uraian' => $this->input->post('aktivitas[' . $i . ']'),
                    'periode' => $this->input->post('period[' . $i . ']'),
                    'waktu' => $this->input->post('waktu[' . $i . ']'),
                    'frekuensi' => $this->input->post('frekuensi[' . $i . ']'),
                    'id_jobdes' => $id_jobdes,
                ];
                $isi = $this->Jobdes_model->add_aktivitas($rr);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Membuat Data Aktivitas Baru</div>');
            redirect('aplikasi/addjobdes/' . $id_profile);
        } else {
            $file = base_url('assets/period.json');
            $period = file_get_contents($file);
            $dataPeriod = json_decode($period, true);
            // var_dump($dataPeriod['period']);
            // die;
            $dt = array();
            foreach ($dataPeriod as $d) {
                if ($d['name'] == 'daily') {
                    $value = array();
                    foreach ($d['value']['data'] as $v) {
                        array_push($value, $v['value']);
                    }
                    $vl = array_sum($value);
                    $params = [
                        "name" => $d['name'],
                        "value" => 365 - $vl
                    ];
                } else {
                    $params = [
                        "name" => $d['name'],
                        "value" => $d['value']
                    ];
                }
                array_push($dt, $params);
            }
            $data['period'] = $dt;
            $this->load->model('Jobdes_model');
            // $data['all_jobdes'] = $this->Jobdes_model->get_all_jobdes();
                           $data['job'] = $this->Jobdes_model->get_jobdes($this->uri->segment(3));

            $data['_view'] = 'aktivitas/add';
            $this->load->view('layouts/main', $data);
        }
    }
    function edit_aktivitas($id_aktivitas,$id_profile)
    {
        // check if the aktivitas exists before trying to edit it
        $data['aktivitas'] = $this->Aktivitas_model->get_aktivitas($id_aktivitas);

        if (isset($data['aktivitas']['id_aktivitas'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('uraian', 'Uraian', 'required');
            $this->form_validation->set_rules('period', 'Period', 'required');
            $this->form_validation->set_rules('waktu', 'Waktu', 'required|integer');
            $this->form_validation->set_rules('frekuensi', 'Frekuensi', 'required|integer');


            if ($this->form_validation->run()) {
                $params = array(
                    'uraian' => $this->input->post('uraian'),
                    'periode' => $this->input->post('period'),
                    'waktu' => $this->input->post('waktu'),
                    'frekuensi' => $this->input->post('frekuensi'),
                );

                $this->Aktivitas_model->update_aktivitas($id_aktivitas, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit Aktivitas</div>');
                redirect('aplikasi/addjobdes/'.$id_profile);
            } else {
                $file = base_url('assets/period.json');
            $period = file_get_contents($file);
            $dataPeriod = json_decode($period, true);
            $dt = array();
            foreach ($dataPeriod as $d) {
                if ($d['name'] == 'daily') {
                    $value = array();
                    foreach ($d['value']['data'] as $v) {
                        array_push($value, $v['value']);
                    }
                    $vl = array_sum($value);
                    $params = [
                        "name" => $d['name'],
                        "value" => 365 - $vl
                    ];
                } else {
                    $params = [
                        "name" => $d['name'],
                        "value" => $d['value']
                    ];
                }
                array_push($dt, $params);
            }
            $data['period'] = $dt;
                $this->load->model('Jobdes_model');
                $data['all_jobdes'] = $this->Jobdes_model->get_all_jobdes();

                $data['_view'] = 'aktivitas/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The aktivitas you are trying to edit does not exist.');
    }
    public function pdf()
    {
        echo "Print geh";
    }
}
