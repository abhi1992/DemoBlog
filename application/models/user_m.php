<?php
class User_m extends My_Model
{
    
    protected $_table_name = 'users';
    protected $_order_by = 'name';
    public $rules = array(
        'email' => array('field' => 'email',
                         'label' => 'Email',
                         'rules' => 'trim|required|valid_email|xss_clean'),
        'password' => array('field' => 'password',
                            'label' => 'Password',
                            'rules' => 'trim|required')
    );
    public $rules_admin = array(
        'email' => array('field' => 'email',
                         'label' => 'Email',
                         'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'),
        'name' => array('field' => 'name',
                         'label' => 'Name',
                         'rules' => 'trim|required|xss_clean'),
        'password' => array('field' => 'password',
                            'label' => 'Password',
                            'rules' => 'trim|matches[password_confirm]'),
        'password_confirm' => array('field' => 'password_confirm',
                            'label' => 'Password Confirm',
                            'rules' => 'trim|matches[password]')
    );
    protected $_timestamp = FALSE;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login($data1) {
        $user = $this->get_by(array('email' => $data1['email'],
            'password' => $this->hash($data1['password'])), TRUE);
        if (count($user)) {
            // Log in user
            $data = array('name' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => TRUE,
                'type' => $user->type
            );
            $this->session->set_userdata($data);
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
    }
    
    public function loggedin() {
        return (bool) $this->session->userdata('loggedin') && $this->session->userdata('type') == 2 ? TRUE : FALSE;
    }
    
    public function hash($string) {
        return hash('sha512', $string . config_item('encrption_key'));
    }
    
    public function get_new() {
        $user = new stdClass();
        $user->name = '';
        $user->email = '';
        $user->password = '';
        $user->type = 0;
        return $user;
    }
}
 