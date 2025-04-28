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
            // Initialize $data array to prevent undefined errors
            $data = array();
    
            // Set form validation rules
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'Password', 'required'); 
    
            if($this->form_validation->run() == true){ 
                // Collect form data
                $con = array( 
                    'email' => $this->input->post('email'), 
                    'password' => md5($this->input->post('password'))
                ); 
    
                // Check login using the user model
                $checkLogin = $this->user_model->checklogin($con); 
    
                if($checkLogin){ 
                    // Set session data
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin->id); 
    
                    // Redirect to the dashboard
                    redirect('admin/dashboard/'); 
                } else { 
                    // Set error message for wrong credentials
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            } else {
                // Load login view if validation fails
                $this->load->view('admin/login');
            }
        }
    
        // No need for the second login check, it was redundant and has been removed
    }


    public function register(){
        $data['title'] = "Register";
        $data['page_heading'] = "Register";
        $data['active'] = "Dashboard";
        $this->load->view("admin/register",$data);
    }

    public function forgot_pass(){
        $data['title'] = "Admin : Forgot_Pass";
        $data['page_heading'] = "Forgot_Pass";
        $data['active'] = "Forgot_Passr";
      
        $this->load->view("admin/forgot_Pass",$data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    public function save()
    {
        $data=array(
            'id'=>$this->input->post('id'),
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password')),
            'phone'=>$this->input->post('phone'),
            'status'=>1,
           
        );


        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->user_model->create($data);
            
            if($res){

                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/login');
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] =$this->session->userdata('id');
            $res = $this->user_model->update($data);
            if($res){
                
                $this->session->set_flashdata('status',' Updated successfully..!');
            
            }
        }
        
    }


    public function verify2(){


        // if($this->input->post('registerSubmit')){ 
            // Set form validation rules
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'required|matches[password]');
            $this->form_validation->set_rules('name', 'Name', 'required|alpha'); 
            $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');

           
           
            if($this->form_validation->run() == true){ 
                // Collect form data
                $conn = array( 
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone')
                ); 
                
                
                $checkRegister = $this->user_model->checkRegister($conn); 
    
                if($checkRegister){ 
                    
                    $this->session->set_userdata('isRegisteredIn', TRUE); 
                    $this->session->set_userdata('userId', $checkRegister->id); 

                    
                    redirect('admin/dashboard/'); 
                } else { 
                   
                    $data['error_msg'] = 'Registration failed. Please try again.';
                } 
            } else { 
                
                $this->load->view('admin/register');
            }           
      
    }

    


}
 ?>