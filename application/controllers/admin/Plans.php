<?php 
class Plans extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/plans_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $plans = $this->plans_model->read();
        $data['title'] = "Admin : Plans";
        $data['page_heading'] = "Plans";
        $data['active'] = "Plans";
        $data['plans'] = $plans;
        $data['content'] = $this->load->view("admin/Plans/list",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function add()
    {
        $data['plans'] = array();
        $data['title'] = "Admin : Plans";
        $data['page_heading'] = "Plans/Add";
        $data['active'] = "Plans";
        $data['content'] = $this->load->view("admin/Plans/add_plans",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function edit($id=0)
    {
        $data['plans'] =  $this->plans_model->read_by_id($id);
        $data['title'] = "Admin : Plans";
        $data['page_heading'] = "Plans/edit";
        $data['active'] = "Plans";
        $data['content'] = $this->load->view("admin/Plans/edit_plans",$data,true);
        $this->load->view("admin/admin_template",$data);  
    }

    public function save()
    {
        $data=array(
            'id'=>$this->input->post('id'),
            'plan_name'=>$this->input->post('plan_name'),
            'ammount'=>$this->input->post('ammount'),
            'services'=>$this->input->post('services'),
            'status'=>1,
        );
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->plans_model->create($data);
            if($res){
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/plans');
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->plans_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/users');
            
            }
        }
        

    }

    public function delete($id=0)
    {
        $this->db->where('id',$id);
        $this->db->delete('plans');
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $res = $this->plans_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
            
            }
            
        
        }
    }
}
?>