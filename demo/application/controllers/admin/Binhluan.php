<?php

class Binhluan extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Binhluan_model');
    } 

    /*
     * Listing of binhluan
     */
    function index()
    {
        $data['binhluan'] = $this->Binhluan_model->get_all_binhluan();
        
        $data['_view'] = 'binhluan/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new binhluan
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'MANGUOIDUNG' => $this->input->post('MANGUOIDUNG'),
				'NOIDUNG' => $this->input->post('NOIDUNG'),
				'NGAYTAO' => $this->input->post('NGAYTAO'),
            );
            
            $binhluan_id = $this->Binhluan_model->add_binhluan($params);
            redirect('binhluan/index');
        }
        else
        {            
            $data['_view'] = 'binhluan/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a binhluan
     */
    function edit($MABINHLUAN)
    {   
        // check if the binhluan exists before trying to edit it
        $data['binhluan'] = $this->Binhluan_model->get_binhluan($MABINHLUAN);
        
        if(isset($data['binhluan']['MABINHLUAN']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'MANGUOIDUNG' => $this->input->post('MANGUOIDUNG'),
					'NOIDUNG' => $this->input->post('NOIDUNG'),
					'NGAYTAO' => $this->input->post('NGAYTAO'),
                );

                $this->Binhluan_model->update_binhluan($MABINHLUAN,$params);            
                redirect('binhluan/index');
            }
            else
            {
                $data['_view'] = 'binhluan/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The binhluan you are trying to edit does not exist.');
    } 

    /*
     * Deleting binhluan
     */
    function remove($MABINHLUAN)
    {
        $binhluan = $this->Binhluan_model->get_binhluan($MABINHLUAN);

        // check if the binhluan exists before trying to delete it
        if(isset($binhluan['MABINHLUAN']))
        {
            $this->Binhluan_model->delete_binhluan($MABINHLUAN);
            redirect('binhluan/index');
        }
        else
            show_error('The binhluan you are trying to delete does not exist.');
    }
    
}
