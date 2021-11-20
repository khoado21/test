<?php

class Danhmuc extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Danhmuc_model');
    } 

    /*
     * Listing of danhmuc
     */
    function index()
    {
        $data['danhmuc'] = $this->Danhmuc_model->get_all_danhmuc();
        
        $data['_view'] = 'danhmuc/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new danhmuc
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'TENDM' => $this->input->post('TENDM'),
				'_MOTA' => $this->input->post('_MOTA'),
				'HINHANH' => $this->input->post('HINHANH'),
            );
            
            $danhmuc_id = $this->Danhmuc_model->add_danhmuc($params);
            redirect('danhmuc/index');
        }
        else
        {            
            $data['_view'] = 'danhmuc/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a danhmuc
     */
    function edit($MADM)
    {   
        // check if the danhmuc exists before trying to edit it
        $data['danhmuc'] = $this->Danhmuc_model->get_danhmuc($MADM);
        
        if(isset($data['danhmuc']['MADM']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'TENDM' => $this->input->post('TENDM'),
					'_MOTA' => $this->input->post('_MOTA'),
					'HINHANH' => $this->input->post('HINHANH'),
                );

                $this->Danhmuc_model->update_danhmuc($MADM,$params);            
                redirect('danhmuc/index');
            }
            else
            {
                $data['_view'] = 'danhmuc/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The danhmuc you are trying to edit does not exist.');
    } 

    /*
     * Deleting danhmuc
     */
    function remove($MADM)
    {
        $danhmuc = $this->Danhmuc_model->get_danhmuc($MADM);

        // check if the danhmuc exists before trying to delete it
        if(isset($danhmuc['MADM']))
        {
            $this->Danhmuc_model->delete_danhmuc($MADM);
            redirect('danhmuc/index');
        }
        else
            show_error('The danhmuc you are trying to delete does not exist.');
    }
    
}
