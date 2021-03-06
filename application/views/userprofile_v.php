<!doctype html>
<html lang="tr" xmlns:display="http://www.w3.org/1999/xhtml" xmlns:align-items="http://www.w3.org/1999/xhtml"
      xmlns:justify-content="http://www.w3.org/1999/xhtml" xmlns:flex-direction="http://www.w3.org/1999/xhtml">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title> <?php echo ($user ->full_name) ?></title>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.min.css");?>>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/dropzone.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/basic.css");?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src=<?php echo base_url("assets/js/bootstrap.bundle.js");?>></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="<?php echo base_url("assets/dropzone/dropzone.js");?>"></script>
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
          <button type="button"  id="productadd" class="btn text-deneme-bg fancy-font ml-4 text-white" data-toggle="modal"  data-target="#addProduct" >
              Add Product &nbsp;&nbsp; <i class="fas fa-folder-plus fa-lg "></i>
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
            </li>
    </ul>
          </nav>

          <script type="text/javascript">
    $(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>

          <div class="container bgbetter ">
    <div class="row">
      
         <div class="col-md-12 ">
          
          <br><br><br><br><br>
          <div class="row">
          <div class="col-md-4">
          <a href=" <?php echo base_url("pedit/".md5($user -> email))?>"> <img src="<?php 
            if ($user->user_pic == null)
            echo base_url("assets/pictures/users/nousrpp.png");
            else echo ($user->user_pic);
            ?>" class="userr-image float-right rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Edit Profile" alt=""> </a>
            </div>
            <div class="col-md-6">
              <h1 class="fancy-font text-left mt-3 ml-4"><?php 
            if (isset($user -> email)){
              echo '<a class=" fancy-font text-white"';
              echo base_url("profile/" .md5($user -> email)); 
              echo ">",$user->full_name, "</a>";  ?> <br>  
              
            <?php
            }
            else{              
              }
            ?>
         
          </h1>
          </div>
          </div>
            <a type="button" href="<?php echo base_url("profile/".md5($user->email)); ?>" class="btn btn-info text-pubrent-bg text-white offset-4 mr-5 customwidth2">Published Items</a>
            <a type="button" href="<?php echo base_url("profile/".md5($user->email)." rented" ); ?>" class="btn btn-info text-pubrent-bg text-white customwidth2">Rented Items</a>
            <br><br>
            <table class=" table table-hover text-deneme-bg ">
            <thead>
              <th class="text-white fancy-font font-weight-normal lead">Product Name</th>
              <th class="text-white fancy-font font-weight-normal lead">Product Description</th>
              <th class="text-white fancy-font font-weight-normal lead">Price</th>
              <th class="text-white fancy-font font-weight-normal lead">Cathegory</th>
              <?php if(!isset($rented)) echo '<th class="text-white fancy-font font-weight-normal text-center lead">Update</th>'; ?> 
            </thead>
            <?php foreach ($products as $product){?>
            <tbody>                    
                    <tr>
                        <td data-href="<?php echo base_url( "product/".$product->id);  ?>"
                         class="text-white fancy-font pointer "><?php echo substr($product->product_name,0,22) ?>...</td>
                        <td data-href="<?php echo base_url( "product/".$product->id);  ?>" class="text-white fancy-font pointer" ><?php echo substr($product->product_description,0,18)?> ...</td>
                        <td data-href="<?php echo base_url( "product/".$product->id);  ?>" class="text-white fancy-font pointer" ><?php echo $product->price?> $</td>
                        <td data-href="<?php echo base_url( "product/".$product->id);  ?>" class="text-white fancy-font pointer" ><?php echo $product->product_category?></td>
                        <td class="text-white fancy-font pointer text-center <?php if(isset($rented)) echo"d-none "?>"> 
                        
                        
                        <button type="button" id="edit" class=" <?php if(isset($rented)) echo"d-none "?> btn btn-warning mr-3 text-edit-bg text-white customwidth" data-toggle="modal" data-target="#editModal" 
                        data-prodId="<?php echo($product->id); ?>"
                        data-prodname="<?php echo($product->product_name); ?>"
                        data-proddesc="<?php echo($product->product_description); ?>"
                        data-prodprice="<?php echo($product->price); ?>" 
                        data-prodcat="<?php echo(catagory($product->product_category));?>" 
                        > Edit &nbsp; <i class="far fa-edit"></i></button>
                            <a class="<?php if(isset($rented)) echo"d-none "?>  btn btn-danger customwidth text-sil-bg mr-3 " href=  <?php echo (base_url("deleteproductdb/" .$product->id)); ?> role="button">Delete &nbsp;<i class="far fa-trash-alt"></i></a> 
                            <a  class="nav-link fancy-font d-none " data-toggle="modal"  data-prodId="<?php echo($product->id); ?>" data-target="#imageUpload"  id="ioad">hidden modal sender</a>
                            <a type="button"  id="imagload" href="<?php echo base_url("fileupload/getImages/$product->id")?>" class="<?php if(isset($rented)) echo"d-none "?>  btn text-pictures-bg text-white customwidth mr-0">Pictures &nbsp; <i class="far fa-image"></i></a>
                          </td>
                    </tr>
                <?php }?>
            </tbody>
            </table> 
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
    <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter Product Name" required > 
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
        <option value="1">Photograph and Video </option>
        <option value="2">Book and Magazines </option>
        <option value="3">Sport Equipments </option>
        <option value="4">Home Improvemnet and Tools </option>
        <option value="5">Technical Electronics </option>
        <option value="6">Everything Else </option>   
    </select>
    <?php if(isset($form_error)) {?>
                    <small class="float-right"><?php echo form_error("pCategory") ?></small>
                   <?php } ?>
  </div>
  <div class="form-group">
    <label for="pPrice"> <b> <i>Price per Day </i></b> </label>
    <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder="EnterPrice " required>
    <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pPrice") ?> </b> </small>
                   <?php } ?>
    
  </div>

  <div class="custom-control  d-none custom-switch">
  <input type="checkbox" class="custom-control-input" id="pPublish" name="pPublish">
  <label class="custom-control-label " for="pPublish"> <b><i>Publish when appored </i></b> </label>
    </div>
    <br>
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
            <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter Product Name" required>
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
                <option value="1">Photograph and Video </option>
                <option value="2">Book and Magazines </option>
                <option value="3">Sport Equipments </option>
                <option value="4">Home Improvemnet and Tools </option>
                <option value="5">Technical Electronics </option>
                <option value="6">Everything Else </option>   
            </select>
            <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pCatagory") ?> </b> </small>
                   <?php } ?>
          </div>
          <div class="form-group">
            <label for="pPrice"> <b> <i>Price per Day </i></b> </label>
            <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder="EnterPrice " required>
            <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pPrice") ?> </b> </small>
                   <?php } ?>
          </div>
          <div class="custom-control d-none custom-switch">
          <input type="checkbox" class="custom-control-input" id="isPublish" name="isPublish">
          <label class="custom-control-label " for="isPublish"> <b><i>Publish when appored </i></b> </label>
          </div>
          <br>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
        <button type="submit" class="btn btn-primary">Submit</button> 
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Image upload modal -->

