<?php
/**
 * @group model
 */

class Manajemen_pengguna_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('Super/Manajemen_pengguna_model', 'manajemen_pengguna_model');
        $this->obj = $this->CI->manajemen_pengguna_model;
    }

    public function test_UserChangePasswordThenPasswordChanged()
    {
        $user_id = 1;
        $user_password = 'testchangepassword';

        $this->obj->ubah_password($user_id, $user_password);

        $data = $this->CI->db->select('user_password')
                            ->from('ref_user')
                            ->where('user_id', $user_id)
                            ->get()
                            ->row();

        $this->assertTrue(password_verify($user_password, $data->user_password));
    }

    public function test_UserResetPasswordThenPasswordReseted()
    {
        $user_id = 1;

        $this->obj->reset_password($user_id);

        $data = $this->CI->db->select('user_password')
                            ->from('ref_user')
                            ->where('user_id', $user_id)
                            ->get()
                            ->row();

        $this->assertTrue(password_verify(DEFAULT_USER_PASS, $data->user_password));
    }

    public static function tearDownAfterClass()
    {
        $CI =& get_instance();
        $user_id = 1;
        $data = array(
            'user_password' => password_hash('singmainmain', PASSWORD_DEFAULT)
        );

        $CI->db->where('user_id', $user_id)
            ->update('ref_user', $data);
    }
}
