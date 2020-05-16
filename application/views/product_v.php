<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo(reset($product_details)->product_name);?> </title>
</head>
<body>
    <h1>
    <?php 
    if (isset($product_details)){
        $product_details= reset($product_details);
        
        //berke bunları takıl işte resim için bir slayt tarzı bişe yap + bu verileri kullanarak sayfayı tasarla 
        $id=$product_details->id;
        $postedby=$product_details->user_id;
        $name=$product_details->product_name;
        $price=$product_details->price;
        $description=$product_details->product_description;
        $category=$product_details->product_category;
        $renterid=$product_details->renter_id;
        $uploaddate=$product_details->upload_date;
        echo("id= ".$id."<br>");
        echo("Posted by (user id )= ".$postedby." <br> ");
        echo("fiyat bilgisi= ".$price."<br>");
        echo("açıklama= ".$description."<br>");
        echo("bunu kullanmayacağız büyük ihtimalle ama kiralayan kişinin is si = ".$renterid."<br>");
        echo("yüklenme tarihi= ".$uploaddate."<br>");
        $uploader= $user->full_name;
        echo("Yükleyen kişi name i (başka bir veri lazım sa bir üst line a bak...)= ".$uploader."<br>");
        //print_r($product_images);
        echo "<br><br><br>";
        echo '<a href="'.base_url().'">Anasayfa</a>';

        //örnek resim çekme kodu
        echo "<br><br><br>";
        echo "örnek resim çekme kodu";
        echo "<br>";
        foreach($product_images as $image){
            echo "<br><br><br>";
            echo '<img src="'.$image->pic_url.'" alt="">';
        }
    }
    else{
    echo"Product not found!";
    sleep(5);
    echo"Redirecting to home page";
    redirect(base_url());
    }
    ?>
    </h1>
    
        
</body>
</html>