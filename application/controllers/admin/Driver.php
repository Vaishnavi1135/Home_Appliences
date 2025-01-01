<?php 
class Driver extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/Driver_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $Driver = $this->Driver_model->read();
        $data['title'] = "Admin : Driver";
        $data['page_heading'] = "Driver";
        $data['Driver'] = $Driver;
        $data['active'] = "Driver";
        $data['content'] = $this->load->view("admin/Driver/list",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function add()
    {
        $data['Drivers'] = array();
        $data['title'] = "Admin : Driver";
        $data['page_heading'] = "Driver/Add";
        $data['active'] = "Drivers";
        $data['content'] = $this->load->view("admin/Driver/add_driver",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function edit($id=0)
    {
        $data['Drivers'] =  $this->Driver_model->read_by_id($id);
        $data['title'] = "Admin : Driver";
        $data['page_heading'] = "Driver/edit";
        $data['active'] = "Driver";
        $data['content'] = $this->load->view("admin/Driver/edit_Driver",$data,true);
        $this->load->view("admin/admin_template",$data);  
    }

    public function save()
    {
        $data=array(
            'id'=>$this->input->post('id'),
            'name'=>$this->input->post('name'),
            'license_no'=>$this->input->post('license_no'),
            'adhar_no'=>$this->input->post('adhar_no'),
            'exp_date'=>$this->input->post('exp_date'),
            'phone'=>$this->input->post('phone'),
            'status'=>1,
        );
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->Driver_model->create($data);
            if($res){
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/Driver');
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->Driver_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/Driver');
            
            
            }
        }
        

    }

    public function delete($id=0)
    {
        $this->db->where('id',$id);
        $this->db->delete('Driver');
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $res = $this->Driver_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
            
            }
            
        
        }
    }
}
?>