<?php

class Home extends CI_Controller{
    

    public function __construct()
    {
        parent::__construct();
    }

    public function homepage($id){
        
        $user_list = $this -> session -> userdata("user_list");
        $activeuser = $user_list[$id];
        $viewData= new stdClass();
        $viewData->user= $activeuser;

        $this-> load-> view("homepage_v",$viewData);


    }
}