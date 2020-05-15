<!doctype html>
<html lang="tr" xmlns:display="http://www.w3.org/1999/xhtml" xmlns:align-items="http://www.w3.org/1999/xhtml"
      xmlns:justify-content="http://www.w3.org/1999/xhtml" xmlns:flex-direction="http://www.w3.org/1999/xhtml">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title><?php echo$user ->name?></title>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.min.css");?>>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src=<?php echo base_url("assets/js/bootstrap.bundle.js");?>></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/dropzone.js");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/dropzone.css");?>">
</head>
<body class=" bg-secondary" >
<img src="<?php echo base_url("assets/pictures/giris.jpg");?>" alt="" class="keke" srcset="">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-10 mt-10 position-fixed wwww">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <?php 
            if (isset($user -> email)){
              echo'<a class="nav-link diffont h3 m-0 m-0 text-deneme " style="  padding: 0px 5px 0px 0px" href=';
              echo base_url("homepage/".md5($user -> email));   echo("  >Rentvio<</a>");
            }

            else{
              echo'<a class="nav-link text-bold diffont h3 m-0  text-deneme " style=" padding: 0px 5px 0px 0px" href=';
              echo base_url()." > Rentvio<</a>";
            }
            ?>
        </li>
        <li class="nav-item">
            <?php 
            if (isset($user -> email)){
              echo '<a class="nav-link fancy-font" href= ';
              echo base_url("profile/" .md5($user -> email)); echo ">",$user->full_name,"</a>";  ?> 
            <?php
            }
            else{              
              }
            ?>
          </li>
          <li class="nav-item" >
          <button type="button"  id="productadd" class="btn text-ekle-bg fancy-font ml-4" data-toggle="modal"  data-target="#addProduct" >
              Add Product
            </button>
          </li>
          </ul> 
          <ul class="navbar-nav ml-auto">
        <li class="nav-item text-deneme-bg active ">
        
        <?php 
            if (isset($user -> email)){ 
              echo'<a class="nav-link bgbetter fancy-font" href=';
              echo base_url("logout/" .md5($user -> email));?>  <?php echo">Log out</a>"; ?>
            <?php
            }
            else{
              echo'<a  class="nav-link bgbetter" href="" data-toggle="modal" data-target="#signinModal" data-whatever="buraya istediğin bir veriyi gir"  id="sign"> Log in</a>';
              //echo base_url("giris"); echo"> Signin</a>"; 
              }
            ?>
            <a  class="nav-link fancy-font d-none " data-toggle="modal" data-target="#signUp" data-whatever="buraya istediğin bir veriyi gir"  id="signup"> Sign in</a>
            </li>
    </ul>
          </nav>
<div class="container bgbetter ">


    <div class="row">
        <div class="col-md-6 offset-3">
      
         
          <div class="row">
          
          <div class="col-md-5">
          <br><br><br><br><br><br>
         
            <h4 class="fancy-font">a <?php 
            if (isset($user -> email)){
              echo '<a class="nav-link fancy-font" href= ';
              echo base_url("profile/" .md5($user -> email)); echo ">",$user->full_name,"</a>";  ?> 
            <?php
            }
            else{              
              }
            ?></h4>
            <h4 class="">Added Items</h4>
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
                        <td> <button type="button" id="edit" class="btn btn-success" data-toggle="modal" data-target="#editModal" 
                        data-prodid="<?php echo($product->id); ?>"
                        data-prodname="<?php echo($product->product_name); ?>"
                        data-proddesc="<?php echo($product->product_description); ?>"
                        data-prodprice="<?php echo($product->price); ?>" 
                        data-prodcat="<?php echo(catagory($product->product_category));?>" 
                        > Edit</button>
                            <a class="btn btn-danger" href=  <?php echo (base_url("deleteproductdb/" .$product->id)); ?> role="button">Delete</a> </td>
                    </tr>
                <?php }?>

            </tbody>
            </table>
            <div class="col-md-5 jumbotron">
              amına koyam
            </div>      
        </div>
        </div>
        </div>
    </div>
