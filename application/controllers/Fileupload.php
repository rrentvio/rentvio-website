<?php

class fileupload extends CI_Controller{

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
    public function editProduct(){
        echo"edit product";
    }


    public function deleteProduct(){
        echo"delete  product";
    }
    

}