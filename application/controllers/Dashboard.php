<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Dashboard_model', 'model');
        $this->load->model('identitas_desa_model');
        $this->load->helper(array('url', 'file'));
        $this->load->helper('check_login_helper');
        check_login($this->session);
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'backend/desa/dashboard';

        $this->load->view('layouts/master', $data);
    }

    public function get_master_data(){
        echo json_encode(array(
            'goldar'    => $this->model->get_goldar(),
            'pekerjaan' => $this->model->get_pekerjaan(),
            'agama'     => $this->model->get_agama(),
            'status_menikah'   => $this->model->get_status_menikah(),
            'negara'   => $this->model->get_negara(),
        ));
    }
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
