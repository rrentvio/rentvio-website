<?php

class Home extends CI_Controller{
    

    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $viewData= new stdClass();           
            $this-> load-> model("user_product_model");
             $viewData->products=$this-> user_product_model->get_all();
            $this-> load-> view("homepage_v",$viewData);
            
    }
    public function homepage($id){        
        $user_list = $this -> session -> userdata("user_list");
        if (isset( $user_list[$id])){
             $activeuser = $user_list[$id];
             $viewData= new stdClass();
        $viewData->user= $activeuser;

       
        $this-> load-> model("user_product_model");

         $viewData->products=$this-> user_product_model->get_all();
        $this-> load-> view("homepage_v",$viewData);
        }
        else{
            $viewData= new stdClass();           
            $this-> load-> model("user_product_model");
             $viewData->products=$this-> user_product_model->get_all();
            $this-> load-> view("homepage_v",$viewData);
        }

    }

    
}