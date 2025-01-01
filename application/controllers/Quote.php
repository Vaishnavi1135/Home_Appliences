<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {


    
        public function __construct()
        {
            parent :: __construct();
            $this->load->helper('url');
            // $this->load->model(array('admin/Quote_model'));
            
        }
    
        // public function index()
        // {
        //     $Driver = $this->Driver_model->read();
        //     $data['title'] = "Admin : Driver";
        //     $data['page_heading'] = "Driver";
        //     $data['Driver'] = $Driver;
        //     $data['active'] = "Driver";
        //     $data['content'] = $this->load->view("admin/Driver/list",$data,true);
        //     $this->load->view("admin/admin_template",$data);
        // }
    
    
        public function save()
        {

            $data=array(
                'id'=>$this->input->post('id'),
                'date'=>$this->input->post('date'),
                'name'=>$this->input->post('name'),
                'phone'=>$this->input->post('phone'),
                'status'=>1,
            );
            // $res = 0;
            // if($this->input->post('id')==0){
            //     $data['created_at'] =date('Y-m-d H:i:s');
            //     $data['created_by'] = $this->session->userdata('id');
            //     $res = $this->Quote_model->create($data);
            //     if($res){
            //         $this->session->set_flashdata('status',' Added successfully..!');
            //         redirect('admin/Driver');
                
            //     }
                
            // }else{
            //     $data['updated_at'] =date('Y-m-d H:i:s');
            //     $data['updated_by'] = $this->session->userdata('id');
            //     $res = $this->Quote_model->update($data);
            //     if($res){
            //         $this->session->set_flashdata('status','Updated successfully..!');
            //         redirect('admin/Driver');
                
                
            //     }
            // }
            
    
        }
    
        
    }



