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

// public function save() {
//     $name = $this->input->post('name');
//     $email = $this->input->post('email');
//     $phone = $this->input->post('phone');
//     $status =1;

//     // Prepare data to save in the database
//     $data = array(
//         'name' => $name,
//         'email' => $email,
//         'phone' => $phone,
//         'status' => 1
//     );

//     // Save data using model
//     if ($this->Quote_model->insert_quote($data)) {
//         // Send email confirmation
//         $this->send_email($email, $name);

//         echo json_encode(['success' => true]);
//     } else {
//         echo json_encode(['success' => false]);
//     }
// }

// private function send_email($to_email, $name) {
//     $this->email->from('rabadevaishnavi0525@gmail.com', 'Your Company Name');
//     $this->email->to($to_email);
//     $this->email->subject('Thank You for Your Quote Request');
//     $this->email->message("
//         Dear $name,<br><br>
//         Thank you for requesting a quote. Our team will contact you soon.<br><br>
//         Best Regards,<br>
//         Your Company Name
//     ");

//     if ($this->email->send()) {
//         log_message('info', "Email sent successfully to $to_email");
//     } else {
//         log_message('error', "Failed to send email to $to_email: " . $this->email->print_debugger());
//     }
// }

}


    
