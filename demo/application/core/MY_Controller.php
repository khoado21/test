<?php
class MY_Controller extends CI_Controller
{
    //bien gui du lieu sang view 
    public $data = array();
    
    public $success_form = array(
        'message' => null
    );

    function __construct()
    {
        //ke thua tu CI controller
        parent::__construct();
            
        $controller = $this->uri->segment(1);
        switch($controller)
        {
            case 'admin':
                {
                    //xu ly cac du lieu khi truy cap vao trang admin
                    $this->load->helper('admin');
                    $this->_check_login();
                    break;
                }
                default:
                {
                    //xu ly du lieu o trang ngoai
                }
        }
    }

    //kiem tra trang thai dang nhap cua admin
    private function _check_login()
    {

    }
}