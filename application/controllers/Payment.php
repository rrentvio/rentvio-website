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
        $this->load->view("dropbox_v");  
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
        $this->getdetailsforpayment($productid);
    }
    public function date($id){    
        $product_details=$this-> user_product_model->get_all(
            array(
                "id" => $id
            )
            );
        $rented_till= reset($product_details)->rented_till;
        //echo $rented_till;
        $datetime1 = date_create($rented_till);
        $currentDate=date_create(date("Y-m-d-h"));
        $interval = date_diff($datetime1, $currentDate);
        if ($interval->d ==1){
            $day=" day and ";
        }else $day=" days and "; 
        if ($interval->h==1){
            $hour=" hour.";
        }else $hour=" hours.";
        $return =($interval->d.$day.$interval->h.$hour); 
        return $return;
    }
    public function image($id){
        $pics=$this-> image_model->get_all(
            array(
                "product_id" => $id
            )
        );
        if(empty($pics)){
            return array();
        }
        else{
            //print_r($pics);
            return $pics;
        }
    }
    public function renterName($id){
        $product=$this-> user_product_model->get_all(array("id" => $id));
        $renter =$this-> user_model->get(array("id" => reset($product)->user_id));
        return $renter->full_name;
    }
    public function getdetailsforpayment($id){
        $user_list = $this -> session -> userdata("user_list");
        if(empty($user_list)){
            $activeuserid=null;
        }
        else $activeuserid = reset($user_list)->id;
        $viewData= new stdClass();
        $viewData->product_details=$this-> user_product_model->get_all(
                    array(
                        "id" => $id
                    )
        );
        $viewData->date=$this->date($id);
        $viewData->product_images =$this->image($id);
        $viewData->postedbyName=$this->renterName($id);
        $viewData->user=$this-> user_model->get(array("id" => $activeuserid));
        $viewData->success= true;
        $this->load->view("payment_v", $viewData);        
    }

    


}