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

    public function addProduct(){
        $pName          = $this->input->post("pName");          // "name" attribute of the variable!!
        $pDescription   = $this->input->post("pDescription");
        $pCategory      = $this->input->post("pCategory");
        $pPrice         = $this->input->post("pPrice");
        $pPublish       = $this->input->post("pPublish");
        $pImage         = $this->input->post("pImage");

        echo"add product ", "<br>";
        echo $pName. "<br>";
        echo $pDescription. "<br>";
        echo $pCategory. "<br>";
        echo $pPrice. "<br>";
        echo $pPublish. "<br>";
        echo $pImage. "<br>";
    }
    public function editProduct($pid){
        echo"edit product <br>";
        $viewData= new stdClass();
        

        $viewData ->list = $this-> user_product_model ->get_all(
            array(
                "id" => $pid
            ) );
        print_r($viewData);
            $this->load->view("edit_v",$viewData);
    }

    

    public function deleteProduct(){
        echo"delete  product";
    }
    

}