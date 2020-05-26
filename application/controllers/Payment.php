<?php

class Payment extends CI_Controller{
    

    public function __construct()
    {
        parent::__construct();
        $this-> load-> model("user_product_model");
        $this-> load-> model("user_model");
        $this-> load-> model("image_model");

    }
    

    public function index(){
        $this-> load-> view("paymnet_v");
    }

    public function addb($id){
        $productid = $this->input->post("prodId");
        $rentDays = $this->input->post("rentDays");
        $date=date("Y-m-d");
        $rented_till = date('Y-m-d', strtotime($date. ' + '.$rentDays.' days'));
        $editproduct           = array(
            "renter_id"     =>  $id,
            "rented_till"   =>  $rented_till
        );
        $this->db->where("id",$productid)->update("user_product",$editproduct);
    }

    


}