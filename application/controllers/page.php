<?php

class Page extends Frontend_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function home() {
        $this->load->view('templates/homepage', $this->data);
    }

    public function index()
    {
        
        $this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
        count($this->data['page']) || show_404(current_url());
        
        add_meta_title($this->data['page']->title);
//        if($this->data['page']->template == 'homepage') {
//            $this->home();
//            return;
//        }
        $method = '_'.$this->data['page']->template;
        //echo '<br><br><br><br><br><br><br><br>'.$method;
        if(method_exists($this, $method)) {
            $this->$method();
        }
        else {
            log_message('error', 'Could not load template '.$method.' in file '.__FILE__.' at line '.__LINE__);
            show_error('Could not load template '.$method);
        }
        $this->data['subview'] = $this->data['page']->template;
        $this->load->view('_layout_main', $this->data);
        
    }
    
    
    private function _page() {
        $this->data['recent_blog'] = $this->article_m->get_recent();
    }
    
    function _homepage() {
        $this->article_m->set_published();
    	$this->db->limit(6);
    	$this->data['articles'] = $this->article_m->get();
        for($i = 0; $i < count($this->data['articles']); $i++) {
            $this->data['articles'][$i]->modified = $this->getTime($this->data['articles'][$i]->modified);
        }
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
    
    
}
