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


    public function get_drivers()
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
			'1' => 'name',
			'2' => 'license_no',
			'3' => 'adhar_no',
            '3' => 'exp_date',
            '3' => 'phone',
            '3' => 'capacity',
			'4' => 'created_at',
			'5' => 'updated_at',
			'6' => 'status',
			'7' => 'created_by',
		);
		$sortColumn = isset($sortColumns[$sortIndex]) ? $sortColumns[$sortIndex] : '';
		$driversData = $this->drivers_model->read_drivers_datatable($length, $start, $searchValue,$sortColumn,$sortby,$sortColumns);
		$filteredRecords = $this->drivers_model->getSearchRecordsCount($length, $start, $searchValue, $sortby, $sortColumns);
		$totalRecords = $this->drivers_model->read_total_count();
		$data = array();
        $count=0;
		foreach ($driversData as $key => $row) {

			$dt = array();
			$dt[] = ++$count;
			$dt[] = $row->name;
			$dt[] = $row->license_no;
			$dt[] = $row->adhar_no;
            $dt[] = $row-> exp_date;
            $dt[] = $row->phone; 
            $dt[] = $row->capacity; 
			$dt[] = $row->created_at;
			$dt[] = $row->updated_at;
            $dt[] = $row->status == 1 ? 'Active' : 'Inactive';
			$dt[] = $row->created_by;
			$dt[] = "<a href='" . base_url('admin/drivers/edit/' . $row->id). "' class='btn btn-xs btn-success'><i class='fa fa-edit'></i></a>
					<a href='" . base_url('admin/drivers/delete/' . $row->id) . "' class='btn btn-xs btn-primary'><i class='fa fa-trash'></i></a>";
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