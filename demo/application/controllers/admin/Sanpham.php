<?php

class Sanpham extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sanpham_model');
    } 

    /*
     * Listing of sanpham
     */
    function index()
    {
        $data['sanpham'] = $this->Sanpham_model->get_all_sanpham();
        
        $data['_view'] = 'sanpham/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new sanpham
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'BANCHAY' => $this->input->post('BANCHAY'),
				'MATHUONGHIEU' => $this->input->post('MATHUONGHIEU'),
				'MADM' => $this->input->post('MADM'),
				'TENSP' => $this->input->post('TENSP'),
				'CHITIET' => $this->input->post('CHITIET'),
				'DONGIA' => $this->input->post('DONGIA'),
				'GIAKM' => $this->input->post('GIAKM'),
				'BAOHANH' => $this->input->post('BAOHANH'),
				'LUOTXEM' => $this->input->post('LUOTXEM'),
				'NGAYDANG' => $this->input->post('NGAYDANG'),
				'SOLUONG' => $this->input->post('SOLUONG'),
				'HINHANH' => $this->input->post('HINHANH'),
				'TINHTRANGSP' => $this->input->post('TINHTRANGSP'),
            );
            
            $sanpham_id = $this->Sanpham_model->add_sanpham($params);
            redirect('sanpham/index');
        }
        else
        {            
            $data['_view'] = 'sanpham/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a sanpham
     */
    function edit($MASP)
    {   
        // check if the sanpham exists before trying to edit it
        $data['sanpham'] = $this->Sanpham_model->get_sanpham($MASP);
        
        if(isset($data['sanpham']['MASP']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'BANCHAY' => $this->input->post('BANCHAY'),
					'MATHUONGHIEU' => $this->input->post('MATHUONGHIEU'),
					'MADM' => $this->input->post('MADM'),
					'TENSP' => $this->input->post('TENSP'),
					'CHITIET' => $this->input->post('CHITIET'),
					'DONGIA' => $this->input->post('DONGIA'),
					'GIAKM' => $this->input->post('GIAKM'),
					'BAOHANH' => $this->input->post('BAOHANH'),
					'LUOTXEM' => $this->input->post('LUOTXEM'),
					'NGAYDANG' => $this->input->post('NGAYDANG'),
					'SOLUONG' => $this->input->post('SOLUONG'),
					'HINHANH' => $this->input->post('HINHANH'),
					'TINHTRANGSP' => $this->input->post('TINHTRANGSP'),
                );

                $this->Sanpham_model->update_sanpham($MASP,$params);            
                redirect('sanpham/index');
            }
            else
            {
                $data['_view'] = 'sanpham/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The sanpham you are trying to edit does not exist.');
    } 

    /*
     * Deleting sanpham
     */
    function remove($MASP)
    {
        $sanpham = $this->Sanpham_model->get_sanpham($MASP);

        // check if the sanpham exists before trying to delete it
        if(isset($sanpham['MASP']))
        {
            $this->Sanpham_model->delete_sanpham($MASP);
            redirect('sanpham/index');
        }
        else
            show_error('The sanpham you are trying to delete does not exist.');
    }
    
}
