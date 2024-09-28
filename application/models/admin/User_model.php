
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model
{
    
    private $table = "user";

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

    public function delete($id=0)
    {

        
    }

    public function checklogin($data){
       return $this->db->select('*')
       ->from($this->table)
        ->where('email',$data['email'])
        ->where('password',$data['password'])
        // ->where('confirmpassword',$data['confirmpassword'])
        ->get()
        ->row();
    }



}
?>