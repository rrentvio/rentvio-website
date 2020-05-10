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

    public function catagory($i){
        if ($i == "1") {
            return "Fotoğraf & Kamera";
        } elseif ($i == "2") {
            return "Kitap Dergi";
        } elseif ($i == "3") {
            return "Spor Ekipmanları";
        }elseif ($i == "4") {
            return "Bahçe & Yapı Market";
        }elseif ($i == "5") {
            return "Teknik Elektronik";
        }elseif ($i == "6") {
            return "Diğer Herşey";
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

        $pName          = $this->input->post("pName");          // "name" attribute of the variable!!
        $pDescription   = $this->input->post("pDescription");
        $pCategory      = $this->catagory($this->input->post("pCategory"));
        $pPrice         = $this->input->post("pPrice");
        $pPublish       = $this->input->post("pPublish");
        $pImage         = $this->input->post("pImage");

        
        $newProduct = array(
            "id"                    =>  null,
            "user_id"               =>  $uid,
            "product_name"          =>  $pName,
            "price"                 =>  $pPrice,
            "product_description"   =>  $pDescription,
            "product_category"      =>  $pCategory,
            "publish"             =>  isSet($pPublish),
            "product_picture"       =>  0
        );

        $insert = $this->db->insert("user_product",$newProduct);
        redirect(base_url("profile/"));
        }

        
    public function editProduct($uid){
        $pId            = $this->input->post("productId");  
        $pDescription   = $this->input->post("pDescription");
        $pName          = $this->input->post("pName");          // "name" attribute of the variable!!
        $pCategory      = $this->catagory($this->input->post("pCategory"));
        $pPrice         = $this->input->post("pPrice");
        $pPublish       = $this->input->post("isPublish");
        $pImage         = $this->input->post("pImage");

        $newProduct = array(
            "id"                    =>  $pId,
            "user_id"               =>  $uid,
            "product_name"          =>  $pName,
            "price"                 =>  $pPrice,
            "product_description"   =>  $pDescription,
            "product_category"      =>  $pCategory,
            "publish"               =>  isSet($pPublish),
            "product_picture"       =>  null
        );

        $insert = $this->db->where("id",$pId)->update("user_product",$newProduct);
        redirect(base_url("profile/"));
        }

    public function deleteProduct($did){

        $this->db->where("id",$did)->delete("user_product");
        redirect(base_url("profile/"));
        }
    

}

