<?php
ini_set('mysql.connect_timeout', 15000);
ini_set('default_socket_timeout', 15000);
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function get_goldar(){
        $this->db->select('*');
        return $this->db->get('ref_goldar')->result();
    }
    
    function get_agama(){
        $this->db->select('*');
        return $this->db->get('ref_agama')->result();
    }

    function get_pekerjaan(){
        $this->db->select('*');
        return $this->db->get('ref_pekerjaan')->result();
    }

    function get_status_menikah(){
        $this->db->select('*');
        return $this->db->get('ref_status_menikah')->result();
    }

    function get_negara(){
        $this->db->select('*');
        return $this->db->get('ref_negara')->result();
    }

}