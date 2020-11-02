<?php

 
class Profile extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['level'] != 1) {
            redirect('auth/logout');
        }
        $this->load->model('Profile_model');
    } 

    /*
     * Listing of profile
     */
    function index()
    {
        $data['profile'] = $this->Profile_model->get_all_profile();
        
        $data['_view'] = 'profile/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new profile
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nama_karyawan','Nama Karyawan','required|is_unique[profile.nama_karyawan]');
		$this->form_validation->set_rules('departemen_karyawan','Departemen Karyawan','required');
		$this->form_validation->set_rules('posisi_karyawan','Posisi Karyawan','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nama_karyawan' => $this->input->post('nama_karyawan'),
				'departemen_karyawan' => $this->input->post('departemen_karyawan'),
				'posisi_karyawan' => $this->input->post('posisi_karyawan'),
            );
            
            $profile_id = $this->Profile_model->add_profile($params);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Membuat Data Karyawan Baru</div>');
            redirect('profile/index');
        }
        else
        {            
            $data['_view'] = 'profile/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a profile
     */
    function edit($id_profile)
    {   
        // check if the profile exists before trying to edit it
        $data['profile'] = $this->Profile_model->get_profile($id_profile);
        
        if(isset($data['profile']['id_profile']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama_karyawan','Nama Karyawan','required');
			$this->form_validation->set_rules('departemen_karyawan','Departemen Karyawan','required');
			$this->form_validation->set_rules('posisi_karyawan','Posisi Karyawan','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nama_karyawan' => $this->input->post('nama_karyawan'),
					'departemen_karyawan' => $this->input->post('departemen_karyawan'),
					'posisi_karyawan' => $this->input->post('posisi_karyawan'),
                );
                if ($this->db->get_where('profile', ['id_profile !=' => $id_profile,'nama_karyawan' => $this->input->post('nama_karyawan')])->row_array()) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data telah ada</div>'); 
                redirect('profile/index');
                              
                } else {
                $this->Profile_model->update_profile($id_profile,$params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit Profile Karyawan</div>');             
                redirect('profile/index');  
                }
            }
            else
            {
                $data['_view'] = 'profile/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The profile you are trying to edit does not exist.');
    } 

    /*
     * Deleting profile
     */
    function remove($id_profile)
    {
        $profile = $this->Profile_model->get_profile($id_profile);

        // check if the profile exists before trying to delete it
        if(isset($profile['id_profile']))
        {
            $this->Profile_model->delete_profile($id_profile);
            redirect('profile/index');
        }
        else
            show_error('The profile you are trying to delete does not exist.');
    }
    
}
