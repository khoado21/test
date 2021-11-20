<?php

class Ctdh extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ctdh_model');
    } 

    /*
     * Listing of ctdh
     */
    function index()
    {
        $data['ctdh'] = $this->Ctdh_model->get_all_ctdh();
        
        $data['_view'] = 'ctdh/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new ctdh
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'DONGIA' => $this->input->post('DONGIA'),
				'SOLUONG' => $this->input->post('SOLUONG'),
            );
            
            $ctdh_id = $this->Ctdh_model->add_ctdh($params);
            redirect('ctdh/index');
        }
        else
        {            
            $data['_view'] = 'ctdh/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a ctdh
     */
    function edit($MASP)
    {   
        // check if the ctdh exists before trying to edit it
        $data['ctdh'] = $this->Ctdh_model->get_ctdh($MASP);
        
        if(isset($data['ctdh']['MASP']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'DONGIA' => $this->input->post('DONGIA'),
					'SOLUONG' => $this->input->post('SOLUONG'),
                );

                $this->Ctdh_model->update_ctdh($MASP,$params);            
                redirect('ctdh/index');
            }
            else
            {
                $data['_view'] = 'ctdh/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The ctdh you are trying to edit does not exist.');
    } 

    /*
     * Deleting ctdh
     */
    function remove($MASP)
    {
        $ctdh = $this->Ctdh_model->get_ctdh($MASP);

        // check if the ctdh exists before trying to delete it
        if(isset($ctdh['MASP']))
        {
            $this->Ctdh_model->delete_ctdh($MASP);
            redirect('ctdh/index');
        }
        else
            show_error('The ctdh you are trying to delete does not exist.');
    }
    
}
