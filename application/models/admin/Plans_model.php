<?php
class Plans_Model extends CI_Model
{
    
    private $table = "plans";

    public function read()
    {
        return $this->db->select("*")
        ->from($this->table)
        ->get()
        ->result();
    }

    public function read_by_id($id=0)
    {
        return $this->db->select("*")
        ->from($this->table)
        ->where('id',$id)
        ->get()
        ->row();
    }



    public function create($data=array())
    {
        return $this->db->insert($this->table,$data);
    }


    public function update($data=array())
    {
        return $this->db->where('id',$data['id'])->update($this->table,$data);
    }

    public function delete($data,$id=0)
    {
        //return $this->db->where('id',$data['id'])->delete($this->table);
        return $this->db->where('id', $id)->delete($this->table);
    }


	

    //..........Server side data table.......
	public function read_plans_datatable($length, $start, $searchValue,$sortColumn,$sortby,$sortColumns){
		
		$this->db->select("*");
		$this->db->from($this->table);
		// $this->db->where('is_deleted',0);
		if (!empty($searchValue)) {
			$columns = $this->db->list_fields($this->table);
			$this->db->group_start();
			foreach ($sortColumns as $column) {
				$this->db->or_like($column, $searchValue);
			}
			$this->db->group_end();
		}
		$this->db->order_by($sortColumn, $sortby);
		$this->db->limit($length, $start);
		$query = $this->db->get()->result();
		return $query;	
	}
	public function getSearchRecordsCount($length, $start, $searchValue, $sortby, $sortColumns){
		
		$this->db->select("*");
		$this->db->from($this->table);
		
			$this->db->group_start();
			foreach ($sortColumns as $column) {
				$this->db->or_like($column, $searchValue);
			}
			$this->db->group_end();
		

		$query = $this->db->get();
		$data = $query->result();

		$filteredRecords = $query->num_rows();
		return $filteredRecords;
	}
	public function read_total_count()
	{
		
		return $this->db->count_all_results($this->table);
	}



}
?>