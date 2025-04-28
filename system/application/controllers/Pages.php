<?php
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/services_model','admin/plans_model','admin/review_model'));

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
        $data['plans'] =  $this->plans_model->read();
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("pricing_plan",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);
    }

    public function testimonial()
    {
        $data['review'] =  $this->review_model->read();
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("testimonial",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);
    }

    public function payment()
    {
        $data['payment'] =  $this->plans_model->read();
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("payment",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);
    }

    public function scanner()
    {
        $data['scanner'] =  $this->plans_model->read();
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("scanner",$data,true);
        $data['active'] = "Pages";
        $this->load->view("main_template",$data);
    }
}
 ?>