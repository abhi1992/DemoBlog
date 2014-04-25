<?php

class Article_m extends My_Model {
    
    protected $_table_name = 'articles';
    protected $_order_by = 'pubdate desc, id desc';
    protected $_timestamp = TRUE;
    public $rules = array(
        'pubdate' => array('field' => 'pubdate',
                         'label' => 'Publication Date',
                         'rules' => 'trim|required|exact_length[10]|xss_clean'),
        'title' => array('field' => 'title',
                         'label' => 'Title',
                         'rules' => 'trim|required|max_length[100]|xss_clean'),
        'slug' => array('field' => 'slug',
                         'label' => 'Slug',
                         'rules' => 'trim|required|max_length[100]|url_title|xss_clean'),
        'body' => array('field' => 'body',
                         'label' => 'Body',
                         'rules' => 'trim|required'),
    );

    public function get_new() {
//        $this->load->helper('date');
        $article = new stdClass();
        $article->title = '';
        $article->slug = '';
        $article->body = '';
        $article->pubdate = date('Y-m-d');
//        $article->modified = time();
        return $article;
    }
    
    public function set_published(){
        $this->db->where('pubdate <= ', date('Y-m-d'));
    }

    public function get_recent($limit = 3){

        // Fetch a limited number of recent articles
        $limit = (int) $limit;
        $this->set_published();
        $q = $this->db->query('select title, slug from articles where `pubdate` < ? limit '.$limit.';', array(date('Y-m-d')));
        return $q->result();
    }
    
    public function get_title($id, $table='articles', $recent=TRUE) {
        if($recent) {
            $q = $this->db->query('select title from '.$table.' where id = ?;', $id);
        }
        else {
            $q = $this->db->query('select title from '.$table.' where id = ?;', $id);
        }
        return $q->row();
    }
    
    public function get_article($id) {
        $q = $this->db->query(
                'select `id`, `title`, `pubdate`, `slug`, `body`, `tags`, `modified` from `articles` where `id` = ?&& `pubdate` < ?;'
                , array($id, date('Y-m-d')));
        return $q->row();
    }


    public function get_count($tag) {
        
        $q = $this->db->query('select count(id) as c from '. 
                $this->_table_name.' where `tags` like ? and `pubdate` <= ?;', 
                array($tag, date('Y-m-d')));
        return $q->row();
    }
    
    public function get_comments($id = NULL) {
        $this->db->select('comments.*');
        $this->db->where('blog_id',$id);
        $this->db->where('verify',1);
        $this->db->order_by('comment_id, reply, pubdate, id');
        
        $query = $this->db->get('comments');
        $result = $query->result_array();
        return $result;
    }
}
