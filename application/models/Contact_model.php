<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    private $table = "contactnew";

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



    public function insert_contact($data) {
        return $this->db->insert('contactnew', $data);
    }

   
}
