<?php

Class Users extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("user_model");
    }

    public function index(){
        $this->load->view("login_v");
    
    }

    public function login_form(){
        $this->load->view("login_v");
    }
    public function login(){
        $this->load->library("form_validation");

        $this->form_validation->set_rules("email","E-mail","required|trim|valid_email");
        $this->form_validation->set_rules("password","Password","required|trim");
        
        $this->form_validation->set_message(array( 
            "required"=> "<b> {field} </b> can not be empty!",
            "valid_email"=>"Please enter valid <b> E-mail! </b>"
        ));


        if ($this->form_validation->run()=== FALSE){
            $viewData = new stdClass();
            $viewData->form_error = true;
            $this->load->view("login_v", $viewData);
        }
        else{
            $user = $this->user_model->get(
            array(
                "email"=> $this->input->post("email"),
                "password"=> md5($this->input->post("password"))
            )
            );
            print_r($user); 
        }

        
    }

}