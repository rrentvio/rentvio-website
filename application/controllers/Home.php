<?php

class Home extends CI_Controller{
    

    public function __construct()
    {
        parent::__construct();
        $this-> load-> model("user_product_model");
        $this-> load-> model("image_model");

    }
    
    //dropzone deneme amaçlı silinecekk


    public function index(){
        $viewData= new stdClass();           
                    $viewData->images=$this-> image_model->get_all();
            $viewData->products=$this-> user_product_model->get_all();
            $this-> load-> view("homepage_v",$viewData);
            
    }
    //değişecek !!!
    public function trial(){
        
        $products = $this-> user_product_model->checkStatus();
        $currentDate=date("Y-m-d");
        echo$currentDate;
        $currentDate = explode('-', $currentDate);

        echo("<br>");
        foreach($products as $product){
            $product_date= explode("-",$product->rented_till);
            $y= (int)$product_date[0]-(int)$currentDate[0];
            $m= (int)$product_date[1]-(int)$currentDate[1];
            $d= (int)$product_date[2]-(int)$currentDate[2];
            $inDays = $y*365+$m*30+$d; 
            echo($inDays." days till lease expiry date! <br>");

            echo("<small>Please obey the terms and conditions for your own good... </small>");
            echo("<br>");
        }
        
    }
    public function homepage($id){          
        $user_list = $this -> session -> userdata("user_list");
        if (isset( $user_list[$id])){
             $activeuser = $user_list[$id];
             $viewData= new stdClass();
            $this-> load-> model("image_model");
            $viewData->images=$this-> image_model->get_all();
        $viewData->user= $activeuser;

        $this-> load-> model("user_product_model");

        $viewData->products=$this-> user_product_model->get_all();
        $this-> load-> view("homepage_v",$viewData);
        }
        else{
            $viewData= new stdClass(); 
            $this-> load-> model("image_model");
            $viewData->images=$this-> image_model->get_all();          
            $this-> load-> model("user_product_model");
             $viewData->products=$this-> user_product_model->get_all();
            $this-> load-> view("homepage_v",$viewData);
        }
    }

}