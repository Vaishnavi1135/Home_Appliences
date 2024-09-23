<?php
class Register extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        //$this->load->model(array('admin/dashboard_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $data['title'] = "Admin : Register ";
        $data['page_heading'] = "Register";
        $data['active'] = "Register";
        //$data['content'] = $this->load->view("admin/login",$data,true);
        $this->load->view("admin/register",$data);

    }

    

   

    


}
 ?>