<?php 
class Review extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/review_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $review = $this->review_model->read();
        $data['title'] = "Admin : Review";
        $data['page_heading'] = "Review";
        $data['review'] = $review;
        $data['active'] = "Review";
        $data['content'] = $this->load->view("admin/Review/list",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function add()
    {
        $data['reviews'] = array();
        $data['title'] = "Admin : Review";
        $data['page_heading'] = "Review/Add";
        $data['active'] = "Reviews";
        $data['content'] = $this->load->view("admin/Review/add_review",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function edit($id=0)
    {
        $data['reviews'] =  $this->review_model->read_by_id($id);
        $data['title'] = "Admin : Review";
        $data['page_heading'] = "Review/edit";
        $data['active'] = "Review";
        $data['content'] = $this->load->view("admin/Review/edit_review",$data,true);
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
            $res = $this->review_model->create($data);
            if($res){
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/login');
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->review_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/users');
            
            
            }
        }
        

    }

    public function delete($id=0)
    {
        $this->db->where('id',$id);
        $this->db->delete('review');
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $res = $this->review_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
            
            }
            
        
        }
    }
}
?>