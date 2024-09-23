<?php
class Forgot_Pass extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        //$this->load->model(array('admin/dashboard_model'));
    }

    public function index()
    {
        $data['title'] = "Admin : Forgot_Pass ";
        $data['page_heading'] = "Forgot_Pass";
        $data['active'] = "Forgot_Passr";
        //$data['content'] = $this->load->view("admin/login",$data,true);
        $this->load->view("admin/forgot_Pass",$data);

    }

    

    
    

    


}
 ?>