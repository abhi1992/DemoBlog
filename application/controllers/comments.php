<?php
class Comments extends Frontend_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('comments_m');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        
    }
    
    public function index($id = NULL) {
//        dump($this->input->post('nick'));
//        if(!$this->input->is_ajax_request()) {
//            exit('No direct script access allowed');
//        }
//        else {
        
//            echo 'ddggndgfdh';
            
            $this->data['comments'] = $this->comments_m->get_new();
            //echo '$data';
            $rules = $this->comments_m->rules;
            $this->form_validation->set_rules($rules);
            
            if ($this->form_validation->run() == TRUE) {
                $this->load->helper('security');
                $comments['comment'] = xss_clean($this->input->post('comment'));
                $comments['nick'] = xss_clean($this->input->post('nick'));
                $comments['reply'] = xss_clean($this->input->post('reply'));
                if($this->input->post('reply') == 1) {
                    $cid = xss_clean($this->input->post('comment_id'));
                    
                }
                else {
                    $cid = $this->comments_m->get_id();
//                    dump($cid);
//                    die();
                    $cid = isset($cid->id) ? $cid->id:1;
                    
                }
                $comments['comment_id'] = $cid;
                $comments['blog_id'] = xss_clean($id);
                $this->load->helper('date');
                $comments['pubdate'] = time();
                $this->comments_m->save($comments);
            }
            else {
                echo validation_errors();
            }
        
        redirect(site_url('/article'.'/'.$id));
        }
//    }
      
    public function post_comment1() {
        
    }
    public function get_comments($page, $slug) {
        if(!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        else {
            if($slug) {
                $this->load->helper('security');
                $slug = xss_clean($slug);
                $page = xss_clean($page);
                $result = $this->comments_m->get_comments($page, $slug);
                $this->load->helper('date');
                for($i = 0; $i < count($result); $i++) {
                    $result[$i]['pubdate'] = $this->getTime($result[$i]['pubdate']);
                }
                echo json_encode($result);
            }
        }
    }
    
}