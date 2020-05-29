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

    public function searchdb($string= array()){
        foreach ($string as $element){
            $this->db->like('product_description', $element);
            $this->db->or_like('product_category', $element);
            $this->db->or_like('product_name', $element);
        }
        $query = $this->db->get('user_product');        
        return $query->result();}
}