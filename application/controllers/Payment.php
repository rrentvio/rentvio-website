<?php

class Payment extends CI_Controller{
    

    public function __construct()
    {
        parent::__construct();
        $this-> load-> model("user_product_model");
        $this-> load-> model("image_model");

    }
    
    //dropzone deneme amaçlı silinecekk


    public function index(){
        $this-> load-> view("paymnet_v");
    }

}