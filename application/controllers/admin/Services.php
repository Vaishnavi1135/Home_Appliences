<?php 
class Services extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/services_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $services = $this->services_model->read();
        $data['title'] = "Admin : Services";
        $data['page_heading'] = "Services";
        $data['services'] = $services;
        $data['active'] = "Services";
        $data['content'] = $this->load->view("admin/Services/list",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function add()
    {
        $data['services'] = array();
        $data['title'] = "Admin : Services";
        $data['page_heading'] = "Services/Add";
        $data['active'] = "Services";
        $data['content'] = $this->load->view("admin/Services/add_services",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function edit($id=0)
    {
        $data['services'] =  $this->services_model->read_by_id($id);
        $data['title'] = "Admin : Services";
        $data['page_heading'] = "Services/edit";
        $data['active'] = "Services";
        $data['content'] = $this->load->view("admin/Services/edit_services",$data,true);
        $this->load->view("admin/admin_template",$data);  
    }

    public function save()
    {
        $data=array(
            'id'=>$this->input->post('id'),
            'image'=>$this->input->post('image'),
            'name'=>$this->input->post('name'),
            'description'=>$this->input->post('description'),
            'status'=>1,
        );
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->services_model->create($data);
            if($res){
                echo "added successfully";
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->services_model->update($data);
            if($res){
                echo "updates successfully";
            
            }
        }
        

    }

    public function delete($id=0)
    {

    }
}
?>