<?php

 
class Vaitronguoidung extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vaitronguoidung_model');
    } 

    /*
     * Listing of vaitronguoidung
     */
    function index()
    {
        $data['vaitronguoidung'] = $this->Vaitronguoidung_model->get_all_vaitronguoidung();
        
        $data['_view'] = 'vaitronguoidung/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new vaitronguoidung
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'TENQUYEN' => $this->input->post('TENQUYEN'),
            );
            
            $vaitronguoidung_id = $this->Vaitronguoidung_model->add_vaitronguoidung($params);
            redirect('vaitronguoidung/index');
        }
        else
        {            
            $data['_view'] = 'vaitronguoidung/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a vaitronguoidung
     */
    function edit($MAQUYEN)
    {   
        // check if the vaitronguoidung exists before trying to edit it
        $data['vaitronguoidung'] = $this->Vaitronguoidung_model->get_vaitronguoidung($MAQUYEN);
        
        if(isset($data['vaitronguoidung']['MAQUYEN']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'TENQUYEN' => $this->input->post('TENQUYEN'),
                );

                $this->Vaitronguoidung_model->update_vaitronguoidung($MAQUYEN,$params);            
                redirect('vaitronguoidung/index');
            }
            else
            {
                $data['_view'] = 'vaitronguoidung/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The vaitronguoidung you are trying to edit does not exist.');
    } 

    /*
     * Deleting vaitronguoidung
     */
    function remove($MAQUYEN)
    {
        $vaitronguoidung = $this->Vaitronguoidung_model->get_vaitronguoidung($MAQUYEN);

        // check if the vaitronguoidung exists before trying to delete it
        if(isset($vaitronguoidung['MAQUYEN']))
        {
            $this->Vaitronguoidung_model->delete_vaitronguoidung($MAQUYEN);
            redirect('vaitronguoidung/index');
        }
        else
            show_error('The vaitronguoidung you are trying to delete does not exist.');
    }
    
}
