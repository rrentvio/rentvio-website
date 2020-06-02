<?php

class userProfile extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("user_product_model");

    }
    public function index(){
        $user_list=  $this->session->userdata("user_list");
        if ( $user_list){
              $user = reset($user_list);
              redirect(base_url("profile/".md5($user->email)));
        }
        else{
            redirect(base_url("homepage"));
        }
    }
    public function profile($id){      
        $exp= explode("%20",$id);
        $id=$exp[0];
        $user_list = $this -> session -> userdata("user_list");
        $activeuser = $user_list[$id];
        $viewData= new stdClass();
        $viewData->user= $activeuser;
        if ( !empty($exp[1])){
        //echo$exp[1];
        $viewData->rented = true;
        $this-> load-> model("user_product_model");
        $viewData->products=$this-> user_product_model->get_all(
            array(
                "renter_id" => $activeuser->id
             )
        );
        }
        else {
            $this-> load-> model("user_product_model");
            $viewData->products=$this-> user_product_model->get_all(
                array(
                    "user_id" => $activeuser->id
                 )
            );
        }  
        
        
        $this->load->view("userprofile_v", $viewData);
    }

}