<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Debug extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo json_encode(array(
            'post' => $_POST,
            'session' => $_SESSION,
            'files' => $_FILES
        ));
    }
}