<?php
class Contact extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = "Kolhapur Packers and Movers: Contact us";
        $data['content'] = $this->load->view("contact",$data,true);
        $data['active'] = "Contact";
        $this->load->view("main_template",$data);
		
    }
}
 ?>
