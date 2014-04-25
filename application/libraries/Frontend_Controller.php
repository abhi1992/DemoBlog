<?php
class Frontend_Controller extends My_Controller
{
    
    public function __construct() 
    {
        parent::__construct();
        
        // Load stuff
        $this->load->model('page_m');
        $this->load->model('article_m');
        $this->load->library('session');
        // Fetch navigation
        $this->data['menu'] = $this->page_m->get_nested();
        $this->data['archive_lnk'] = $this->page_m->get_archive_link();
        $this->data['meta_title'] = config_item('site_name');
    }
}
