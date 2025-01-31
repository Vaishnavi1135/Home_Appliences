<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('url');
        $this->load->model(array('admin/user_model'));
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('admin/login');
        }
    }

    public function index()
    {
        $users = $this->user_model->read();
        $data['users'] = $users;
        $data['title'] = "Admin : Users";
        $data['page_heading'] = "Users";
        $data['active'] = "Users";
        $data['content'] = $this->load->view("admin/User/list",$data,true);
        $this->load->view("admin/admin_template",$data);
       
        
    }
    public function add()
    {
        $data['user'] = array();
        $data['title'] = "Admin : Users";
        $data['page_heading'] = "Users/Add";
        $data['active'] = "Users";
        $data['content'] = $this->load->view("admin/User/add_user",$data,true);
        $this->load->view("admin/admin_template",$data);
    }

    public function edit($id=0)
    {
        $data['user'] =  $this->user_model->read_by_id($id);
        $data['title'] = "Admin : Users";
        $data['page_heading'] = "Users/edit";
        $data['active'] = "Users";
        $data['content'] = $this->load->view("admin/User/edit_user",$data,true);
        $this->session->set_flashdata('status','Updated successfully..!');
        $this->load->view("admin/admin_template",$data);  

    } 

    public function save()
    {
        $data=array(
            'id'=>$this->input->post('id'),
            'image'=>$this->input->post('image'),
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password')),
            // 'confirmpassword'=>md5($this->input->post('confirmpassword')),
            'phone'=>$this->input->post('phone'),
            'status'=>1,
            //'role'=> 'driver',
        );

            
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('id');
            $res = $this->user_model->create($data);
            if($res){
                $this->session->set_flashdata('status',' Added successfully..!');
                redirect('admin/users');
            
            }
            
        }else{
            $data['updated_at'] =date('Y-m-d H:i:s');
            // $data['updated_by'] =$this->session->userdata('id');
            $res = $this->user_model->update($data);
            if($res){
                $this->session->set_flashdata('status','Updated successfully..!');
                redirect('admin/users');
            
            }
        }
        
        $userData = [
            'name'     => $this->input->post('name'),
            'email'    => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'phone'    => $this->input->post('phone'),
            'role'     => 'driver',  // Assigning driver role
            'status'   => 1,
        ];
    
        // Start database transaction to ensure atomicity
        $this->db->trans_start();
    
        if ($this->input->post('id') == 0) {
            // Insert into drivers table
            $driverData['created_at'] = date('Y-m-d H:i:s');
            $driverData['created_by'] = $this->session->userdata('id');
            $driver_id = $this->drivers_model->create($driverData);
    
            // Insert into users table
            $userData['created_at'] = date('Y-m-d H:i:s');
            $userData['created_by'] = $this->session->userdata('id');
            $user_id = $this->user_model->create($userData);
        } else {
            // Update existing driver details
            $driverData['updated_at'] = date('Y-m-d H:i:s');
            $this->drivers_model->update($driverData);
    
            // Update user data as well
            $userData['updated_at'] = date('Y-m-d H:i:s');
            $this->user_model->update($userData);
        }
    
        // Complete transaction
        $this->db->trans_complete();
    
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Something went wrong!');
        } else {
            $this->session->set_flashdata('status', 'Driver saved successfully as a user!');
        }
    
        redirect('admin/drivers');
    }

    


    public function delete($id=0)
    {
        $this->db->where('id',$id);
        $this->db->delete('user');
        $res = 0;
        if($this->input->post('id')==0){
            $data['created_at'] =date('Y-m-d H:i:s');
            $res = $this->user_model->delete($data);
            if($res){
                $this->session->set_flashdata('status',' Deleted successfully..!');
                redirect('admin/users');
            }
        
        }
        
    }

    public function register(){
        $this->load->view('admin/register');  
    }

    public function forgot_pass(){
        $this->load->view('admin/forgot_pass');  
    }

    public function profile(){
        $users = $this->user_model->read();
        $data['users'] = $users;
        $data['title'] = "Admin : Users";
        $data['page_heading'] = "Users";
        $data['active'] = "Users";
        $data['content'] = $this->load->view("admin/profile",$data,true);
        $this->load->view("admin/admin_template",$data);
       

    }

    public function get_users()
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
			'3' => 'email',
			'4' => 'phone',
			'5' => 'created_at',
			'6' => 'updated_at',
			'7' => 'status',
			'8' => 'created_by',
		);
		$sortColumn = isset($sortColumns[$sortIndex]) ? $sortColumns[$sortIndex] : '';
		$userData = $this->user_model->read_user_datatable($length, $start, $searchValue,$sortColumn,$sortby,$sortColumns);
		$filteredRecords = $this->user_model->getSearchRecordsCount($length, $start, $searchValue, $sortby, $sortColumns);
		$totalRecords = $this->user_model->read_total_count();
		$data = array();
        $count=0;
		foreach ($userData as $key => $row) {

			$dt = array();
			$dt[] = ++$count;
            $dt[] = '<img src="' . base_url('assets/images/' . $row->image) . '" height="80px" width="80px">';
			$dt[] = $row->name;
			$dt[] = $row->email;
			$dt[] = $row->phone;
			$dt[] = $row->created_at;
			$dt[] = $row->updated_at;
            $dt[] = $row->status == 1 ? 'Active' : 'Inactive';
			$dt[] = $row->created_by;
			$dt[] = "<a href='" . base_url('admin/users/edit/' . $row->id). "' class='btn btn-xs btn-success'><i class='fa fa-edit'></i></a>
					<a href='" . base_url('admin/users/delete/' . $row->id) . "' class='btn btn-xs btn-primary'><i class='fa fa-trash'></i></a>";
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