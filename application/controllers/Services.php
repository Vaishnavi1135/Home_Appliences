<?php
class Services extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        //$this->load->model(array('admin/services_model'));

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
        //$this->load->model(array('admin/services_model'));
        $data['title'] = "Kolhapur Packers and Movers:ElE";
        $data['content'] = $this->load->view("electronic",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);  
    }

    public function kitchen()
    {
        //$this->load->model(array('admin/services_model'));
        $data['title'] = "Kolhapur Packers and Movers:kit";
        $data['content'] = $this->load->view("kitchen",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);  
    }

    public function furniture()
    {
        //this->load->model(array('admin/services_model'));
        $data['title'] = "Kolhapur Packers and Movers:Fer";
        $data['content'] = $this->load->view("furniture",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);  
    }

    public function vehicle()
    {
        //$this->load->model(array('admin/services_model'));
        $data['title'] = "Kolhapur Packers and Movers:Veh";
        $data['content'] = $this->load->view("vehicle",$data,true);
        $data['active'] = "Services";
        $this->load->view("main_template",$data);  
    }

    public function view_service()
    {
        
    }

    
}
?>