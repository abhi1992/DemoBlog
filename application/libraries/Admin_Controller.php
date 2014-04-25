<?php
class Admin_Controller extends My_Controller
{
    
    public function __construct() 
    {
        parent::__construct();
        $this->data['meta_title'] = 'CMS';
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('user_m');
        
        $exception_urls = array('admin/user/login', 'admin/user/logout');
        
        if (in_array(uri_string(), $exception_urls) == FALSE) {
            if($this->user_m->loggedin() == FALSE) {
                redirect('admin/user/login');
            }
            
        }
        
    }
    
    protected function getTime($seconds = 1, $time = '') {

        if ( ! is_numeric($seconds))
        {
                $seconds = 1;
        }

        if ( ! is_numeric($time))
        {
                $time = time();
        }

        if ($time <= $seconds)
        {
                $seconds = 1;
        }
        else
        {
                $seconds = $time - $seconds;
        }
        $years = floor($seconds / 31536000);

        if ($years > 0)
        {
            return $years.' '.(($years	> 1) ? 'Years' : 'Year').' ago';
        }

//        $seconds -= $years * 31536000;
        $months = floor($seconds / 2628000);

        if ($months > 0)
        {
            return $months.' '.(($months	> 1) ? 'Months' : 'Month').' ago';
        }

        $weeks = floor($seconds / 604800);

        if ($weeks > 0)
        {
            return $weeks.' '.(($weeks	> 1) ? 'Weeks' : 'Week').' ago';
        }

        $days = floor($seconds / 86400);

        if ($days > 0)
        {
            return $days.' '.(($days	> 1) ? 'Days' : 'Day').' ago';
        }

        $hours = floor($seconds / 3600);

        if ($hours > 0)
        {
            return $hours.' '.(($hours	> 1) ? 'Hours' : 'Hour').' ago';
        }

        $minutes = floor($seconds / 60);

        if ($minutes > 0)
        {
            return $minutes.' '.(($minutes	> 1) ? 'Minutes' : 'Minute').' ago';
        }

        return 'Just now';
    }
    
}

