<?php
class Contact extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model('contact_model');
    }

    public function index()
    {
        $data['title'] = "Kolhapur Packers and Movers: Contact us";
        $data['content'] = $this->load->view("contact",$data,true);
        $data['active'] = "Contact";
        $this->load->view("main_template",$data);
		
    }

    public function save()
    {
        $data=array(
            'id'=>$this->input->post('id'),
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'phone'=>$this->input->post('phone'),
            'special_note'=>$this->input->post('special_note'),
           
           
        );
        
        if ($this->contact_model->insert_contact($data)) {
            $this->session->set_flashdata('success', 'Your message has been sent successfully.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Try again.');
        }

        redirect('home');


       
        
    }
}

 ?>
