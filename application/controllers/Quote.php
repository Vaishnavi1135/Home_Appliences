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
    public function save()
{
    $data=array(
        'id'=>$this->input->post('id'),
        // 'date'=>$this->input->post('date'),
        'name'=>$this->input->post('name'),
        'email'=>$this->input->post('email'),
        'phone'=>$this->input->post('phone'),
        'address'=>$this->input->post('address'),
        'items'=>$this->input->post('items'),
        'status'=>1,
        
    );

        
    $res = 0;
    if($this->input->post('id')==0){
        $data['created_at'] =date('Y-m-d H:i:s');
        // $data['created_by'] = $this->session->userdata('id');
        $res = $this->Quote_model->create($data);
        if($res){
            $this->session->set_flashdata('status',' Added successfully..!');
            redirect('home/selectitem');
        
        }
        
    }else{
        $data['updated_at'] =date('Y-m-d H:i:s');
        // $data['updated_by'] =$this->session->userdata('id');
        $res = $this->quote_model->update($data);
        if($res){
            $this->session->set_flashdata('status','Updated successfully..!');
            redirect('home/selectitem');
        
        }
    }
    
}



    
}