<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href=<?php 
     base_url("assets/css/bootstrap.min.css");?>>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src=<?php echo base_url("assets/js/bootstrap.bundle.js");?>></script>
</head>
<body>


<?php print_r($list) ?>

<form action=<?php echo(base_url("addproductdb")); ?> method="post">
  <div class="form-group">
    <label for="pName"> <b> <i>Product name</i></b> </label>
    <input type="text" class="form-control" id="pName" name="pName" placeholder=<?php  print_r($list->product_name) ?>>
  </div>
  
  <div class="form-group">
    <label for="pDescription">  <b> <i>Product Description </i></b></label>
    <textarea class="form-control" id="pDescription" name="pDescription" rows="3" placeholder=<?php  print_r($list->product_description) ?>></textarea>
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
    <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder=<?php  print_r($list->price) ?>>
  </div>

  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="pPublish" name="pPublish"  default=<?php  print_r($list->is_rented)?> >
  <label class="custom-control-label" for="pPublish"> <b><i>Publish when appored </i></b> </label>
    </div>
    <br>
  <div class="form-group">
    <label for="pImage">         <b><i>Enter product Image  </i></b>       </label>
    <input type="file" class="form-control-file" id="pImage" name="pImage">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button> 
</form>
          
    
</body>
</html>