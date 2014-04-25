<?php
class My_Controller extends CI_Controller 
{
    
    public $data = array();
    
    function __construct() 
    {
        parent::__construct();
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
        
    }
    
//    private function _options() {
//        $this->output->set_header( 'Access-Control-Allow-Origin: *' );
//        $this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
//        $this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
//        $this->output->set_content_type( 'application/json' );
//        $this->output->set_output( "*" );
//    }
    
//    protected function _format_output( $output = null ) {
//        $this->output->set_header( 'Access-Control-Allow-Origin: *' );
//
//        if( isset( $output->status ) && $output->status == 'error' ) {
//            $this->output->set_status_header( 409, $output->desc );
//        }
//        $this->_parse_data( $output );
//
//        $this->output->set_content_type( 'application/json' );
//        $this->output->set_output( json_encode( $output ) );
//    }
    
//    public function _remap( $param ) {
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