<?php

class Voucher extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Voucher_model');
    } 

    /*
     * Listing of voucher
     */
    function index()
    {
        $data['voucher'] = $this->Voucher_model->get_all_voucher();
        
        $data['_view'] = 'voucher/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new voucher
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'TENMA' => $this->input->post('TENMA'),
				'NGAYBD' => $this->input->post('NGAYBD'),
				'NGAYKT' => $this->input->post('NGAYKT'),
				'TYLE' => $this->input->post('TYLE'),
				'TRANGTHAI' => $this->input->post('TRANGTHAI'),
            );
            
            $voucher_id = $this->Voucher_model->add_voucher($params);
            redirect('voucher/index');
        }
        else
        {            
            $data['_view'] = 'voucher/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a voucher
     */
    function edit($MAVOUCHER)
    {   
        // check if the voucher exists before trying to edit it
        $data['voucher'] = $this->Voucher_model->get_voucher($MAVOUCHER);
        
        if(isset($data['voucher']['MAVOUCHER']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'TENMA' => $this->input->post('TENMA'),
					'NGAYBD' => $this->input->post('NGAYBD'),
					'NGAYKT' => $this->input->post('NGAYKT'),
					'TYLE' => $this->input->post('TYLE'),
					'TRANGTHAI' => $this->input->post('TRANGTHAI'),
                );

                $this->Voucher_model->update_voucher($MAVOUCHER,$params);            
                redirect('voucher/index');
            }
            else
            {
                $data['_view'] = 'voucher/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The voucher you are trying to edit does not exist.');
    } 

    /*
     * Deleting voucher
     */
    function remove($MAVOUCHER)
    {
        $voucher = $this->Voucher_model->get_voucher($MAVOUCHER);

        // check if the voucher exists before trying to delete it
        if(isset($voucher['MAVOUCHER']))
        {
            $this->Voucher_model->delete_voucher($MAVOUCHER);
            redirect('voucher/index');
        }
        else
            show_error('The voucher you are trying to delete does not exist.');
    }
    
}
