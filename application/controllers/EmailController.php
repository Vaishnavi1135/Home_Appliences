<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {
    
    public function send_otp() {
        $email='kothavalenilu@gmail.com';
        $this->load->library('email');
        $this->load->helper('string'); // For generating a random string

        // Generate a random 6-digit OTP
        $otp = random_string('numeric', 6);

        // Configure the email library
        $this->email->initialize($this->config->item('email'));
        
        // Set email content
        $this->email->from('vaishnavirabade0110@gmail.com', 'Home_Appliences');
        $this->email->to($email);
        $this->email->subject('Your OTP Code');
        $this->email->message('Your OTP is: <strong>' . $otp . '</strong>');

        // Send the email
        if ($this->email->send()) {
            echo 'OTP sent successfully to ' . $email;
            // Optionally, store the OTP in session or database
            $this->session->set_userdata('otp', $otp);
        } else {
            echo 'Failed to send OTP. Please try again.';
            echo $this->email->print_debugger(); // Debug info
        }
    }
}
