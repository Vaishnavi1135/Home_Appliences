<?php 
class Review extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/review_model'));
        if(!$this->session->userdata('isUserLoggedIn') && ($this->session->userdata('role')!==1)){
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
            'rating'=>$this->input->post('rating'),
            'status'=>1,
           
        );
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->review_model->create($data);
            if($res){
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/review');
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('id');
            $res = $this->review_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/review');
            
            
            }
        }
        

    }

    public function delete($id=0)
    {
        $this->db->where('id',$id);
        $this->db->delete('reviews');
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $res = $this->review_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
                redirect('admin/review');
            }
            
        
        }
    }

    public function get_review()
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
            '4' => 'rating',
			'5' => 'created_at',
			'6' => 'updated_at',
			'7' => 'status',
			'8' => 'created_by',
		);
		$sortColumn = isset($sortColumns[$sortIndex]) ? $sortColumns[$sortIndex] : '';
		$reviewData = $this->review_model->read_review_datatable($length, $start, $searchValue,$sortColumn,$sortby,$sortColumns);
		$filteredRecords = $this->review_model->getSearchRecordsCount($length, $start, $searchValue, $sortby, $sortColumns);
		$totalRecords = $this->review_model->read_total_count();
		$data = array();
        $count=0;
		foreach ($reviewData as $key => $row) {

           // $stars = str_repeat('<i class="fas fa-star text-warning"></i>', $row->rating);

           //$filledStars = str_repeat('<i class="fas fa-star text-warning"></i>', $row->rating); // Active stars
          // $emptyStars = str_repeat('<i class="far fa-star text-muted"></i>', 5 - $row->rating); // Inactive stars
          // $stars = $filledStars . $emptyStars; // Combine both

			$dt = array();
			$dt[] = ++$count;
            $dt[] = '<img src="' . base_url('assets/images/' . $row->image) . '" height="100px" width="100px">';
			$dt[] = $row->name;
			$dt[] = $row->description;
            $dt[] = $row->rating;
			$dt[] = $row->created_at;
			$dt[] = $row->updated_at;
            $dt[] = $row->status == 1 ? 'Active' : 'Inactive';
			$dt[] = $row->created_by;
			$dt[] = "<a href='" . base_url('admin/review/edit/' . $row->id). "' class='btn btn-xs btn-success'><i class='fa fa-edit'></i></a>
					<a href='" . base_url('admin/review/delete/' . $row->id) . "' class='btn btn-xs btn-primary'><i class='fa fa-trash'></i></a>";
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