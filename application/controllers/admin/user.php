<?php

class User extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        // Fetch all users
        $this->data['users'] = $this->user_m->get();
        // Load view
        $this->data['subview'] = 'admin/user/index';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function edit($id = NULL) {
        // Fetch a user or set a new one
        if($id) {
            $this->data['user'] = $this->user_m->get($id);
            count($this->data['user']) || $this->data['errors'] = 'user could not be found.';
        }
        else {
            $this->data['user'] = $this->user_m->get_new();
        }
        // Set up the form
        $rules = $this->user_m->rules_admin;
        $this->form_validation->set_rules($rules);
        $id || $rules['password']['rules'] .= '|required';
        // Process the form
        if ($this->form_validation->run() == TRUE) {
            $data = $this->user_m->array_from_post(array('name', 'email', 'password'));
            $data['password'] = $this->user_m->hash($data['password']);
            $this->user_m->save($data, $id);
            redirect('admin/user');
        }
        // Load the view
        $this->data['subview'] = 'admin/user/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function _unique_email() {
        
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $user = $this->user_m->get();
        if (count($user)) {
            $this->form_validation->set_message('_unique_email', '%s should be unique');
            return FALSE;
        }
        return TRUE;
    }
    
    public function delete($id) {
        $this->user_m->delete($id);
        redirect('admin/user');
    }
    
    public function login() {
        
        // Redirect a user if he's already logged in
        $dashboard = 'admin/dashboard';
        $this->user_m->loggedin() == FALSE || redirect($dashboard);
        
        // Set form
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        // Process form
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
            $this->load->helper('security');
            $data['email'] = xss_clean($this->input->post('email'));
            $data['password'] = xss_clean($this->input->post('password'));
            $this->user_m->login($data);
            if ($this->user_m->loggedin() == TRUE) {
                redirect($dashboard);
            }
            else {
                $this->session->set_flashdata('error', 'The user password combination does not exist.');
                redirect('admin/user/login', 'refresh');
           }
        }
        
        // Load view
        $this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);
    }
    
    public function logout() {
        $this->user_m->logout();
        redirect('admin/user/login');
    }
}
