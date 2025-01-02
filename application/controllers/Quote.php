<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Quote_model'); // Load the model
        $this->load->library('form_validation'); // Load form validation library
    }

    // Load the registration view
   

    // Handle form submission
    public function save() {

        // Set validation rules
        $this->form_validation->set_rules('date', 'Date', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|exact_length[10]|numeric');

        // If validation fails, reload the form
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/register');
        } else {
            // Prepare data for insertion
            $data = array(
                'date' => $this->input->post('date'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'status'=>1,
                
            );

            // Save data using the model
            if ($this->Quote_model->save($data)) {
                $this->session->set_flashdata('status', 'Registration successful!');
                redirect(''); // Redirect back to the form with a success message
            } else {
                $this->session->set_flashdata('status', 'Failed to register. Please try again.');
                redirect(''); // Redirect back to the form with an error message
            }
        }
    }
}
