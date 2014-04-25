<?php

class  Page extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('page_m');
    }
    
    public function index() {
        $this->data['pages'] = $this->page_m->get_with_parent();
        $this->data['subview'] = 'admin/page/index';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function order ()
    {
        $this->data['sortable'] = TRUE;
        $this->data['subview'] = 'admin/page/order';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function edit($id = NULL) {
        
        if($id) {
            $this->data['page'] = $this->page_m->get($id);
            count($this->data['page']) || $this->data['errors'] = 'page could not be found.';
        }
        else {
            $this->data['page'] = $this->page_m->get_new();
        }
        
        $this->data['pages_no_parent'] = $this->page_m->get_no_parents();
        
        $rules = $this->page_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $data = $this->page_m->array_from_post(array('title', 'slug', 'body', 'template', 'parent_id'));
            $this->page_m->save($data, $id);
            redirect('admin/page');
        }
        $this->data['subview'] = 'admin/page/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function _unique_slug() {
        // Do NOT validate if slug already exists
        // UNLESS it's the slug for the current page
        $id = $this->uri->segment(4);
        $this->db->where('slug', $this->input->post('slug'));
        !$id || $this->db->where('id !=', $id);
        $page = $this->page_m->get();
        if (count($page)) {
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }
        return TRUE;
    }
    
    public function delete($id) {
        $this->page_m->delete($id);
        redirect('admin/page');
    }
}
