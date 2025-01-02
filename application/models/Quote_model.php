<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote_model extends CI_Model {

    // private $table = "quote";


    public function __construct() {
        parent::__construct();
    }

    // Save user data into the database
    // public function save($data) {
    //     return $this->db->insert('quote', $data); // 'users' is the table name
    // }


    public function save($data=array())
    {
        return $this->db->insert($this->'quote',$data);
    }
}
