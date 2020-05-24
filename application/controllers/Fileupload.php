<?php
class fileupload extends CI_Controller{

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("user_product_model");
        
    

    }

    public function index (){
        $this->load->view("addproduct");

    }
    public function send($viewData){
        $user_list=  $this->session->userdata("user_list");
        if ( $user_list){
            $user = reset($user_list);
            $email=md5($user->email);
          }
          else{
              redirect(base_url("homepage"));
          }
            $user_list = $this -> session -> userdata("user_list");
            $activeuser = $user_list[$email];
            $viewData->user= $activeuser;
            $this-> load-> model("user_product_model");
    
             $viewData->products=$this-> user_product_model->get_all(
                array(
                    "user_id" => $activeuser->id
                 )
            );
            $this->load->view("userprofile_v", $viewData);
    }
    public function catagory($i){
        if ($i == "1") {
            return "Photograph and Video";
        } elseif ($i == "2") {
            return "Book and Magazines";
        } elseif ($i == "3") {
            return "Sport Equitments";
        }elseif ($i == "4") {
            return "Home Improvemnet and Tools";
        }elseif ($i == "5") {
            return "Technical Electronics";
        }elseif ($i == "6") {
            return "Everything Else";
        }
        
    }
    public function isSet($i){
        if ($i== null&&$i==0&&$i=="0"&&$i==""){
            return 0;
        }
        else{
            return 1;
        }
    }
    public function addProduct($uid){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("pName","Product Name","required|trim");
        $this->form_validation->set_rules("pDescription","Product Description","required|trim");    
        $this->form_validation->set_rules("pPrice","Price","required|trim|numeric");
        // after sahur tasks :     form validation öğren codeigniter videosuna bakmayı unutma !!
        $this->form_validation->set_message(array( 
            'required' => "<b> {field} </b> area required!",
            "numeric"=>"Please separate the fractioned prices with the '.' symbol."
        ));
        $viewData= new stdClass();
        if ($this->form_validation->run() === FALSE){
            //echo validation_errors(); 
            $this-> load-> model("user_product_model");
            
            $viewData->products=$this-> user_product_model->get_all();
            $viewData->form_error = true;
            $viewData->fromadd= true;
            $this->send($viewData);
            //$this->load->view("homepage_v",$viewData);
        }
        else{

        $pName          = $this->input->post("pName");          // "name" attribute of the variable!!
        $pDescription   = $this->input->post("pDescription");
        $pCategory      = $this->catagory($this->input->post("pCategory"));
        $pPrice         = $this->input->post("pPrice");
        $pPublish       = $this->input->post("pPublish");

        
        $newProduct = array(
            "id"                    =>  null,
            "user_id"               =>  $uid,
            "product_name"          =>  $pName,
            "price"                 =>  $pPrice,
            "product_description"   =>  $pDescription,
            "product_category"      =>  $pCategory,
            "publish"             =>  isSet($pPublish)
        );

        $insert = $this->db->insert("user_product",$newProduct);
        //redirect(base_url("profile"));                            //Deneme 
        $this->send($viewData);
        }
    }    
    public function editProduct($uid){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("pName","Product Name","required|trim");
        $this->form_validation->set_rules("pDescription","Product Description","required|trim");    
        $this->form_validation->set_rules("pPrice","Price","required|trim|numeric");
        // after sahur tasks :     form validation öğren codeigniter videosuna bakmayı unutma !!
        $this->form_validation->set_message(array( 
            'required' => "<b> {field} </b> area required!",
            "numeric"=>"Please separate the fractioned prices with the '.' symbol."
        ));
        $viewData= new stdClass();
        if ($this->form_validation->run() === FALSE){
            //echo validation_errors(); 
            $this-> load-> model("user_product_model");
            $viewData->formedit= true;
            $viewData->products=$this-> user_product_model->get_all();
            $viewData->form_error = true;
            $this->send($viewData);
            //$this->load->view("homepage_v",$viewData);
        }

        else{
        $pId            = $this->input->post("productId");  
        $pDescription   = $this->input->post("pDescription");
        $pName          = $this->input->post("pName");          // "name" attribute of the variable!!
        $pCategory      = $this->catagory($this->input->post("pCategory"));
        $pPrice         = $this->input->post("pPrice");
        $pPublish       = $this->input->post("isPublish");

        $editProduct = array(
            "id"                    =>  $pId,
            "user_id"               =>  $uid,
            "product_name"          =>  $pName,
            "price"                 =>  $pPrice,
            "product_description"   =>  $pDescription,
            "product_category"      =>  $pCategory,
            "publish"               =>  isSet($pPublish),
        );

        $insert = $this->db->where("id",$pId)->update("user_product",$editProduct);
        redirect(base_url("profile/"));
        }
    }

    public function deleteProduct($did){

        $this->db->where("id",$did)->delete("user_product");
        $this->deleteAll($did);
        redirect(base_url("profile/"));
    }
    
    public function getImages($id){
        $viewData= new stdClass();
        $viewData->imageget= true;
        $viewData->productId= $id;

        $this-> load-> model("image_model");
             $viewData->images=$this-> image_model->get_all(
                array(
                    "product_id" => $id
                 )
            );
        $this->send($viewData);
    }

    public function deleteAll($pid){
        $this->db->where("product_id",$pid)->delete("images");    
    }   

    public function deletedropzone($id){
        $this->load->model("image_model");
        $a=$this-> image_model->get_all(
            array(
                "id" => $id
             )
        );

        $pid=(reset($a)->product_id);
        $this->db->where("id",$id)->delete("images");
        $this->getImages($pid);    
    }

    public function dropzone($pid){

        $config["allowed_types"] = "jpg|gif|png|webm";
        $config["upload_path"] ="product_images/";

        $this->load->library("upload",$config);

        if($this->upload->do_upload("file")){
            //upload gerçekleşir ise true çakar
            $pic_name = ($this->upload->data("file_name"));  //Dropzone dan dönen arraydan file ın name i ni çek 
            $pic_data= array(
                "pic_name" => $pic_name,
                "pic_url" => base_url("product_images/$pic_name"),
                "product_id"=> $pid
            );
            $insert = $this->db->insert("images",$pic_data);
        }
        else{
            echo "Upload Failed!";
        }

    }


    }

