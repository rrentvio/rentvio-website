<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/payment.css");?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <!-- necesery php for better naming (aşağı taşıma canıms) -->
  <?php 
    if (isset($product_details)){
        $product_details= reset($product_details);
        $id=$product_details->id;
        $postedbyId=$product_details->user_id;
        $name=$product_details->product_name;
        $price=$product_details->price;
        $description=$product_details->product_description;
        $category=$product_details->product_category;
        $renterid=$product_details->renter_id;
        $uploaddate=$product_details->upload_date;} 
    if (!empty($product_images[0])){
        $imgpic= '<img  class="rounded mx-auto payment-image "  src="'.$product_images[0]->pic_url.'" alt="'.$name.' picture">';
      }    
    else $imgpic ='<img class="rounded mx-auto payment-image"  src="'.base_url("assets/pictures/nopic.png").'" alt="'.$name.'picture">';
?>
  <body>
  <img src="<?php echo base_url("assets/pictures/giris.jpg");?>" alt="" class="keke" srcset="">
    <!-- For demo purpose -->
    <div class=" mb-4">
        <div class="mx-auto text-center">
            <h1 class="display-3 text-white bold">Payment</h1>
        </div>
    </div> <!-- End -->

    <div class="container card bgbetterforced" >
        <br><br>
    <div class="row mx-md-n5">
        <div class="col px-md-5">
          <h2 class="text-center text-light " >Product Info: <?php echo$name ?> </h2>
          <div class="text-center "> <?php echo $imgpic; ?> </div>
          <h3 class="font-italic text-light " >Description </h3> <br>
          <?php echo '<h6 class="text-left text-light">'.substr($description,0,200).'...<h6>'?>
          <br> <h3 class="font-italic text-light " >Cost: <?php echo $price; ?>$ (per 1 day)</h3><br>
          <div class="slidecontainer slidercss">
              <h6 class="text-left text-light" >I will rent this product for: <span id="dayVal"> days.</span> days</h6>
            <input type="range" name="days" min="1" max="<?php echo date("t")?>" value="1" class="slider" id="daySlider">
          </div> 

          <br><br>
          
        </div>
        <div class="col px-md-5 ">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-light shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form role="form">
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group">
                                            <select class="form-control "  placeholder="MM">
                                                <option>01</option> <option>02</option> <option>03</option> <option>04</option> <option>05</option> <option>06</option>
                                                <option>07</option> <option>08</option> <option>09</option> <option>10</option> <option>11</option> <option>12</option>
                                            </select>
                                            <select class="form-control "  placeholder="YY">
                                                <option>2020</option> <option>2021</option> <option>2022</option> 
                                                <option>2023</option> <option>2024</option> <option>2025</option>
                                                <option>2026</option> <option>2027</option> <option>2028</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text"  maxlength="3" required class="form-control"> </div>                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                <h3 class="text-center">Total Cost</h3>
                                <h6 class="text-center" id="totalcost"> </h6>
                                </div> 
                                                                                                  
                                <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                
                            </form>
                            
                        </div>
                    </div> <!-- End -->
                    <!-- Paypal info -->
                    <div id="paypal" class="tab-pane fade pt-3">
                        <h6 class="pb-2">Select your paypal account type</h6>
                        <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                        <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                        <div class="form-group">
                                <h3 class="text-center">Total Cost</h3>
                                <h6 class="text-center" id="totalcost2"> </h6>
                                </div> 
                        <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                    </div> <!-- End -->
                    <!-- bank transfer info -->
                    <div id="net-banking" class="tab-pane fade pt-3">
                        <div class="form-group "> <label for="Select Your Bank">
                                <h6>Select your Bank</h6>
                            </label> <select class="form-control" id="ccmonth">
                                <option value="" selected disabled>--Please select your Bank--</option>
                                <option>Imaginery Bank</option>
                                <option>Mid tier Imaginery Bank</option>
                                <option>Classy Imaginery  Bank</option>
                                <option>Low Budget Imaginery Bank</option>
                                <option>Imaginery Goverment Bank</option>
                            </select> </div>
                            <div class="form-group">
                                <h3 class="text-center">Total Cost</h3>
                                <h6 class="text-center" id="totalcost3"> </h6>
                                </div> 
                        <div class="form-group">
                            <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Pyment</button> </p>
                        </div>
                        <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. 
                            After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                        </div> <!-- End -->
                        <!-- End -->
                    </div>
                </div>
            </div> <br> <br>
        </div>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                 
    <script>
        var slider = document.getElementById("daySlider");
        var output = document.getElementById("dayVal");
        output.innerHTML = slider.value;
        var someDate = new Date();
        document.getElementById('totalcost').innerHTML = <?php echo $price;?>+" $" ;
        document.getElementById('totalcost2').innerHTML = <?php echo $price;?>+" $" ;
        document.getElementById('totalcost3').innerHTML = <?php echo $price;?>+" $" ;
        
        slider.oninput = function() {
            output.innerHTML = this.value;
            
            var totalprice = slider.value*<?php echo $price?>;
            var rounded = totalprice.toFixed(2);
            document.getElementById('totalcost').innerHTML = rounded+" $";
            document.getElementById('totalcost2').innerHTML = rounded+" $";
            document.getElementById('totalcost3').innerHTML = rounded+" $";
            document.getElementById('dateVal').innerHTML = slider.value;
        }
    </script>
    




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        })
    </script>

  </body>
</html>

