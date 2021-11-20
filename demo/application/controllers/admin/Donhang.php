<?php

class Donhang extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Donhang_model');
    } 

    /*
     * Listing of donhang
     */
    function index()
    {
        $data['donhang'] = $this->Donhang_model->get_all_donhang();
        
        $data['_view'] = 'donhang/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new donhang
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'MAVOUCHER' => $this->input->post('MAVOUCHER'),
				'MAGIAOHANG' => $this->input->post('MAGIAOHANG'),
				'MANGUOIDUNG' => $this->input->post('MANGUOIDUNG'),
				'NGAYDAT' => $this->input->post('NGAYDAT'),
				'NGAYSHIP' => $this->input->post('NGAYSHIP'),
				'TONGDON' => $this->input->post('TONGDON'),
				'HOTEN' => $this->input->post('HOTEN'),
				'SDT' => $this->input->post('SDT'),
				'DIACHI' => $this->input->post('DIACHI'),
				'GIOITINH' => $this->input->post('GIOITINH'),
				'EMAIL' => $this->input->post('EMAIL'),
				'GHICHU' => $this->input->post('GHICHU'),
				'SOTHEODOI' => $this->input->post('SOTHEODOI'),
				'VANCHUYEN' => $this->input->post('VANCHUYEN'),
				'TINHTRANGTHANHTOAN' => $this->input->post('TINHTRANGTHANHTOAN'),
				'NGAYTHANHTOAN' => $this->input->post('NGAYTHANHTOAN'),
				'NGAYHETHAN' => $this->input->post('NGAYHETHAN'),
				'TRANSACTIONID' => $this->input->post('TRANSACTIONID'),
            );
            
            $donhang_id = $this->Donhang_model->add_donhang($params);
            redirect('donhang/index');
        }
        else
        {            
            $data['_view'] = 'donhang/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a donhang
     */
    function edit($MADONHANG)
    {   
        // check if the donhang exists before trying to edit it
        $data['donhang'] = $this->Donhang_model->get_donhang($MADONHANG);
        
        if(isset($data['donhang']['MADONHANG']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'MAVOUCHER' => $this->input->post('MAVOUCHER'),
					'MAGIAOHANG' => $this->input->post('MAGIAOHANG'),
					'MANGUOIDUNG' => $this->input->post('MANGUOIDUNG'),
					'NGAYDAT' => $this->input->post('NGAYDAT'),
					'NGAYSHIP' => $this->input->post('NGAYSHIP'),
					'TONGDON' => $this->input->post('TONGDON'),
					'HOTEN' => $this->input->post('HOTEN'),
					'SDT' => $this->input->post('SDT'),
					'DIACHI' => $this->input->post('DIACHI'),
					'GIOITINH' => $this->input->post('GIOITINH'),
					'EMAIL' => $this->input->post('EMAIL'),
					'GHICHU' => $this->input->post('GHICHU'),
					'SOTHEODOI' => $this->input->post('SOTHEODOI'),
					'VANCHUYEN' => $this->input->post('VANCHUYEN'),
					'TINHTRANGTHANHTOAN' => $this->input->post('TINHTRANGTHANHTOAN'),
					'NGAYTHANHTOAN' => $this->input->post('NGAYTHANHTOAN'),
					'NGAYHETHAN' => $this->input->post('NGAYHETHAN'),
					'TRANSACTIONID' => $this->input->post('TRANSACTIONID'),
                );

                $this->Donhang_model->update_donhang($MADONHANG,$params);            
                redirect('donhang/index');
            }
            else
            {
                $data['_view'] = 'donhang/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The donhang you are trying to edit does not exist.');
    } 

    /*
     * Deleting donhang
     */
    function remove($MADONHANG)
    {
        $donhang = $this->Donhang_model->get_donhang($MADONHANG);

        // check if the donhang exists before trying to delete it
        if(isset($donhang['MADONHANG']))
        {
            $this->Donhang_model->delete_donhang($MADONHANG);
            redirect('donhang/index');
        }
        else
            show_error('The donhang you are trying to delete does not exist.');
    }
    
}
