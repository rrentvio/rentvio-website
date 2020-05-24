<?php


class User_product_model extends CI_Model{
    
    public function  __construct(){
        parent::__construct();    
    }

    public function get_all($where = array()){
        return $this->db->where($where)->get("user_product")->result();
    }
    
    public function checkStatus(){
        return $this->db->where("rented_till IS NOT NULL")->get("user_product")->result();
    } 
    public function checkStatus2($where = array()){
        return $this->db->where("")->get("user_product")->result();
    }
}