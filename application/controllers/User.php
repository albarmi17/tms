<?php


class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['level'] != 1) {
            redirect('auth/logout');
        }
        $this->load->model('User_model');
    }

    /*
     * Listing of user
     */
    function index()
    {
        $data['user'] = $this->User_model->get_all_user();

        $data['_view'] = 'user/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new user
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run()) {

            $params = array(
                'level' => $this->input->post('level'),
                'password' => md5($this->input->post('password')),
                'username' => $this->input->post('username'),
            );
            $user_id = $this->User_model->add_user($params);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menambahkan User Baru</div>');
            redirect('user/index');
        } else {
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a user
     */
    function edit($id_user)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id_user);

        if (isset($data['user']['id_user'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('level', 'Level', 'required');
            if ($this->input->post('password')) {
                $pas = md5($this->input->post('password'));
            } else {
                $pas = $data['user']['password'];
            }
            if ($this->form_validation->run()) {
                $params = array(
                    'level' => $this->input->post('level'),
                    'password' => $pas,
                    'username' => $this->input->post('username'),
                );

                if ($this->db->get_where('user', ['id_user !=' => $id_user,'username' => $this->input->post('username')])->row_array()) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data telah ada</div>'); 
                redirect('user/index');
                              
                } else {
                $this->User_model->update_user($id_user, $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit User</div>');
                redirect('user/index');
                }
            
            } else {
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main', $data);
                } 
        } else
            show_error('The user you are trying to edit does not exist.');
    }

    /*
     * Deleting user
     */
    function remove($id_user)
    {
        $user = $this->User_model->get_user($id_user);

        // check if the user exists before trying to delete it
        if (isset($user['id_user'])) {
            $this->User_model->delete_user($id_user);
            redirect('user/index');
        } else
            show_error('The user you are trying to delete does not exist.');
    }
}
