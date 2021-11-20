<?php

class Danhgium extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Danhgium_model');
    } 

    /*
     * Listing of danhgia
     */
    function index()
    {
        $data['danhgia'] = $this->Danhgium_model->get_all_danhgia();
        
        $data['_view'] = 'danhgium/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new danhgium
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'MANGUOIDUNG' => $this->input->post('MANGUOIDUNG'),
				'SOSAO' => $this->input->post('SOSAO'),
				'NGAYDANHGIA' => $this->input->post('NGAYDANHGIA'),
            );
            
            $danhgium_id = $this->Danhgium_model->add_danhgium($params);
            redirect('danhgium/index');
        }
        else
        {            
            $data['_view'] = 'danhgium/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a danhgium
     */
    function edit($MADANHGIA)
    {   
        // check if the danhgium exists before trying to edit it
        $data['danhgium'] = $this->Danhgium_model->get_danhgium($MADANHGIA);
        
        if(isset($data['danhgium']['MADANHGIA']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'MANGUOIDUNG' => $this->input->post('MANGUOIDUNG'),
					'SOSAO' => $this->input->post('SOSAO'),
					'NGAYDANHGIA' => $this->input->post('NGAYDANHGIA'),
                );

                $this->Danhgium_model->update_danhgium($MADANHGIA,$params);            
                redirect('danhgium/index');
            }
            else
            {
                $data['_view'] = 'danhgium/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The danhgium you are trying to edit does not exist.');
    } 

    /*
     * Deleting danhgium
     */
    function remove($MADANHGIA)
    {
        $danhgium = $this->Danhgium_model->get_danhgium($MADANHGIA);

        // check if the danhgium exists before trying to delete it
        if(isset($danhgium['MADANHGIA']))
        {
            $this->Danhgium_model->delete_danhgium($MADANHGIA);
            redirect('danhgium/index');
        }
        else
            show_error('The danhgium you are trying to delete does not exist.');
    }
    
}
