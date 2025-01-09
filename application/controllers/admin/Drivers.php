<?php 
class Drivers extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/drivers_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }


   

    public function index()
    {
        $drivers = $this->drivers_model->read();
        $data['title'] = "Admin : Drivers";
        $data['page_heading'] = "Drivers";
        $data['active'] = "Drivers";
        $data['drivers'] = $drivers;
        $data['content'] = $this->load->view("admin/Drivers/list",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function add()
    {
        $data['drivers'] = array();
        $data['title'] = "Admin : Drivers";
        $data['page_heading'] = "Drivers/Add";
        $data['active'] = "Drivers";
        $data['content'] = $this->load->view("admin/Drivers/add_driver",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function edit($id=0)
    {
        $data['drivers'] =  $this->drivers_model->read_by_id($id);
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
            'capacity'=>$this->input->post('capacity'),
            'status'=>1,
        );
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->drivers_model->create($data);
            if($res){
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/drivers');
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->drivers_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/drivers');
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
            $res = $this->drivers_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
                redirect('admin/drivers');
            }
        }
    }

    // public function filter() {
    //     $capacity_filter = $this->input->get('capacity_filter'); // Get the filter value
    
    //     $this->load->model('Drivers_Model');
    //     if ($capacity_filter) {
    //         // Apply the filter
    //         $data['drivers'] = $this->Drivers_Model->get_filtered_drivers($capacity_filter);
    //     } else {
    //         // Fetch all drivers
    //         $data['drivers'] = $this->Drivers_Model->get_all_drivers();
    //     }
    
    //     // Pass capacity options for dropdown
    //     $data['capacity_options'] = $this->Drivers_Model->get_capacity_options();
    //     $this->load->view('admin/drivers/list', $data);
    // }
    
}
?>