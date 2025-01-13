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
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/services');
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->services_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/users');
            
            
            }
        }
        

    }

    public function delete($id=0)
    {
        $this->db->where('id',$id);
        $this->db->delete('services');
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $res = $this->services_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
                redirect('admin/services');
            }
            
        
        }
    }

    public function get_services()
	{
        //  echo "<pre>";print_r($this->input->post());die();
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$searchValue = $this->input->post('search')['value'];
		$sortIndex =$this->input->post('order')[0]['column'];
		$sortby =$this->input->post('order')[0]['dir'];
		$sortColumn=null;
		$sortColumns = array(
			'0' => 'id',
			'1' => 'image',
			'2' => 'name',
			'3' => 'description',
			'4' => 'created_at',
			'5' => 'updated_at',
			'6' => 'status',
			'7' => 'created_by',
		);
		$sortColumn = isset($sortColumns[$sortIndex]) ? $sortColumns[$sortIndex] : '';
		$servicesData = $this->services_model->read_services_datatable($length, $start, $searchValue,$sortColumn,$sortby,$sortColumns);
		$filteredRecords = $this->services_model->getSearchRecordsCount($length, $start, $searchValue, $sortby, $sortColumns);
		$totalRecords = $this->services_model->read_total_count();
		$data = array();
        $count=0;
		foreach ($servicesData as $key => $row) {

			$dt = array();
			$dt[] = ++$count;
			$dt[] = $row->image;
			$dt[] = $row->name;
			$dt[] = $row->description;
			$dt[] = $row->created_at;
			$dt[] = $row->updated_at;
            $dt[] = $row->status == 1 ? 'Active' : 'Inactive';
			$dt[] = $row->created_by;
			$dt[] = "<a href='" . base_url('admin/services/edit/' . $row->id). "' class='btn btn-xs btn-success'><i class='fa fa-edit'></i></a>
					<a href='" . base_url('admin/services/delete/' . $row->id) . "' class='btn btn-xs btn-primary'><i class='fa fa-trash'></i></a>";
            $data[] = $dt;
        }
		$response = array(
			"draw" => $draw,
			"recordsTotal" => $totalRecords,
			"recordsFiltered" => $filteredRecords,
			"data" => $data,
		);
		echo json_encode($response);
	}
}
?>