<?php

class Nhacungcap extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nhacungcap_model');
    } 

    /*
     * Listing of nhacungcap
     */
    function index()
    {
        $data['nhacungcap'] = $this->Nhacungcap_model->get_all_nhacungcap();
        
        $data['_view'] = 'nhacungcap/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new nhacungcap
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'TENNCC' => $this->input->post('TENNCC'),
				'DIACHI' => $this->input->post('DIACHI'),
				'THANHPHO' => $this->input->post('THANHPHO'),
				'SDT' => $this->input->post('SDT'),
				'TINHTRANGXACNHAN' => $this->input->post('TINHTRANGXACNHAN'),
            );
            
            $nhacungcap_id = $this->Nhacungcap_model->add_nhacungcap($params);
            redirect('nhacungcap/index');
        }
        else
        {            
            $data['_view'] = 'nhacungcap/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a nhacungcap
     */
    function edit($MANCC)
    {   
        // check if the nhacungcap exists before trying to edit it
        $data['nhacungcap'] = $this->Nhacungcap_model->get_nhacungcap($MANCC);
        
        if(isset($data['nhacungcap']['MANCC']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'TENNCC' => $this->input->post('TENNCC'),
					'DIACHI' => $this->input->post('DIACHI'),
					'THANHPHO' => $this->input->post('THANHPHO'),
					'SDT' => $this->input->post('SDT'),
					'TINHTRANGXACNHAN' => $this->input->post('TINHTRANGXACNHAN'),
                );

                $this->Nhacungcap_model->update_nhacungcap($MANCC,$params);            
                redirect('nhacungcap/index');
            }
            else
            {
                $data['_view'] = 'nhacungcap/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The nhacungcap you are trying to edit does not exist.');
    } 

    /*
     * Deleting nhacungcap
     */
    function remove($MANCC)
    {
        $nhacungcap = $this->Nhacungcap_model->get_nhacungcap($MANCC);

        // check if the nhacungcap exists before trying to delete it
        if(isset($nhacungcap['MANCC']))
        {
            $this->Nhacungcap_model->delete_nhacungcap($MANCC);
            redirect('nhacungcap/index');
        }
        else
            show_error('The nhacungcap you are trying to delete does not exist.');
    }
    
}
