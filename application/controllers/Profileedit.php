<?php
class Profileedit extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function auth($id){        
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
        $this->load->view("edit_v", $viewData);
    }
    public function editusr(){

        // after sahur tasks :     form validation unutma !!
        //iki kere pass al uyuşuyomu bak 
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email","E-mail","required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password","Password","required|trim|min_length[4]|max_length[12]");
        $this->form_validation->set_rules("username","UserName","required|trim|min_length[4]|max_length[12]|is_unique[users.user_name]");

        $this->form_validation->set_message(array( 
            'required' => "<b> {field} </b> is required!",
            "valid_email"=>"Please enter valid <b> E-mail! </b>",
            "is_unique"=> "<b> This {field} </b> is already taken!"
        ));

        if ($this->form_validation->run() === FALSE){
            //echo validation_errors(); 
            $this-> load-> model("user_product_model");
            $viewData= new stdClass();
            $viewData->form_error = true;
            $this->load->view("edit_v",$viewData);
        }

        else {
            $referance      =$this->input->post("referance");       //maybe id alabilirim 
            $email          =$this->input->post("email");          // "name" attribute of the variable!!
            $usrName   = str_replace(" ","",$this->input->post("username"));        //sanitayzeyşın beybi 
            $fullName      = $this->input->post("fullname");
            $pass         = $this->input->post("password");
            $editUser = array(
                "id"            =>  $referance,
                "full_name"     =>  $fullName,
                "email"         =>  $email,
                "password"      =>  md5($pass),
                "user_name"     =>  $usrName
            );
                       

                $insert = $this->db->where("id",$referance)->update("user_model",$editUser);

                redirect(base_url("homepage/"));            
        }}


}