</div>


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
    <form action=<?php echo(base_url("addproductdb/" .$user -> id)); ?> method="post">
  <div class="form-group">
    <label for="pName"> <b> <i>Product name</i></b> </label>
    <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter Product Name">
    <?php if(isset($form_error)) {?>
                    <small class="float-right"><?php echo form_error("pName") ?></small>
                   <?php } ?>
  </div>
  
  <div class="form-group">
    <label for="pDescription">  <b> <i>Product Description </i></b></label>
    <textarea class="form-control" id="pDescription" name="pDescription" rows="3"></textarea>
    <?php if(isset($form_error)) {?>
                    <small class="float-right"><?php echo form_error("pDescription") ?></small>
                   <?php } ?>
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
    <?php if(isset($form_error)) {?>
                    <small class="float-right"><?php echo form_error("pCategory") ?></small>
                   <?php } ?>
  </div>
  <div class="form-group">
    <label for="pPrice"> <b> <i>Price per hour </i></b> </label>
    <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder="EnterPrice ">
    <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pPrice") ?> </b> </small>
                   <?php } ?>
    
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action=<?php echo(base_url("editproductdb/" .$user -> id)); ?> method="post">
          <div class="form-group">
            <input style=" visibility: hidden; display: none" type="text" class="form-control" name="productId" id="productId">
          </div>  

        <div class="form-group">
            <label for="pName"> <b> <i> Product name </i></b> </label>
            <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter Product Name">
            <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pName") ?> </b> </small>
                   <?php } ?>
          </div>
          
          <div class="form-group">
            <label for="pDescription">  <b> <i>Product Description </i></b></label>
            <textarea class="form-control" id="pDescription" name="pDescription" rows="3"></textarea>
            <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pDescription") ?> </b> </small>
                   <?php } ?>
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
            <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pCatagory") ?> </b> </small>
                   <?php } ?>
          </div>
          <div class="form-group">
            <label for="pPrice"> <b> <i>Price per hour </i></b> </label>
            <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder="EnterPrice ">
            <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pPrice") ?> </b> </small>
                   <?php } ?>
          </div>
          <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="isPublish" name="isPublish">
          <label class="custom-control-label" for="isPublish"> <b><i>Publish when appored </i></b> </label>
          </div>
          <br>
            <div class="form-group">
                <label for="pPicture"> <b> <i>Picture of the product </i></b> </label>
                <input type="file" class="form-control-file" id="pPicture" name="pPicture" placeholder="EnterPrice ">
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

<script>
  $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var prodId = button.data('prodid') // Extract info from data-* attributes
  var prodName = button.data('prodname')
  var prodDesc = button.data('proddesc')
  var prodPrice = button.data('prodprice')
  var prodCat = button.data('prodcat')  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body #productId ').val(prodId)
  modal.find('.modal-body #pName ').val(prodName)
  modal.find('.modal-body #pDescription ').val(prodDesc)
  modal.find('.modal-body #pCategory ').val(prodCat)
  modal.find('.modal-body #pPrice ').val(prodPrice)
})
</script>

<?php
if (isset($fromadd)){
echo '<script>
window.onload = function() {
  signupModal();
};
function signupModal() {
  document.getElementById("productadd").click();
}
</script>
';
}?>
<?php
if (isset($formedit)){
  echo '
  <script>
  window.onload = function() {
    loginModal();
  };
  function loginModal() {
    document.getElementById("edit").click();
  }
  </script>
  ';
  }

function catagory($i){
  if ($i == "Fotoğraf & Kamera") {
      return "1";
  } elseif ($i == "Kitap Dergi") {
      return "2";
  } elseif ($i == "Spor Ekipmanları") {
      return "3";
  }elseif ($i == "Bahçe & Yapı Market") {
      return "4";
  }elseif ($i == "Teknik Elektronik") {
      return "5";
  }elseif ($i == "Diğer Herşey") {
      return "6";
  }
}
?>
  
<script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
</body>
</html>