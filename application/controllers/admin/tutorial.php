<?php

class  Tutorial extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('tutorial_m');
    }
    
    public function index() {
        $this->data['tutorials'] = $this->tutorial_m->get();
        $this->data['subview'] = 'admin/tutorial/index';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function edit($id = NULL) {
        
        if($id) {
            $this->data['tutorial'] = $this->tutorial_m->get($id);
            count($this->data['tutorial']) || $this->data['errors'] = 'tutorial could not be found.';
        }
        else {
            $this->data['tutorial'] = $this->tutorial_m->get_new();
        }
        
        
        $rules = $this->tutorial_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $data = $this->tutorial_m->array_from_post(array('title', 'slug', 'category', 'set', 'tags' , 'body', 'pubdate'));
            $this->tutorial_m->save($data, $id);
            redirect('admin/tutorial');
        }
        $this->data['subview'] = 'admin/tutorial/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function delete($id) {
        $this->tutorial_m->delete($id);
        redirect('admin/tutorial');
    }
}
