<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/dashboard_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $data['title'] = "Admin : Dashboard";
        $data['page_heading'] = "Dashboard";
        $data['active'] = "Dashboard";
        $data['content'] = $this->load->view("admin/dashboard",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

}
 ?>