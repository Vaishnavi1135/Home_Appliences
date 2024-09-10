<?php
class Services extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = "Kolhapur Packers and Movers:Services";
        $data['content'] = $this->load->view("services",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);
    }

    public function electronic()
    {
        $data['title'] = "Kolhapur Packers and Movers:ElE";
        $data['content'] = $this->load->view("electronic",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);  
    }

    public function kitchen()
    {
        $data['title'] = "Kolhapur Packers and Movers:kit";
        $data['content'] = $this->load->view("kitchen",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);  
    }

    public function furniture()
    {
        $data['title'] = "Kolhapur Packers and Movers:Fer";
        $data['content'] = $this->load->view("furniture",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);  
    }

    public function vehicle()
    {
        $data['title'] = "Kolhapur Packers and Movers:Veh";
        $data['content'] = $this->load->view("vehicle",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);  
    }

    
}
?>