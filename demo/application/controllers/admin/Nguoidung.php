<?php
class Nguoidung extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Nguoidung_model');
    }
    function index()
    {
        $input = array();
        $list = $this->Nguoidung_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua alert
        $alert = $this->session->flashdata('alert');
        $this->data['alert'] = $alert;

        $this->data['temp'] = 'admin/nguoidung/index';
        $this->load->view('admin/main', $this->data);
    }

    function check_email()
    {
        $EMAIL = $this->input->post('EMAIL');
        $where = array('email' => $EMAIL);

        //kiểm tra username đã tồn tại chưa
        if ($this->Nguoidung_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

    function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('HOTEN', 'Họ và tên', 'required|min_length[5]');
            $this->form_validation->set_rules('USERNAME', 'Username', 'required|min_length[5]');
            $this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('PASSCONF', 'Nhập lại mật khẩu', 'trim|matches[PASSWORD]');
            $this->form_validation->set_rules('EMAIL', 'Email', 'required|callback_check_email');
            $this->form_validation->set_rules('VAITRO', 'Vai trò', 'required');
            $this->form_validation->set_rules('MAQUYEN', 'Mã quyền', 'required');

            if ($this->form_validation->run()) {
                $HOTEN = $this->input->post('HOTEN');
                $USERNAME = $this->input->post('USERNAME');
                $PASSWORD = $this->input->post('PASSWORD');
                $NGAYSINH = $this->input->post('NGAYSINH');
                $EMAIL = $this->input->post('EMAIL');
                $NGAYTAO = $this->input->post('NGAYTAO');
                $NGAYSUA = $this->input->post('NGAYSUA');
                $VAITRO = $this->input->post('VAITRO');
                $TRANGTHAI = $this->input->post('TRANGTHAI');
                $MAQUYEN = $this->input->post('MAQUYEN');
                $data = array(
                    'HOTEN' => $HOTEN,
                    'USERNAME' => $USERNAME,
                    'PASSWORD' => $PASSWORD,
                    'NGAYSINH' => $NGAYSINH,
                    'EMAIL' => $EMAIL,
                    'NGAYTAO' => $NGAYTAO,
                    'NGAYSUA' => $NGAYSUA,
                    'VAITRO' => $VAITRO,
                    'TRANGTHAI' => $TRANGTHAI,
                    'MAQUYEN' => $MAQUYEN
                );

                //tạo nội dung thông báo
                if ($this->Nguoidung_model->create($data)) {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới dữ liệu thành công
                                </div>';
                    $this->success_form['message'] = $message;
                } else {
                    // $this->session->set_flashdata('message', 'Thêm mới dữ liệu không thành công');
                    $message = '<div class="alert alert-primary" id="alert" role="alert">
                                    Thêm mới dữ liệu không thành công
                                </div>';
                    $this->success_form['message'] = $message;
                }
                //chuyển tới trang danh sách quản trị viên
                //redirect(admin_url('nguoidung/add'));
            }
        }
        // $message = $this->session->flashdata('message');
        $this->success_form['temp'] = 'admin/nguoidung/add';
        $this->load->view('admin/main', $this->success_form);
    }

    function edit()
    {
        $message = '';
        $this->data['message'] = $message;
        $EMAIL = $this->uri->rsegment('3');
        $info = $this->Nguoidung_model->get_info($EMAIL);
        if ($info == FALSE) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Người dùng không tồn tại</div>');
            redirect(admin_url('nguoidung/index'));
        } else {
            $this->data['info'] = $info;

            if ($this->input->post()) {
                $this->form_validation->set_rules('HOTEN', 'Họ và tên', 'required|min_length[5]');
                $this->form_validation->set_rules('USERNAME', 'Username', 'required|min_length[5]');
                $this->form_validation->set_rules('PASSWORD', 'Password', 'trim|required|min_length[8]');
                $this->form_validation->set_rules('VAITRO', 'Vai trò', 'required');
                $this->form_validation->set_rules('MAQUYEN', 'Mã quyền', 'required');

                if ($this->form_validation->run()) {
                    $HOTEN = $this->input->post('HOTEN');
                    $USERNAME = $this->input->post('USERNAME');
                    $PASSWORD = $this->input->post('PASSWORD');
                    $NGAYSINH = $this->input->post('NGAYSINH');
                    $NGAYSUA = date('Y-m-d H:i:s');
                    $VAITRO = $this->input->post('VAITRO');
                    $MAQUYEN = $this->input->post('MAQUYEN');
                    if ($PASSWORD == $this->data['info']->PASSWORD  && $this->form_validation->run() == TRUE) {
                        $data = array(
                            'HOTEN' => $HOTEN,
                            'USERNAME' => $USERNAME,
                            'NGAYSINH' => $NGAYSINH,
                            'NGAYSUA' => $NGAYSUA,
                            'VAITRO' => $VAITRO,
                            'MAQUYEN' => $MAQUYEN
                        );
                        if ($this->Nguoidung_model->update($EMAIL, $data)) {
                            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Cập nhật dữ liệu thành công</div>');
                            // $message = '<div class="alert alert-primary" id="alert" role="alert">Cập nhật dữ liệu thành công</div>';
                            // $this->success_form['message'] = $message;
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>');
                            // $message = '<div class="alert alert-danger" role="alert">Cập nhật dữ liệu không thành công</div>';
                            // $this->success_form['message'] = $message;
                        }
                    } else if ($PASSWORD != $this->data['info']->PASSWORD) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Xác nhận mật khẩu thất bại</div>');
                        // $message = '<div class="alert alert-danger" role="alert">Xác nhận mật khẩu thất bại</div>';
                        // $this->success_form['message'] = $message;
                    }
                    $message = $this->session->flashdata('message');
                    $this->data['message'] = $message;
                }
            }
        }
        $this->data['temp'] = 'admin/nguoidung/edit';
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $message = '';
        $this->success_form['message'] = $message;
        $EMAIL = $this->uri->rsegment('3');
        $info = $this->Nguoidung_model->get_info($EMAIL);
        if ($info == FALSE)
        {
            $message = '<div class="alert alert-danger" role="alert">Người dùng không tồn tại</div>';
            $this->success_form['message'] = $message;
        } 
        else 
        {
            //thực hiện xóa
            $this->Nguoidung_model->delete($EMAIL);
            $this->session->set_flashdata('alert', '<div class="alert alert-primary" role="alert">Xóa dữ liệu thành công</div>');
        }
        redirect('admin/nguoidung/index');
    }


    // function test()
    // {
    //     $EMAIL = $this->uri->rsegment('3');
    //     $info = $this->Nguoidung_model->get_info($EMAIL);
    //     pre($info);

    // }
}
