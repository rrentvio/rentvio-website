<?php

class Home extends CI_Controller{
    

    public function __construct()
    {
        parent::__construct();
        $this-> load-> model("user_product_model");
        $this-> load-> model("image_model");

    }
    
    public function index(){
        $this->checkproducts();
        $viewData= new stdClass();           
            $viewData->images=$this-> image_model->get_all();
            $viewData->products=$this-> user_product_model->get_all();
            $this-> load-> model("image_model");
            $viewData->images=$this-> image_model->get_all();
            $this-> load-> view("homepage_v",$viewData);
    }

    public function makeitnull($id){
        $editproduct           = array(
            "renter_id"     =>  null,
            "rented_till"   =>  null
        );
        $this->db->where("id",$id)->update("user_product",$editproduct);
    }

    public function checkproducts(){
    
        $products=$this-> user_product_model->get_all();
        $currentDate=date("Y-m-d");
        foreach($products as $product ){   
            $date= $product->rented_till;
            if ($date==$currentDate){
                $this->makeitnull($product->id);
            }
        }
    }

    public function homepage($id){
        $this->checkproducts();
        $user_list = $this -> session -> userdata("user_list");
        if (isset( $user_list[$id])){
             $activeuser = $user_list[$id];
             $viewData= new stdClass();
            $this-> load-> model("image_model");
            $viewData->images=$this-> image_model->get_all();
        $viewData->user= $activeuser;

        $this-> load-> model("user_product_model");

        $viewData->products=$this-> user_product_model->get_all();
        $this-> load-> view("homepage_v",$viewData);
        }
        else{
            $viewData= new stdClass(); 
            $this-> load-> model("image_model");
            $viewData->images=$this-> image_model->get_all();          
            $this-> load-> model("user_product_model");
             $viewData->products=$this-> user_product_model->get_all();
            $this-> load-> view("homepage_v",$viewData);
        }
    }
    public function searchbar(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("searchBar","Search-Bar","trim|alpha_numeric_spaces");
        $this->form_validation->set_message(array( 
            "required"=> "<b> {field} </b> can not be empty!",
            "alpha_numeric_spaces"=>"Please Don't use seachbar with symbols !"
        ));

        if ($this->form_validation->run()=== FALSE){
            $viewData = new stdClass();
            $viewData->form_error = true;
            $viewData->fromsearch= $this->input->post("searchBar");
            $viewData->products=$this-> user_product_model->get_all();
            $viewData->images=$this-> image_model->get_all();
            $this->load->view("homepage_v", $viewData);
        }
        else{
                $searchWord = $this->input->post("searchBar");
                $category = $this->input->post("searchCategory");
                $searchArray= explode(" ",$searchWord);
                $viewData = new stdClass();
                $result=$this-> user_product_model-> searchdb($searchArray);
                $viewData->products = $this->catselector($result,$category);
                $viewData->images=$this-> image_model->get_all();
                $this->load->view("homepage_v", $viewData);

            }
    }
    public function catselector($resultarray,$category){
        /*   foreach($resultarray as $result){
            if($result->product_category==$category){
                unset($resultarray->$result);
            }
            return $resultarray;
        }*/
        if ($category=="*"){
            return $resultarray;
        }
        else{
        $len = count($resultarray);
        for ($i=0; $i<$len ;$i++){
            if($resultarray[$i]->product_category!==$category){
                unset($resultarray[$i]);
                    }
                }
        return $resultarray;
            }
    }

}