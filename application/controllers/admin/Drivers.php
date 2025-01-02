<?php 
class Drivers extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/Drivers_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $Drivers = $this->Drivers_model->read();
        $data['title'] = "Admin : Drivers";
        $data['page_heading'] = "Drivers";
        $data['active'] = "Drivers";
        $data['Drivers'] = $Drivers;
        $data['content'] = $this->load->view("admin/Drivers/list",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function add()
    {
        $data['Drivers'] = array();
        $data['title'] = "Admin : Drivers";
        $data['page_heading'] = "Drivers/Add";
        $data['active'] = "Drivers";
        $data['content'] = $this->load->view("admin/Drivers/add_driver",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function edit($id=0)
    {
        $data['Drivers'] =  $this->Drivers_model->read_by_id($id);
        $data['title'] = "Admin : Drivers";
        $data['page_heading'] = "Drivers/edit";
        $data['active'] = "Drivers";
        $data['content'] = $this->load->view("admin/Drivers/edit_Driver",$data,true);
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
            $res = $this->Drivers_model->create($data);
            if($res){
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/Drivers');
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->Drivers_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/Drivers');
            
            
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
            $res = $this->Drivers_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
            
            }
            
        
        }
    }
}
?>