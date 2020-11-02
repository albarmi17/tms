<?php


class Jobdes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['level'] != 1) {
            redirect('auth/logout');
        }
        $this->load->model('Jobdes_model');
    }

    /*
     * Listing of jobdes
     */
    function index()
    {
        $data['jobdes'] = $this->Jobdes_model->all_jobdes();

        $data['_view'] = 'jobdes/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new jobdes
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('jobdes', 'Jobdes', 'required');
        $this->form_validation->set_rules('id_user', 'Id User', 'required');
        $this->form_validation->set_rules('id_profile', 'Id Profile', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'id_user' => $this->input->post('id_user'),
                'id_profile' => $this->input->post('id_profile'),
                'jobdes' => $this->input->post('jobdes'),
            );

            $jobdes_id = $this->Jobdes_model->add_jobdes($params);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Membuat Jobdes Baru</div>');
            redirect('jobdes/index');
        } else {
            $this->load->model('User_model');
            $data['all_user'] = $this->User_model->get_all_user();

            $this->load->model('Profile_model');
            $data['all_profile'] = $this->Profile_model->get_all_profile();

            $data['_view'] = 'jobdes/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a jobdes
     */
    function edit($id_jobdes)
    {
        // check if the jobdes exists before trying to edit it
        $data['jobdes'] = $this->Jobdes_model->get_jobdes($id_jobdes);

        if (isset($data['jobdes']['id_jobdes'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('jobdes', 'Jobdes', 'required');
            $this->form_validation->set_rules('id_user', 'Id User', 'required');
            $this->form_validation->set_rules('id_profile', 'Id Profile', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_user' => $this->input->post('id_user'),
                    'id_profile' => $this->input->post('id_profile'),
                    'jobdes' => $this->input->post('jobdes'),
                );

                $this->Jobdes_model->update_jobdes($id_jobdes, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit Jobdes</div>');
                redirect('jobdes/index');
            } else {
                $this->load->model('User_model');
                $data['all_user'] = $this->User_model->get_all_user();

                $this->load->model('Profile_model');
                $data['all_profile'] = $this->Profile_model->get_all_profile();

                $data['_view'] = 'jobdes/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The jobdes you are trying to edit does not exist.');
    }

    /*
     * Deleting jobdes
     */
    function remove($id_jobdes)
    {
        $jobdes = $this->Jobdes_model->get_jobdes($id_jobdes);

        // check if the jobdes exists before trying to delete it
        if (isset($jobdes['id_jobdes'])) {
            $this->Jobdes_model->delete_jobdes($id_jobdes);
            redirect('jobdes/index');
        } else
            show_error('The jobdes you are trying to delete does not exist.');
    }
}
