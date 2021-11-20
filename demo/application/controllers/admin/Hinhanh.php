<?php

class Hinhanh extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hinhanh_model');
    } 

    /*
     * Listing of hinhanh
     */
    function index()
    {
        $data['hinhanh'] = $this->Hinhanh_model->get_all_hinhanh();
        
        $data['_view'] = 'hinhanh/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new hinhanh
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'MASP' => $this->input->post('MASP'),
				'LINKANH' => $this->input->post('LINKANH'),
            );
            
            $hinhanh_id = $this->Hinhanh_model->add_hinhanh($params);
            redirect('hinhanh/index');
        }
        else
        {            
            $data['_view'] = 'hinhanh/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a hinhanh
     */
    function edit($MAANH)
    {   
        // check if the hinhanh exists before trying to edit it
        $data['hinhanh'] = $this->Hinhanh_model->get_hinhanh($MAANH);
        
        if(isset($data['hinhanh']['MAANH']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'MASP' => $this->input->post('MASP'),
					'LINKANH' => $this->input->post('LINKANH'),
                );

                $this->Hinhanh_model->update_hinhanh($MAANH,$params);            
                redirect('hinhanh/index');
            }
            else
            {
                $data['_view'] = 'hinhanh/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The hinhanh you are trying to edit does not exist.');
    } 

    /*
     * Deleting hinhanh
     */
    function remove($MAANH)
    {
        $hinhanh = $this->Hinhanh_model->get_hinhanh($MAANH);

        // check if the hinhanh exists before trying to delete it
        if(isset($hinhanh['MAANH']))
        {
            $this->Hinhanh_model->delete_hinhanh($MAANH);
            redirect('hinhanh/index');
        }
        else
            show_error('The hinhanh you are trying to delete does not exist.');
    }
    
}
