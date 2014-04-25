<?php

class Api extends Frontend_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('article_m');
        $this->load->model('comments_m');
    }
    
//    public function base($param) {
//        $request = $_SERVER['REQUEST_METHOD'];
//        if ( preg_match( "/^(?=.*[a-zA-Z])(?=.*[0-9])/", $param ) ) {
//           $id = $param;
//       } else {
//           $id = null;
//       }
//        switch( strtoupper( $request ) ) {
//            case 'GET':
//                $method = 'read';
//                break;
//            case 'POST':
//                $method = 'save';
//                break;
//            case 'PUT':
//                $method = 'update';
//                break;
//            case 'DELETE':
//                $method = 'remove';
//                break;
//            case 'OPTIONS':
//                $method = '_options';
//                break;
//        }
//        $this->$method( $id );
//    }
//    
//    public function read($id=NULL) {
//            $this->article_m->set_published();
//            $this->data['article'] = $this->article_m->get($id, TRUE);
//            $this->load->helper('date');
//            $this->data['article']->modified = $this->getTime($this->data['article']->modified);
//            $this->output->set_content_type( 'application/json' );
//            $this->output->set_output( json_encode( $this->data['article'] ) );
//    }
    
    public function blog() {
        $this->data['recent_blog'] = $this->article_m->get_recent();
        // Count all articles
        $this->article_m->set_published();
        $count = $this->db->count_all_results('articles');
        $perPage = 4;
        
        //Set Pagination
        if ($count > $perPage) {
            $this->load->library('pagination');
            
            $config['base_url'] = site_url($this->uri->segment(1));
            $config['total_rows'] = $count;
            $config['per_page'] = $perPage;
            $config['uri_segment'] = 2;
            
            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(2);
        }
        else {
            $this->data['pagination'] = '';
            $offset = 0;
        }
        //Fetch articles
        $this->article_m->set_published();
        $this->db->limit($perPage, $offset);
        $this->data['articles'] = $this->article_m->get();
        $this->load->helper('date');
        
        for($i = 0; $i < count($this->data['articles']); $i++) {
            $this->data['articles'][$i]->modified = $this->getTime($this->data['articles'][$i]->modified);
        }
    }

    public function index($id)
    {
        $this->article_m->set_published();
        $this->data['article'] = $this->article_m->get($id, TRUE);
        $this->load->helper('date');
        $this->data['article']->modified = $this->getTime($this->data['article']->modified);
        $this->data['comments'] = $this->article_m->get_comments($this->data['article']->id);
        for($i = 0; $i <count($this->data['comments']); $i++):
        $this->data['comments'][$i]['pubdate'] = $this->getTime($this->data['comments'][$i]['pubdate']);
//        dump($this->data['comments']);
        endfor;
        $this->load->view('api', $this->data);
    }
    
    public function blog1() {
        $this->_blog();
        $this->load->view('apiBlog', $this->data);
    }
    
    
    private function _blog() {
        $this->data['recent_blog'] = $this->article_m->get_recent();
        // Count all articles
        $this->article_m->set_published();
        $count = $this->db->count_all_results('articles');
        $perPage = 4;
        
        //Set Pagination
        if ($count > $perPage) {
            $this->load->library('pagination');
            
            $config['base_url'] = site_url('/article/no');
            $config['total_rows'] = $count;
            $config['per_page'] = $perPage;
            $config['uri_segment'] = 3;
            
            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(3);
        }
        else {
            $this->data['pagination'] = '';
            $offset = 0;
        }
        //Fetch articles
        $this->article_m->set_published();
        $this->db->limit($perPage, $offset);
        $this->data['articles'] = $this->article_m->get();
        $this->load->helper('date');
        for($i = 0; $i < count($this->data['articles']); $i++) {
            $this->data['articles'][$i]->modified = $this->getTime($this->data['articles'][$i]->modified);
        }
    }
    
    
}
