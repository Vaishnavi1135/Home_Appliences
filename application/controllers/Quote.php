<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Quote_model'); // Load the model
        $this->load->library('form_validation'); // Load form validation library
        $this->load->library('email');
    }

    // Load the registration view
   

    // Handle form submission
    public function save()
{
    $data=array(
        'id'=>$this->input->post('id'),
        'name'=>$this->input->post('name'),
        'email'=>$this->input->post('email'),
        'phone'=>$this->input->post('phone'),
        'status'=>1,
        
    );

        
    $res = 0;
    if($this->input->post('id')==0){
        $data['created_at'] =date('Y-m-d H:i:s');
        $res = $this->Quote_model->create($data);
        if($res){
            $this->session->set_flashdata('status',' Added successfully..!');
            $this->sendEmail($data);
            redirect('home/selectitem');
        
        }
        
    }else{
        $data['updated_at'] =date('Y-m-d H:i:s');
        $res = $this->quote_model->update($data);
        if($res){
            $this->session->set_flashdata('status','Updated successfully..!');
            redirect('home/selectitem');
        
        }
    }
    
}



    private function sendEmail($data)
    {
        $this->load->library('email');

        $from = 'vaishnavirabade0110@gmail.com';
        $to = $data['email'];
        $subject = 'Quote Request Confirmation';
        $message = "
            <h3>Quote Request Received</h3>
            <p>Dear {$data['name']},</p>
            <p>Thank you for submitting a quote request. We have received your details:</p>
            <ul>
                <li>Name: {$data['name']}</li>
                <li>Email: {$data['email']}</li>
            </ul>
            <p>We will contact you soon!</p>
            <p>Best regards,<br>Your Company</p>
        ";

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'vaishnavirabade0110@gmail.com',
            'smtp_pass' => 'bwxp ynei pxwb ggty',//rxmy ivqm elqx bvmd', // App Password
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => true,
            'newline' => "\r\n",
            'smtp_timeout' => 30
        ];

        $this->email->initialize($config);
        $this->email->from($from, 'Kolhapur Packers And Movers');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            log_message('info', 'Email sent to ' . $to);
        } else {
            log_message('error', 'Failed to send email: ' . $this->email->print_debugger());
        }
    }
}


    
