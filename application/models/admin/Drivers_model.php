<?php
class Drivers_Model extends CI_Model
{
    
    private $table = "driver";

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



}
?>