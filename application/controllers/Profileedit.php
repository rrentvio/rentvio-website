<?php
class Profileedit extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('session');
    }

    public function auth($id){
        $ida = explode("%20",$id);
        $id=$ida[0];
        if (!empty($ida[1])){
            $viewer = $ida[1];
        }
        else $viewer= "settings";
        if ($viewer=="settings"){
            
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
        $this->load->view("edits_v", $viewData);}    
        
        if ($viewer=="password"){
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
            $this->load->view("editp_v", $viewData);} 
        }
        
    public function ppupdate($id){
        $config["allowed_types"] = "jpg|gif|png|webm";
        $config["upload_path"] ="assets/pictures/users";
        $this->load->library("upload",$config);
        if($this->upload->do_upload("file")){
            //upload gerçekleşir ise true çakar
            $pic_name = ($this->upload->data("file_name"));  //Dropzone dan dönen arraydan file ın name i ni çek 
            $pic_url= base_url("assets/pictures/users/$pic_name");
            $pic_data= array(
                "user_pic"  =>  $pic_url
                );
            $this->db->where("id",$id)->update("users",$pic_data);
            $this->session->unset_userdata("user_list");
            $this->reenter($id);
        }
        else{
            echo "Upload Failed!";
        }

        }
    public function nameupdate($id){
        $user_list = $this -> session -> userdata("user_list");
            $activeuser = $user_list[$id];
        $this->load->library("form_validation");
        if( md5($this->input->post('email')) != $id) {
            $is_unique =  '|is_unique[users.email]';
         } else {
            $is_unique =  '';
         }
         $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email'.$is_unique);
        $this->form_validation->set_rules("username","UserName","required|trim|min_length[4]|max_length[12]".$is_unique);
        $this->form_validation->set_rules("name","FullName","required");
        $this->form_validation->set_message(array( 
            'required' => "<b> {field} </b> is required! If you dont want to change please leave it as is  ",
            "valid_email"=>"Please enter valid <b> E-mail! </b>",
            "is_unique"=> "<b> This {field} </b> is already taken!",
        ));

        if ($this->form_validation->run() === FALSE){ 
            $this-> load-> model("user_product_model");
            $viewData= new stdClass();
            $viewData->form_error = true;
            $viewData->user= $activeuser;
            $this-> load-> model("user_product_model");
            $viewData->products=$this-> user_product_model->get_all(
                array(
                    "user_id" => $activeuser->id
                )
            );
            
            $this->load->view("edits_v",$viewData);
            }
            else{
            $referance      =$this->input->post("referance");       //maybe id alabilirim 
            $email          =$this->input->post("email");          // "name" attribute of the variable!!
            $usrName   = str_replace(" ","",$this->input->post("username"));        //sanitayzeyşın beybi 
            $fullName      = $this->input->post("name");
            $editUser = array(
                "id"            =>  $referance,
                "full_name"     =>  $fullName,
                "email"         =>  $email,
                "user_name"     =>  $usrName
            );
            $insert = $this->db->where("id",$referance)->update("users",$editUser);
            //redirect(base_url(("logout/".$referance)));   
            $this->session->unset_userdata("user_list");
            $this->reenter($activeuser->id);

                 }}

    public function passupdate($id){
        $user_list = $this -> session -> userdata("user_list");
        $activeuser = $user_list[$id];
        $this->load->library("form_validation");
        $this->form_validation->set_rules("oldpass","Password","callback_oldpassword_check|trim|min_length[4]|max_length[12]");
        $this->form_validation->set_rules("newpass","Password","matches[passconfirm]|trim|min_length[4]|max_length[12]");
        $this->form_validation->set_rules("passconfirm","Password","trim|min_length[4]|max_length[12]");
        $this->form_validation->set_message(array( 
            'required' => "<b> {field} </b> is required! If you dont want to change please leave it as is  ",
            "oldpassword_check"=>"Please enter valid <b> E-mail! </b>",
            "is_unique"=> "<b> This {field} </b> is already taken!",
            "matches"=> "New password not match !" 
        ));
        if ($this->form_validation->run() === FALSE){
            //echo validation_errors(); 
            $this-> load-> model("user_product_model");
            $viewData= new stdClass();
            $viewData->form_error = true;
            $viewData->user= $activeuser;
            $this-> load-> model("user_product_model");
            $viewData->products=$this-> user_product_model->get_all(
                array(
                    "user_id" => $activeuser->id
                )
            );
            
            $this->load->view("editp_v",$viewData);
        }
        else{
            $referance          =$this->input->post("referance");       //maybe id alabilirim 
            $pass               =md5($this->input->post("newpass"));
            
            $editUser           = array(
                "password"     =>  $pass
            );
                $this->db->where("id",$referance)->update("users",$editUser);
                //redirect(base_url(("logout/".$id)));  
                $this->session->unset_userdata("user_list");
                $this->reenter($referance);
        }
        }




    public function oldpassword_check($old_password){
            $user_list = $this -> session -> userdata("user_list");
            $pass=(reset($user_list)->password);
            foreach($user_list as $user){
                ($user->password);
            }            
            $old_password_hash = md5($old_password);
            $temp = $this->user_model->get(
                array(
                    "password"=> $pass
                ));
                $old_password_db_hash = $temp->password;
            if($old_password_hash != $old_password_db_hash)
            {
               $this->form_validation->set_message('oldpassword_check', 'Old password not match');
               return FALSE;
            } 
            return TRUE;
        }
    

    public function reenter($id){
        $user = $this->user_model->get(
            array(
                "id" => $id
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
                redirect((base_url("profile/" .md5($user -> email) )));  }   

    }

}
