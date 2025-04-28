<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote_model extends CI_Model {

    private $table = "quote";

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
        // return $this->db->where('id',$data['id'])->delete($this->table);

    return $this->db->where('id', $id)->delete($this->table);
    }

    public function checklogin($data){
       return $this->db->select('*')
       ->from($this->table)
        ->where('email',$data['email'])
        ->where('password',$data['password'])
        ->get()
        ->row();
    }
}
