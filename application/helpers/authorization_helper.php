<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_user_role($object)
{
    return $object->session->userdata('user_role_id');
}

function block_desa($object)
{
    if(check_user_role($object) == 2) {
        redirect('unauthorized');
    }
}

function block_capil($object)
{
    if(check_user_role($object) == 3) {
        redirect('unauthorized');
    }
}