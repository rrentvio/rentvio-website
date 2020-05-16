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
    $this->load->model("user_product_model");
    $this-> load-> model("image_model");
    $this->load->model("user_model");
    $viewData= new stdClass();
    $viewData->product_details=$this-> user_product_model->get_all(
                array(
                    "id" => $id
                 )
    );
    $viewData->product_images=$this-> image_model->get_all(
        array(
            "product_id" => $id
         )
    );

    $user_id= (reset($viewData->product_details)->user_id);

    $viewData->user=$this-> user_model->get(
        array(
            "id" => $user_id
         )
    );

    $this->load->view("product_v", $viewData);

}
}