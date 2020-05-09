<!doctype html>
<html lang="tr" xmlns:display="http://www.w3.org/1999/xhtml" xmlns:align-items="http://www.w3.org/1999/xhtml"
      xmlns:justify-content="http://www.w3.org/1999/xhtml" xmlns:flex-direction="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Anasayfa</title>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.min.css");?>>

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
                    </tr>
                <?php }?>

            </tbody>
            </table>
        </div>
    </div>
</div>

<div>
<a class="btn btn-primary" target="_blank" href=<?php echo base_url("addproduct/" .md5($user -> email));?> role="button">Add Product</a>

</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>




