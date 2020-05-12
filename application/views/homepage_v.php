<!doctype html>
<html lang="tr" xmlns:display="http://www.w3.org/1999/xhtml" xmlns:align-items="http://www.w3.org/1999/xhtml"
      xmlns:justify-content="http://www.w3.org/1999/xhtml" xmlns:flex-direction="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/Fonts/AIFRAGME.TTF");?>">
    

</head>
<body class=" bg-secondary" >
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

<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-10 mt-10">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link diffont" href=<?php echo base_url("anasayfa/" .md5($user -> email));?>>rentvio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo base_url("profile/" .md5($user -> email));?> > <?php echo $user->full_name; ?> </a>
        </li>
        <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-outline-light dropdown-toggle col-12 xd" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All Products
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Photograph and Video</a>
                <a class="dropdown-item" href="#">Book and Magazines</a>
                <a class="dropdown-item" href="#">Sport Equitments</a>
                <a class="dropdown-item" href="#">Home Improvemnet and Tools</a>
                <a class="dropdown-item" href="#">Technical Electronics</a>
                <a class="dropdown-item" href="#">Other Stuff</a>
              </div>
            </div>
          </li>
          
    </ul>  
 

    <ul class="navbar-nav ml-auto">
        <li class="nav-item bg-danger active">
                <a class="nav-link bgbetter" href=<?php echo base_url("cikis/" .md5($user -> email));?>>Sign In</a>
            </li>
    </ul>

    

</nav>

<div class="container card bgbetter">

    <div class="row">
        <div class="col-md-6 offset-3 ">
        <br>    
        <h4>HOME PAGE</h4>
            <br>
            
            <h4>Added Items</h4>
            
            <br><table class=" table table-hover table-striped table-bordered bgbetter"  >
            <thead>
               <th>#id</th>
               <th>Product Name</th>
               <th>Price</th>
               <th>Product Decrition </th>
               <th>Product Category</th>
            </thead>
            
            <?php 
            //print_r($products);                                               (deneme amaçlı kontrol gerekirse aktif edin pls )
            foreach ($products as $product){?>
                    <tr>
                        <td class="text-light">#<?php echo $product->id ?></td>
                        <td class="text-light"><?php echo $product->product_name?></td>
                        <td class="text-light"><?php echo $product->price?></td>
                        <td class="text-light"><?php echo $product->product_description?></td>
                        <td class="text-light"><?php echo $product->product_category?></td>
                    </tr>
                <?php }?>

            </tbody>
            </table>
        </div>
    </div>
</div>

<div>

</div>



</body>
</html>




