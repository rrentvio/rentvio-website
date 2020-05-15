
<!-- dropzone deneme amaçlı silinecek -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>     
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.min.css");?>>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/dropzone.js");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/dropzone.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dropzone/basic.css");?>">
</head>
<body>
<script src="<?php echo base_url("assets/dropzone/dropzone.js");?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src=<?php echo base_url("assets/js/bootstrap.bundle.js");?>></script>
  <h1 class ="text-center">Dropzone</h1>
<h2 class ="text-center">Deneme amaçlıdır silinecek !!! </h2>    


<div class="container">
    <?php $pid = 1; ?>
<form action=" <?php echo base_url("fileupload/upload/$pid");?>"  class= "dropzone" id="dropForm" > 
</form> 
<hr>
<h3>Kayıltı resimler</h3>

<table class="table table-bordered table-striped table-hover ">
    <thead>
        <th>Preview</th>
        <th>File Name</th>
    </thead>
    <tbody>
    <?php 
            foreach($images as $image){ ?>

        <tr>
            <td>
                <img src="<?php echo $image->pic_url;?>" alt="uff.sss">
            </td>
            <td>
                <?php echo $image->pic_name; ?>
            </td>
        </tr>


                <?php    } ?>    
    </tbody>
</table>

</div>


<script> //recursive çalışması için (sayfayı yenşlemeden çalışması adına bu script önem arz ediyor...)
    Dropzone.autoDiscover = false;
    $(function(){

        var myDropzone = new Dropzone("#dropForm");
        myDropzone.on("complete",function(file){
            console.log(file);  //to find name from console  babyyy 
            var imgname= file.name;
            var img="<img src='http://localhost/rentvio/product_images/"+imgname+"'/>";

            var tr = "<tr><td>" +img +" </td><td>"+imgname+"</td></tr>";
            $(".table tbody").append(tr)
        })
    })
</script>











</body>
</html>
