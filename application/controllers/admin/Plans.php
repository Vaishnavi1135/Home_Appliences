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
                redirect('admin/plans');
            
            }
            
        
        }
    }

    //..server side data table....
	public function get_plans()

	{

         echo "<pre>";print_r($this->input->post());die();
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$searchValue = $this->input->post('search')['value'];
		$sortIndex =$this->input->post('order')[0]['column'];
		$sortby =$this->input->post('order')[0]['dir'];
		$sortColumn=null;
		$sortColumns = array(
			'0' => 'id',
			'1' => 'plan_name',
			'2' => 'ammount',
			'3' => 'services',
			'4' => 'created_at',
			'5' => 'updated_at',
			'6' => 'status',
			'7' => 'created_by',
			
			
			
		
		);
		$sortColumn = isset($sortColumns[$sortIndex]) ? $sortColumns[$sortIndex] : '';
		$patientsData = $this->plans_model->read_patients_datatable($length, $start, $searchValue,$sortColumn,$sortby,$sortColumns);
		$filteredRecords = $this->plans_model->getSearchRecordsCount($length, $start, $searchValue, $sortby, $sortColumns);
		$totalRecords = $this->plans_model->read_total_count();
		$data = array();
		foreach ($plans as $key => $row) {
			$dt = array();
			$dt[] = ++$count;
			$dt[] = $row->plan_name;
			$dt[] = $row->ammount;
			$dt[] = $row->services;
			$dt[] = $row->created_at;
			$dt[] = $row->updated_at;
			$dt[] = $row->created_by;
			$dt[] = $row->status == 1 ? display('Active') : display('Inactive');
			$dt[] = "<a href='" . base_url('admin/plans/delete/' . $plans->id). "' class='btn btn-xs btn-success'><i class='fa fa-eye'></i></a>
					<a href='" . base_url('admin/plans/edit/' . $plans->id) . "' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i></a>";
					// <a href='" . base_url('practice/patient/prescription/create'. '?pid=' . encrypt($row->patient_id)) . "' class='btn btn-xs btn-warning' title='Create Prescription'><i class='fa fa-plus'></i></a> ";
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