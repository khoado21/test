<?php

class Giaohang extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Giaohang_model');
    } 

    /*
     * Listing of giaohang
     */
    function index()
    {
        $data['giaohang'] = $this->Giaohang_model->get_all_giaohang();
        
        $data['_view'] = 'giaohang/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new giaohang
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'TENNGUOIGIAO' => $this->input->post('TENNGUOIGIAO'),
				'NGAYGIAO' => $this->input->post('NGAYGIAO'),
				'SDT' => $this->input->post('SDT'),
				'XACNHAN' => $this->input->post('XACNHAN'),
            );
            
            $giaohang_id = $this->Giaohang_model->add_giaohang($params);
            redirect('giaohang/index');
        }
        else
        {            
            $data['_view'] = 'giaohang/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a giaohang
     */
    function edit($MAGIAOHANG)
    {   
        // check if the giaohang exists before trying to edit it
        $data['giaohang'] = $this->Giaohang_model->get_giaohang($MAGIAOHANG);
        
        if(isset($data['giaohang']['MAGIAOHANG']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'TENNGUOIGIAO' => $this->input->post('TENNGUOIGIAO'),
					'NGAYGIAO' => $this->input->post('NGAYGIAO'),
					'SDT' => $this->input->post('SDT'),
					'XACNHAN' => $this->input->post('XACNHAN'),
                );

                $this->Giaohang_model->update_giaohang($MAGIAOHANG,$params);            
                redirect('giaohang/index');
            }
            else
            {
                $data['_view'] = 'giaohang/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The giaohang you are trying to edit does not exist.');
    } 

    /*
     * Deleting giaohang
     */
    function remove($MAGIAOHANG)
    {
        $giaohang = $this->Giaohang_model->get_giaohang($MAGIAOHANG);

        // check if the giaohang exists before trying to delete it
        if(isset($giaohang['MAGIAOHANG']))
        {
            $this->Giaohang_model->delete_giaohang($MAGIAOHANG);
            redirect('giaohang/index');
        }
        else
            show_error('The giaohang you are trying to delete does not exist.');
    }
    
}
