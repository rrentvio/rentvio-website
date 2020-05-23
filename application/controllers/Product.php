<?php

Class Product extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("user_model");
        $this->load->model("user_product_model");
        $this->load->model("image_model");
    }

    public function index(){
        
    }

public function getdetails($id){
    //echo $id;
    $user_list = $this -> session -> userdata("user_list");
    if(empty($user_list)){
        $activeuserid=null;
    }
    else $activeuserid = reset($user_list)->id;
    $this->load->model("user_product_model");
    $this-> load-> model("image_model");
    $this->load->model("user_model");
    $viewData= new stdClass();
    $viewData->product_details=$this-> user_product_model->get_all(
                array(
                    "id" => $id
                 )
    );
    
    $pics=$this-> image_model->get_all(
        array(
            "product_id" => $id
         )
    );
    if(empty($pics)){
        $viewData->product_images =array();
    }
    else{
        //print_r($pics);
        $viewData->product_images =$pics;
    }
    

    $viewData->user=$this-> user_model->get(
        array(
            "id" => $activeuserid
         )
    );
    $this->load->view("product_v", $viewData);
    }
}