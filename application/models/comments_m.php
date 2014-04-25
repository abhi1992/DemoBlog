<?php

class Comments_m extends My_Model {
    
    protected $_table_name = 'comments';
    protected $_order_by = 'reply desc';
    protected $_timestamp = FALSE;
    public $rules = array(
        'pubdate' => array('field' => 'pubdate',
                         'label' => 'Publication Date',
                         'rules' => 'trim|xss_clean'),
        'nick' => array('field' => 'nick',
                         'label' => 'nick',
                         'rules' => 'trim|max_length[100]|xss_clean'),
        'blog_id' => array('field' => 'blog_id',
                         'label' => 'blog_id',
                         'rules' => 'trim|max_length[20]|xss_clean'),
        'comment' => array('field' => 'comment',
                         'label' => 'Comment',
                         'rules' => 'trim|required|xss_clean'),
    );

    function unique() {
        return TRUE;
    }
    
    public function get_new() {
        $comment = new stdClass();
        $comment->nick = '';
        $comment->blog_id = 0;
        $comment->comment = '';
        $comment->pubdate = '';
        return $comment;
    }

    public function get_id() {
        $this->db->select('comments.id');
        $this->db->limit(1);
        $this->db->order_by('id desc');
        $query = $this->db->get('comments');
        return $query->row();
    }
    
    public function verify($id, $b) {
        if($b == 0)
        $this->db->query('update comments set `verify` = 0 where `id` = ? limit 1;', array($id));
        elseif($b == 1)
            $this->db->query('update comments set `verify` = 1 where `id` = ? limit 1;', array($id));
    }
    
    public function get_recent($limit = 3) {

        // Fetch a limited number of recent comments
        $limit = (int) $limit;
        $this->db->limit($limit);
        return parent::get();
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
