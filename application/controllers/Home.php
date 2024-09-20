<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("home",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function free_quote()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("free_quote",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function track()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("track",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }



    
}
 ?>