<div class="modal fade" id="imageUpload" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="container">
        <form action="<?php echo base_url("dropzone/$productId")?>"
          class="dropzone"
          id="pimageDropzone">
        </form>
        <hr>
        <h3>Product Pictures</h3>
        <table class="table table-bordered table-striped table-hover ">
            <thead>
                <th>Preview</th>
                <th>File Name</th>
                <th>Remove</th>

            </thead>
            <tbody class="newImage">
            <small>Press <b><i>Submit</i></b> to see newly added pictures. </small>
            <?php
            foreach($images as $image){ ?>
                <tr>
                    <td class="dropzoneimageClass" >
                        <img class=" newImage  " src="<?php echo $image->pic_url;?>" alt="Picture URL">
                    </td>
                    <td class ="dropzoneimageNameClass">
                        <?php echo substr($image->pic_name,0,15)."..."; ?>
                    </td>
                    <td>
                    <a class="btn btn-danger customwidth text-sil-bg mr-3 " href=  <?php echo (base_url("deleteimage/" .$image->id)); ?> role="button">Delete &nbsp;<i class="far fa-trash-alt"></i></a>
                    </td>
                </tr><?php }?>    
            </tbody>
        </table>
    </div>
    </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
        <a  type ="button" class="btn btn-primary"  href="<?php echo(base_url("profile/".md5($user->email))); ?> ">Upload</a>
      </div>
    </div>
    </div>
  </div>



<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
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
            <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter Product Name" required>
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
              <option value="1">Photograph and Video </option>
              <option value="2">Book and Magazines </option>
              <option value="3">Sport Equipments </option>
              <option value="4">Home Improvemnet and Tools </option>
              <option value="5">Technical Electronics </option>
              <option value="6">Everything Else </option>  
            </select>
            <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pCatagory") ?> </b> </small>
                   <?php } ?>
          </div>
          <div class="form-group">
            <label for="pPrice"> <b> <i>Price per Day </i></b> </label>
            <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder="EnterPrice " required>
            <?php if(isset($form_error)) {?>
                    <small class="float-right"> <b> <?php echo form_error("pPrice") ?> </b> </small>
                   <?php } ?>
          </div>
          <div class="custom-control d-none custom-switch">
          <input type="checkbox" class="custom-control-input" id="isPublish" name="isPublish">
          <label class="custom-control-label" for="isPublish"> <b><i>Publish when appored </i></b> </label>
          </div>
          <br>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
        <button type="submit" class="btn btn-primary">Submit</button> 
        </form>
      </div>
    </div>
  </div>
</div>






  <!--Scriptleri LÜTFEN .js yapıp içine alırmısın ?  -->


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


<script>
  $('#imageUpload').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var prodId = button.data('prodid') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body #productId ').val(prodId)
})
</script>
<script>
  //table row to href 
$('td[data-href]').on("click", function() {
    document.location = $(this).data('href');
});
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
}

if (isset($imageget)){
  echo '<script>
window.onload = function() {
  signupModal();
};
function signupModal() {
  document.getElementById("ioad").click();
}
</script>
';
}

?>
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
  if ($i == "Photograph and Video") {
      return "1";
  } elseif ($i == "Book and Magazines") {
      return "2";
  } elseif ($i == "Sport Equipments") {
      return "3";
  }elseif ($i == "Home Improvemnet and Tools") {
      return "4";
  }elseif ($i == "Technical Electronics") {
      return "5";
  }elseif ($i == "Everything Else") {
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

