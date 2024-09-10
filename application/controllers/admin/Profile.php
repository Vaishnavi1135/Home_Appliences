<?php
class Profile extends CI_Controller
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
        //$users = $this->user_model->read();
        //$data['profile'] = $profile;
        $data['title'] = "Admin : Users";
        $data['page_heading'] = "Users";
        $data['active'] = "Users";
        $data['content'] = $this->load->view("admin/profile",$data,true);
        $this->load->view("admin/admin_template",$data);

    }

    public function profile(){
        redirect('admin/Profile');
    }
    
}
 ?>