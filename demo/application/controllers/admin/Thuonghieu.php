<?php

class Thuonghieu extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Thuonghieu_model');
    } 

    /*
     * Listing of thuonghieu
     */
    function index()
    {
        $data['thuonghieu'] = $this->Thuonghieu_model->get_all_thuonghieu();
        
        $data['_view'] = 'thuonghieu/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new thuonghieu
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'TENTHUONGHIEU' => $this->input->post('TENTHUONGHIEU'),
            );
            
            $thuonghieu_id = $this->Thuonghieu_model->add_thuonghieu($params);
            redirect('thuonghieu/index');
        }
        else
        {            
            $data['_view'] = 'thuonghieu/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a thuonghieu
     */
    function edit($MATHUONGHIEU)
    {   
        // check if the thuonghieu exists before trying to edit it
        $data['thuonghieu'] = $this->Thuonghieu_model->get_thuonghieu($MATHUONGHIEU);
        
        if(isset($data['thuonghieu']['MATHUONGHIEU']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'TENTHUONGHIEU' => $this->input->post('TENTHUONGHIEU'),
                );

                $this->Thuonghieu_model->update_thuonghieu($MATHUONGHIEU,$params);            
                redirect('thuonghieu/index');
            }
            else
            {
                $data['_view'] = 'thuonghieu/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The thuonghieu you are trying to edit does not exist.');
    } 

    /*
     * Deleting thuonghieu
     */
    function remove($MATHUONGHIEU)
    {
        $thuonghieu = $this->Thuonghieu_model->get_thuonghieu($MATHUONGHIEU);

        // check if the thuonghieu exists before trying to delete it
        if(isset($thuonghieu['MATHUONGHIEU']))
        {
            $this->Thuonghieu_model->delete_thuonghieu($MATHUONGHIEU);
            redirect('thuonghieu/index');
        }
        else
            show_error('The thuonghieu you are trying to delete does not exist.');
    }
    
}
