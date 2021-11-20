<?php

 
class Tintuc extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tintuc_model');
    } 

    /*
     * Listing of tintuc
     */
    function index()
    {
        $data['tintuc'] = $this->Tintuc_model->get_all_tintuc();
        
        $data['_view'] = 'tintuc/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tintuc
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'MANGUOIDUNG' => $this->input->post('MANGUOIDUNG'),
				'TIEUDE' => $this->input->post('TIEUDE'),
				'NOIDUNG' => $this->input->post('NOIDUNG'),
				'NGAYDANG' => $this->input->post('NGAYDANG'),
				'NGAYSUA' => $this->input->post('NGAYSUA'),
            );
            
            $tintuc_id = $this->Tintuc_model->add_tintuc($params);
            redirect('tintuc/index');
        }
        else
        {            
            $data['_view'] = 'tintuc/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tintuc
     */
    function edit($MATINTUC)
    {   
        // check if the tintuc exists before trying to edit it
        $data['tintuc'] = $this->Tintuc_model->get_tintuc($MATINTUC);
        
        if(isset($data['tintuc']['MATINTUC']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'MANGUOIDUNG' => $this->input->post('MANGUOIDUNG'),
					'TIEUDE' => $this->input->post('TIEUDE'),
					'NOIDUNG' => $this->input->post('NOIDUNG'),
					'NGAYDANG' => $this->input->post('NGAYDANG'),
					'NGAYSUA' => $this->input->post('NGAYSUA'),
                );

                $this->Tintuc_model->update_tintuc($MATINTUC,$params);            
                redirect('tintuc/index');
            }
            else
            {
                $data['_view'] = 'tintuc/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tintuc you are trying to edit does not exist.');
    } 

    /*
     * Deleting tintuc
     */
    function remove($MATINTUC)
    {
        $tintuc = $this->Tintuc_model->get_tintuc($MATINTUC);

        // check if the tintuc exists before trying to delete it
        if(isset($tintuc['MATINTUC']))
        {
            $this->Tintuc_model->delete_tintuc($MATINTUC);
            redirect('tintuc/index');
        }
        else
            show_error('The tintuc you are trying to delete does not exist.');
    }
    
}
