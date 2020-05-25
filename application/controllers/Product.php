<?php

Class Product extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("user_product_model");
        $this-> load-> model("image_model");
        $this->load->model("user_model");
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
    
    public function getdetails($id){
        //echo $id;
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
        $this->load->view("product_v", $viewData);
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

    public function Rent($id){
        echo "al senin olsun.";
    }

    public function getdetailsforpayment($id){
        //echo $id;
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
        $this->load->view("payment_v", $viewData);
    }
}