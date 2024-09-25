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
            // 'retypepassword'=>md5($this->input->post('retypepassword')),
            
            'status'=>1,
        );
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->user_model->create($data);
            if($res){
                echo "added successfully";
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] =$this->session->userdata('id');
            $res = $this->user_model->update($data);
            if($res){
                echo "updates successfully";
            
            }
        }
        

    }


}
 ?>