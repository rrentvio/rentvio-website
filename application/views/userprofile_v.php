<!doctype html>
<html lang="tr" xmlns:display="http://www.w3.org/1999/xhtml" xmlns:align-items="http://www.w3.org/1999/xhtml"
      xmlns:justify-content="http://www.w3.org/1999/xhtml" xmlns:flex-direction="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Anasayfa</title>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.min.css");?>>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src=<?php echo base_url("assets/js/bootstrap.bundle.js");?>></script>

</head>
<body class=" bg-secondary" >

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href=<?php echo base_url("anasayfa/" .md5($user -> email));?>>Rentvio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo base_url("profile/" .md5($user -> email));?> > <?php echo $user->full_name; ?> </a>
        </li>
    </ul>
    <form class="form-inline ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline- my-2 my-sm-0 text-light" type="submit">Search</button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active mr-auto">
                <a class="nav-link" href=<?php echo base_url("cikis/" .md5($user -> email));?>>Exit</a>
            </li>
        </ul>
    </form>

</nav>

<div class="container card ">

    <div class="row">
        <div class="col-md-6 offset-3 ">
            <h4>Added Items</h4>
            <h4>USER PROFILE PAGE</h4>
            <table class=" table table-hover table-striped table-bordered"  >
            <thead>
               <th>#id</th>
               <th>Product Name</th>
               <th>Price</th>
               <th>Product Decrition </th>
               <th>Product Category</th>
               <th>Edit/delete</th>
            </thead>
            
            <?php 
            //print_r($products);                                               (deneme amaçlı kontrol gerekirse aktif edin pls )
            foreach ($products as $product){?>
                    <tr>
                        <td>#<?php echo $product->id ?></td>
                        <td><?php echo $product->product_name?></td>
                        <td><?php echo $product->price?></td>
                        <td><?php echo $product->product_description?></td>
                        <td><?php echo $product->product_category?></td>
                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProduct"> edit</button>
                            <a class="btn btn-danger" href=  <?php echo (base_url("deleteproductdb/" .$product->id)); ?> role="button">Delete</a> </td>
                    </tr>
                <?php }?>

            </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-anan = "dasdasd" data-target="#addProduct">
  Add Product
</button>

<!-- add product Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div>
    <form action=<?php echo(base_url("addproductdb")); ?> method="post">
  <div class="form-group">
    <label for="pName"> <b> <i>Product name</i></b> </label>
    <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter Product Name">
  </div>
  
  <div class="form-group">
    <label for="pDescription">  <b> <i>Product Description </i></b></label>
    <textarea class="form-control" id="pDescription" name="pDescription" rows="3"></textarea>
  </div>
    
  <div class="form-group">
    <label for="pCategory"> <b><i>Choose Categroy </i></b> </label>
    <select class="form-control" id="pCategory"  name="pCategory">
        <option value="1">Fotoğraf & Kamera </option>
        <option value="2">Kitap Dergi       </option>
        <option value="3">Spor Ekipmanları  </option>
        <option value="4">Bahçe & Yapı Market</option>
        <option value="5">Teknik Elektronik </option>
        <option value="6">Diğer Herşey      </option>   
    </select>
  </div>
  <div class="form-group">
    <label for="pPrice"> <b> <i>Price per hour </i></b> </label>
    <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder="EnterPrice ">
  </div>

  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="pPublish" name="pPublish">
  <label class="custom-control-label" for="pPublish"> <b><i>Publish when appored </i></b> </label>
    </div>
    <br>
  <div class="form-group">
    <label for="pImage">         <b><i>Enter product Image  </i></b>       </label>
    <input type="file" class="form-control-file" id="pImage" name="pImage">
  </div>
  

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
        <button type="submit" class="btn btn-primary">Submit</button> 
        </form>    
      </div>
        </div>
    </div>
</div>



<!-- edit product Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Product </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div>
    <form action=<?php echo(base_url("addproductdb")); ?> method="post">
  <div class="form-group">
    <label for="pName"> <b> <i>Product name</i></b> </label>
    <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter Product Name">
  </div>
  
  <div class="form-group">
    <label for="pDescription">  <b> <i>Product Description </i></b></label>
    <textarea class="form-control" id="pDescription" name="pDescription" rows="3"></textarea>
  </div>
    
  <div class="form-group">
    <label for="pCategory"> <b><i>Choose Categroy </i></b> </label>
    <select class="form-control" id="pCategory"  name="pCategory">
        <option value="1">Fotoğraf & Kamera </option>
        <option value="2">Kitap Dergi       </option>
        <option value="3">Spor Ekipmanları  </option>
        <option value="4">Bahçe & Yapı Market</option>
        <option value="5">Teknik Elektronik </option>
        <option value="6">Diğer Herşey      </option>   
    </select>
  </div>
  <div class="form-group">
    <label for="pPrice"> <b> <i>Price per hour </i></b> </label>
    <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder="EnterPrice ">
  </div>

  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="pPublish" name="pPublish">
  <label class="custom-control-label" for="pPublish"> <b><i>Publish when appored </i></b> </label>
    </div>
    <br>
  <div class="form-group">
    <label for="pImage">         <b><i>Enter product Image  </i></b>       </label>
    <input type="file" class="form-control-file" id="pImage" name="pImage">
  </div>
  

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
        <button type="submit" class="btn btn-primary">Submit</button> 
        </form>    
      </div>
        </div>
    </div>
</div>
