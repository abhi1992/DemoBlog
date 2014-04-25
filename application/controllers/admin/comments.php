<?php

class  Comments extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('comments_m');
    }
    
    public function index() {
        $this->data['comments'] = $this->comments_m->get();
        $this->data['subview'] = 'admin/comments/index';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function verify() {
        $this->load->helper('security');
        $b = xss_clean($this->input->post('verify'));
//        echo $b.'<br>';
        $id = xss_clean($this->input->post('id'));
//        echo $id;
        if($b == 1 || $b == 0) {
            $this->comments_m->verify($id, $b);
//            dump($this->comments_m->get($id, TRUE));
        }
        redirect('admin/comments/index');
    }
    
    public function edit($id = NULL) {
        
        if($id) {
            $this->data['comments'] = $this->comments_m->get($id);
            count($this->data['comments']) || $this->data['errors'] = 'comments could not be found.';
        }
        else {
            $this->data['comments'] = $this->comments_m->get_new();
        }
        
        
        $rules = $this->comments_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $data = $this->comments_m->array_from_post(array('pubdate', 'nick', 'blog_id', 'reply', 'verify', 'comment'));
            $this->comments_m->save($data, $id);
            redirect('admin/comments');
        }
        $this->data['subview'] = 'admin/comments/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function delete($id) {
        $this->comments_m->delete($id);
        redirect('admin/comments');
    }
}
