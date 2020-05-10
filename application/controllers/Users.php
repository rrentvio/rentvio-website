<?php

Class Users extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("user_model");
        $this->load->library('session');
    }

    public function index(){
        $user_list=  $this->session->userdata("user_list");
        if ( $user_list){
              $user = reset($user_list);
              redirect(base_url("anasayfa/".md5($user->email)));
        }
        else{
            redirect(base_url("giris"));
        }
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

            if ($user){
                if ($this -> session -> userdata("user_list")){                 //eğer userlist diye bi array varsa:
                    $user_list= $this->session->userdata("user_list");          //userlist i çek bu seesionda  yani bir user_list oluştur onun içine eski verileri ata
                    
                }
                else                                                            //eğer userlist diye bi array yoksa: 
                {
                    $user_list = [];                                            //user_list diye boş bir array oluştur
                }
                $user_list[md5($user -> email)] =$user;                              //(her koşulda )userlistin içine yeni user değerlerini ekle.
                $this->session->set_userdata("user_list", $user_list);          // bir sonraki session için userlist arrayini user_data da update et 
    
                //print_r($user_list);  
                redirect((base_url("anasayfa/" .md5($user -> email) )));                                         // usr list arrayini yazdır 
            }else{
                $this->load->view("login_v");
                echo '<script language="javascript">';
                echo 'alert("Username or password not found! ")';
                echo '</script>';
                

            }

             
        }

        
    }


    public function logout($id){
        $user_list= $this->session->userdata("user_list");
        unset ($user_list[$id]);
        $this->session->set_userdata("user_list",$user_list);
        //redirect(base_url("users/listt")); // kontrol amaçlı ileride alttakiyle değiştir. v8 
        redirect(base_url("giris"));
    }

    public function sil(){
        $this->session->unset_userdata("user_list");
    }

    //listt function check amaçlı sonra sil 
    
    public function listt(){
        echo "users still online: "; 
        echo "<br/><br/>";
        echo "<br/><br/>";

        $user_list= $this->session->userdata("user_list");
        if (!$user_list){
            echo"no user active";
        }
        else{
        foreach ($user_list as $id){

            print_r($id->email);
            echo "<br/><br/>";
            }
        }

    }



}