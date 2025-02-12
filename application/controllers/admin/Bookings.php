<?php 
class Bookings extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/bookings_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $bookings = $this->bookings_model->read();
        $data['title'] = "Admin : Bookings";
        $data['page_heading'] = "Bookings";
        $data['booking'] = $bookings;
        $data['active'] = "Bookings";
        $data['content'] = $this->load->view("admin/Bookings/list",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function add()
    {
        $data['bookings'] = array();
        $data['title'] = "Admin : Bookings";
        $data['page_heading'] = "Bookings/Add";
        $data['active'] = "Bookings";
        $data['content'] = $this->load->view("admin/Bookings/add_booking",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function view($id=0)
    {
        $data['bookings'] =  $this->bookings_model->read_by_id($id);
        $data['title'] = "Admin : Bookings";
        $data['page_heading'] = "Bookings/view";
        $data['active'] = "Bookings";
        $data['content'] = $this->load->view("admin/Bookings/view_booking",$data,true);
        $this->load->view("admin/admin_template",$data);  
    }

    public function save()
    {
        $data=array(
            'id'=>$this->input->post('id'),
            'name'=>$this->input->post('name'),
            'phone'=>$this->input->post('phone'),
            'plan'=>$this->input->post('plan'),
            'cost'=>$this->input->post('cost'),
            'status'=>$this->input->post('status'),
           
        );
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->bookings_model->create($data);
            if($res){
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/bookings');
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->bookings_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/bookings');
            
            
            }
        }
        

    }

    public function delete($id=0)
    {
        $this->db->where('id',$id);
        $this->db->delete('bookings');
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $res = $this->bookings_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
                redirect('admin/bookings');
            }
            
        
        }
    }

    public function get_bookings()
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
		$bookingsData = $this->bookings_model->read_bookings_datatable($length, $start, $searchValue,$sortColumn,$sortby,$sortColumns);
		$filteredRecords = $this->bookings_model->getSearchRecordsCount($length, $start, $searchValue, $sortby, $sortColumns);
		$totalRecords = $this->bookings_model->read_total_count();
		$data = array();
        $count=0;
		foreach ($bookingsData as $key => $row) {

			$dt = array();
			$dt[] = ++$count;
            $dt[] = '<img src="' . base_url('assets/images/' . $row->image) . '" height="100px" width="100px">';
			$dt[] = $row->name;
			$dt[] = $row->description;
			$dt[] = $row->created_at;
			$dt[] = $row->updated_at;
            $dt[] = $row->status == 1 ? 'Active' : 'Inactive';
			$dt[] = $row->created_by;
			$dt[] = "<a href='" . base_url('admin/bookings/edit/' . $row->id). "' class='btn btn-xs btn-success'><i class='fa fa-edit'></i></a>
					<a href='" . base_url('admin/bookings/delete/' . $row->id) . "' class='btn btn-xs btn-primary'><i class='fa fa-trash'></i></a>";
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