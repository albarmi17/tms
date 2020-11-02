<?php
 
class Auth extends CI_Controller{

    function index()
    {

    	if ($this->session->userdata('username')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
        	$this->_login();
        } else {
        	$data['title'] = 'Login';
        	$this->load->view('auth/login',$data);
        }
    }


	public function _login()
	    	{
	    	$username = $this->input->post('username');
    	    $password = $this->input->post('password');

        $user  = $this->db->get_where ('user', ['username'=> $username]) ->row_array();
        	if ($username) {

        		 if (md5($password)  == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level'],
                        'id_user' => $user['id_user']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['level'] == 1) {
                        redirect('dashboard');
                    } else {
                        redirect('aplikasi');
                    }
                }
                    else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password Anda Salah!</div>');
                    redirect('auth');
        	} 
        }
	    	 	}
	    	 	function logout()
			{
				$this->session->unset_userdata('username');
				$this->session->unset_userdata('level');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Logout</div>');
				redirect('auth');
			}
}

