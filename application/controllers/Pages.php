<?php
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        

        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("pages",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);
    }

    public function some_facts()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("some_facts",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);

    }

    public function our_features()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("our_features",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);

    }

    public function pricing_plan()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("pricing_plan",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);
    }

    public function testimonial()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("testimonial",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);
    }
}
 ?>