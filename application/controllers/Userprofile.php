<?php

class userProfile extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("user_product_model");

    }

    public function profile($id){        
        $user_list = $this -> session -> userdata("user_list");
        $activeuser = $user_list[$id];
        $viewData= new stdClass();
        $viewData->user= $activeuser;
        $this-> load-> model("user_product_model");

         $viewData->products=$this-> user_product_model->get_all(
            array(
                "user_id" => $activeuser->id
             )
        );
        $this->load->view("userprofile_v", $viewData);

    }
}