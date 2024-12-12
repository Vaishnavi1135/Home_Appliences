<?php
class About extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("about",$data,true);
        $data['active'] = "About";
        $this->load->view("main_template",$data);
    }
}
 ?>

 