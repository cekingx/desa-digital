<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_login($session)
{
    if(empty($session->userdata('user_id'))) {
        redirect('login');
    }
}

function redirect_to_login()
{
    echo 'Oke';
}