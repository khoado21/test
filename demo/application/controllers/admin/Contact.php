<?php

class Contact extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
    } 

    /*
     * Listing of contact
     */
    function index()
    {
        $data['contact'] = $this->Contact_model->get_all_contact();
        
        $data['_view'] = 'contact/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new contact
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'HOTEN' => $this->input->post('HOTEN'),
				'EMAIL' => $this->input->post('EMAIL'),
				'NOIDUNG' => $this->input->post('NOIDUNG'),
				'TINHTRANGDON' => $this->input->post('TINHTRANGDON'),
				'NGAYGUI' => $this->input->post('NGAYGUI'),
            );
            
            $contact_id = $this->Contact_model->add_contact($params);
            redirect('contact/index');
        }
        else
        {            
            $data['_view'] = 'contact/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a contact
     */
    function edit($MALH)
    {   
        // check if the contact exists before trying to edit it
        $data['contact'] = $this->Contact_model->get_contact($MALH);
        
        if(isset($data['contact']['MALH']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'HOTEN' => $this->input->post('HOTEN'),
					'EMAIL' => $this->input->post('EMAIL'),
					'NOIDUNG' => $this->input->post('NOIDUNG'),
					'TINHTRANGDON' => $this->input->post('TINHTRANGDON'),
					'NGAYGUI' => $this->input->post('NGAYGUI'),
                );

                $this->Contact_model->update_contact($MALH,$params);            
                redirect('contact/index');
            }
            else
            {
                $data['_view'] = 'contact/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The contact you are trying to edit does not exist.');
    } 

    /*
     * Deleting contact
     */
    function remove($MALH)
    {
        $contact = $this->Contact_model->get_contact($MALH);

        // check if the contact exists before trying to delete it
        if(isset($contact['MALH']))
        {
            $this->Contact_model->delete_contact($MALH);
            redirect('contact/index');
        }
        else
            show_error('The contact you are trying to delete does not exist.');
    }
    
}
