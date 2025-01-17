<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/user_model'));
    }

    public function index()
    {
        $data['title'] = "Admin : Login";
        $data['page_heading'] = "Login";
        $data['active'] = "Dashboard";
        //$data['content'] = $this->load->view("admin/login",$data,true);
        $this->load->view("admin/login",$data);

    }

    public function verify(){

        if($this->input->post('loginSubmit')){ 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con =array( 
                        'email'=> $this->input->post('email'), 
                        'password' =>md5( $this->input->post('password'))
                ); 
                $checkLogin = $this->user_model->checklogin($con); 

                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin->id); 

                   // echo "<pre>"; print_r($this->session->userdata());die();
                    redirect('admin/dashboard/'); 
                }else{ 
                  echo  $data['error_msg'] = 'Wrong email or password, please try again.'; 
                } 
            }else{ 
               echo $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 

        if(!empty($data['email']) && !empty($data['password']))
        {
            $checkLogin = $this->user_model->checklogin($con); 

            if(!empty($user)){
                $forsession = array(
                    'id' => $user['id'],
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'phone' => $user['phone'],

                );
                $this->session->set_userdata($forsession);
                if($this->session->userdata('id')){
                    redirect('admin/users');
                }
                else{
                    echo "session is not created";
                }
            }
        }
        
    }


    public function register(){
        redirect('admin/login');
    }
    

    public function forgot_pass(){
        redirect('admin/forgot_pass');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }


}
 ?>