<?php
class signUp extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("user_product_model");
        

    }

    public function addusr(){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("email","E-mail","required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password","Password","required|trim|min_length[4]|max_length[12]");
        $this->form_validation->set_rules("username","UserName","required|trim|min_length[4]|max_length[12]|is_unique[users.user_name]");

        // after sahur tasks :     form validation öğren codeigniter videosuna bakmayı unutma !!
        $this->form_validation->set_message(array( 
            'required' => "<b> {field} </b> is required!",
            "valid_email"=>"Please enter valid <b> E-mail! </b>",
            "is_unique"=> "<b> This {field} </b> is already taken!"
        ));

        if ($this->form_validation->run() === FALSE){
            //echo validation_errors(); 
            $this-> load-> model("user_product_model");
            $viewData= new stdClass();
            $viewData->products=$this-> user_product_model->get_all();
            $viewData->form_error = true;
            $viewData->fromsignup =true;
            $this->load->view("homepage_v",$viewData);
        }
        else {
            $email          =$this->input->post("email");          // "name" attribute of the variable!!
            $usrName   = str_replace(" ","",$this->input->post("username"));
            $fullName      = $this->input->post("fullname");
            $pass         = $this->input->post("password");
            $newUser = array(
                "id"            =>  null,
                "full_name"     =>  $fullName,
                "email"         =>  $email,
                "password"      =>  md5($pass),
                "user_name"     =>  $usrName
            );
                print_r($newUser);
                echo"<br>";       
                $insert = $this->db->insert("users",$newUser);
                echo"Buraya (burası signup controller )oto giriş eklenecek..";
                redirect(base_url("giris/"));            
        }}


}