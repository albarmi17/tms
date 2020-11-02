<?php


class Aktivitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['level'] != 1) {
            redirect('auth/logout');
        }
        $this->load->model('Aktivitas_model');
    }

    /*
     * Listing of aktivitas
     */
    function index()
    {
        $data['aktivitas'] = $this->Aktivitas_model->get_all_aktivitas();

        $data['_view'] = 'aktivitas/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new aktivitas
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('uraian', 'Uraian', 'required');
        $this->form_validation->set_rules('periode', 'Periode', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required|integer');
        $this->form_validation->set_rules('frekuensi', 'Frekuensi', 'required|integer');
        $this->form_validation->set_rules('id_jobdes', 'Id Jobdes', 'required');

        if ($this->form_validation->run()) {
            // var_dump($this->input->post('periode'));
            // die;
            $params = array(
                'id_jobdes' => $this->input->post('id_jobdes'),
                'uraian' => $this->input->post('uraian'),
                'periode' => $this->input->post('periode'),
                'waktu' => $this->input->post('waktu'),
                'frekuensi' => $this->input->post('frekuensi'),
            );

            $aktivitas_id = $this->Aktivitas_model->add_aktivitas($params);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Membuat Data Aktivitas Baru</div>');
            redirect('aktivitas/index');
        } else {
            $this->load->model('Jobdes_model');
            $data['all_jobdes'] = $this->Jobdes_model->get_all_jobdes();
            $data['jobdes'] = $this->Jobdes_model->viewJob($jadwal['id_jadwal']);
            $data['_view'] = 'aktivitas/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a aktivitas*/
    function edit($id_aktivitas)
    {
        // check if the aktivitas exists before trying to edit it
        $data['aktivitas'] = $this->Aktivitas_model->get_aktivitas($id_aktivitas);

        if (isset($data['aktivitas']['id_aktivitas'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('uraian', 'Uraian', 'required');
            $this->form_validation->set_rules('periode', 'Periode', 'required');
            $this->form_validation->set_rules('waktu', 'Waktu', 'required|integer');
            $this->form_validation->set_rules('frekuensi', 'Frekuensi', 'required|integer');
            $this->form_validation->set_rules('id_jobdes', 'Id Jobdes', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_jobdes' => $this->input->post('id_jobdes'),
                    'uraian' => $this->input->post('uraian'),
                    'periode' => $this->input->post('periode'),
                    'waktu' => $this->input->post('waktu'),
                    'frekuensi' => $this->input->post('frekuensi'),
                );

                $this->Aktivitas_model->update_aktivitas($id_aktivitas, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit Aktivitas</div>');
                redirect('aktivitas/index');
            } else {
                $this->load->model('Jobdes_model');
                $data['all_jobdes'] = $this->Jobdes_model->get_all_jobdes();

                $data['_view'] = 'aktivitas/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The aktivitas you are trying to edit does not exist.');
    }

    /*
     * Deleting aktivitas
     */
    function remove($id_aktivitas)
    {
        $aktivitas = $this->Aktivitas_model->get_aktivitas($id_aktivitas);

        // check if the aktivitas exists before trying to delete it
        if (isset($aktivitas['id_aktivitas'])) {
            $this->Aktivitas_model->delete_aktivitas($id_aktivitas);
            redirect('aktivitas/index');
        } else
            show_error('The aktivitas you are trying to delete does not exist.');
    }
}
