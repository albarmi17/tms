<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Jadwal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function seleksi($id_profile, $id_user, $tanggal)
    {
        return $this->db->get_where('jadwal', array('id_profile' => $id_profile, 'tanggal' => $tanggal, 'id_user' => $id_user))->row_array();
    }

    function get_jadwal($id_jadwal)
    {
        return $this->db->get_where('jadwal', array('id_jadwal' => $id_jadwal))->row_array();
    }


    function get_all_jadwal()
    {
        $this->db->order_by('id_jadwal', 'desc');
        return $this->db->get('jadwal')->result_array();
    }


    function add_jadwal($params)
    {
        $this->db->insert('jadwal', $params);
        return $this->db->insert_id();
    }


    function update_jadwal($id_jadwal, $params)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        return $this->db->update('jadwal', $params);
    }


    function delete_jadwal($id_jadwal)
    {
        return $this->db->delete('jadwal', array('id_jadwal' => $id_jadwal));
    }
    function all_jadwal_join()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('profile', 'profile.id_profile = jadwal.id_profile');
        $this->db->join('user', 'user.id_user = jadwal.id_user');
        return $this->db->get()->result_array();
    }
}
