<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("home",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function free_quote()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("free_quote",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function track()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("track",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function free_quote2()
    {
        $data['title'] = "Kolhapur Packers and Movers";
        $data['content'] = $this->load->view("free_quote2",$data,true);
        $data['active'] = "Home";
        $this->load->view("main_template",$data);
    }

    public function sendEmail()
    {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $from = 'vaishnavirabade0110@gmail.com'; // Corrected email address
    $to = 'vaishnavirabade115@gmail.com';
    $subject = "Email sent";
    $message = "This is a test email sent using CodeIgniter Email Library.";

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.gmail.com';
    $config['smtp_port'] = 587;
    $config['smtp_user'] = 'vaishnavirabade0110@gmail.com'; // Corrected email address
    $config['smtp_pass'] = 'rxmy ivqm elqx bvmd'; // Use your App Password here
    $config['smtp_crypto'] = 'tls';
    $config['mailtype'] = 'html'; // Ensure correct type
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = true;
    $config['newline'] = "\r\n";
    $config['smtp_timeout'] = 60;

    $this->email->initialize($config);
    $this->email->from($from, 'Your Name'); // Optional: Add a name
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
        echo $this->email->print_debugger(); // For debugging during development
    }
}

// public function save()
// {
//     $data=array(
//         'id'=>$this->input->post('id'),
//         'date'=>$this->input->post('date'),
//         'name'=>$this->input->post('name'),
//         'email'=>$this->input->post('email'),
//         'phone'=>$this->input->post('phone'),
//         'status'=>1,
//     );
//     $res = 0;
//     if($this->input->post('id')==0){
//         $data['created_at'] =date('Y-m-d H:i:s');
//         $data['created_by'] = $this->session->userdata('id');
//         $res = $this->Driver_model->create($data);
//         if($res){
//             $this->session->set_flashdata('status',' Added successfully..!');
//             redirect('admin/Driver');
        
//         }
        
//     }else{
//         $data['updated_at'] =date('Y-m-d H:i:s');
//         $data['updated_by'] = $this->session->userdata('id');
//         $res = $this->Driver_model->update($data);
//         if($res){
//             $this->session->set_flashdata('status','Updated successfully..!');
//             redirect('admin/users');
        
        
//         }
//     }
    

// }



    
}
 ?>