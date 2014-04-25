<?php
class Article extends Frontend_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('comments_m');
    }

    public function index($id, $slug) {
//        else {
            // Fetch the article
            $this->data['recent_blog'] = $this->article_m->get_recent();
            $this->article_m->set_published();
            $this->data['article'] = $this->article_m->get_article($id);
            
            
            // Return 404 if not found
            count($this->data['article']) || show_404(uri_string());

            // Redirect if slug was incorrect

            $requested_slug = $this->uri->segment(3);
            $set_slug = $this->data['article']->slug;
            if ($requested_slug != $set_slug) {
                redirect('blog/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
            }
            
            add_meta_title($this->data['article']->title);
            $this->data['subview'] = 'article';
            $this->load->helper('date');
            $this->data['modified'] = $this->getTime($this->data['article']->modified);
//        }
            $this->load->view('_layout_main', $this->data);
            
            //$this->load->view('templates/d',$data);
    }
    
    public function get_by_tag($tag) {
        
        // Count all articles
        $this->article_m->set_published();
        $this->data['article'] = NULL;
        $da = $this->article_m->get_count('%#'.$tag.'#%');
        $count = (int) $da->c;
        $perPage = 4;
        
        //Set Pagination
        if ($count > $perPage) {
            $this->load->library('pagination');
            
            $config['base_url'] = site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/'. $this->uri->segment(3));
            $config['total_rows'] = $count;
            $config['per_page'] = $perPage;
            $config['uri_segment'] = 4;
            
            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(4);
        }
        else {
            $this->data['pagination'] = '';
            $offset = 0;
        }
        //Fetch articles
//        $this->article_m->set_published();
        $this->db->limit($perPage, $offset);
        $this->db->where('`tags` like \'%#'.$tag.'#%\'');
        $this->data['articles'] = $this->article_m->get();
        $this->load->helper('date');
        for($i = 0; $i < count($this->data['articles']); $i++) {
            $this->data['articles'][$i]->modified = $this->getTime($this->data['articles'][$i]->modified);
        }
        $this->data['recent_blog'] = $this->article_m->get_recent();
        $this->data['subview'] = 'blog';
        $this->load->view('_layout_main', $this->data);
        
    }
    
}