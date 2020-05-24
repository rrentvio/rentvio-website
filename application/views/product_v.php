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
        $uploaddate=$product_details->upload_date;    
}
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo$name;?> </title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom2.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/slider.css");?>">

</head>
<body>
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
              echo '<a class="nav-link fancy-font " href= ';
              echo base_url("profile/" .md5($user -> email)); echo ">",$user->full_name,"</a>";  ?> 
            <?php
            }
            else{              
              }
            ?>
        </li>
        <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-outline-light fancy-font dropdown-toggle col-12 xd" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All Products
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item fancy-font" href="#">Photograph and Video</a>
                <a class="dropdown-item fancy-font" href="#">Book and Magazines</a>
                <a class="dropdown-item fancy-font" href="#">Sport Equitments</a>
                <a class="dropdown-item fancy-font" href="#">Home Improvemnet and Tools</a>
                <a class="dropdown-item fancy-font" href="#">Technical Electronics</a>
                <a class="dropdown-item fancy-font" href="#">Everything Else</a>
              </div>
            </div>
          </li>
          <li>
            <form class="form-inline my-2 my-lg-0">
        <input class="form-control fancy-font mr-sm-2 ml-3" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline fancy-font text-deneme-bg text-white my-2 ml-2 my-sm-0" type="submit">Search</button>
        </form>
      </li>
    </ul>  
    <ul class="navbar-nav ml-auto">
        <li class="nav-item text-deneme-bg active ">
        <?php 
            if (isset($user -> email)){ 
              echo'<a class="nav-link fancy-font bgbetter" href=';
              echo base_url("logout/" .md5($user -> email));?>  <?php echo">Log out</a>"; ?>
            <?php
            }
            else{
              echo'<a  class="nav-link fancy-font bgbetter" href="'.base_url("giris-yap").'" id="sign"> Log in</a>';
              //echo base_url("giris"); echo"> Signin</a>"; 
              }
            ?>
            <a  class="nav-link fancy-font d-none "  href="" data-toggle="modal" data-target="#signUp" data-whatever="buraya istediğin bir veriyi gir"  id="signup"> Sign in</a>
            </li>
    </ul>
  </nav>
  <div class="container card bgbetter">
    <div class="row">
    <div class="col-md-10 offset-1 ">  <!-- // offset baştan kaç boşluk bırakıcağın ?> -->
    <br><br><br><br>  
    <script src="<?php echo base_url("assets/js/sliderjs.js"); ?> "></script>
    <script src="<?php echo base_url("assets/js/slider2.js"); ?> "></script>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:500px;height:400px;overflow:hidden;visibility:hidden;background-color:#000000;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:500px;height:400px;overflow:hidden;">
        <?php if (!empty($product_images)){
                    foreach($product_images as $image){ 
                        echo '<div>
                        <img data-u="image" src="'.$image->pic_url.'"/> <img data-u="thumb" src="'.$image->pic_url.'"/>   </div>';}
                      }else echo '<div>
                      <img data-u="image" src="'.base_url("assets/pictures/nopic.png").'"/> <img data-u="thumb" src="'.base_url("assets/pictures/nopic.png").'"/>   </div>'
                        ?>
        </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">animation</a>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb131" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:11px;height:11px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora112" style="width:55px;height:55px;top:162px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M4576,7719.7l5678-5677.8c81.3-81.2,174.8-121.9,280.3-121.9c105.6,0,199,40.8,280.3,121.9 l609.1,609.2c81.3,81.2,121.8,174.5,121.8,280.3c0,105.8-40.5,199-121.8,280.3L6635.2,8000.1l4788.4,4788.5 c81.3,81.2,121.8,174.7,121.8,280.1c0,105.7-40.5,199.2-121.8,280.4l-609.2,609c-81.2,81.3-174.7,121.8-280.3,121.8 c-105.5,0-199-40.6-280.3-121.8L4576.3,8280.4c-81.2-81.2-121.8-174.7-121.8-280.3C4454.5,7894.5,4494.8,7801.1,4576,7719.7z"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora112" style="width:55px;height:55px;top:162px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11424,7719.7L5746,2041.9c-81.3-81.2-174.8-121.9-280.3-121.9c-105.6,0-199,40.8-280.3,121.9 l-609.1,609.2c-81.3,81.2-121.8,174.5-121.8,280.3c0,105.8,40.5,199,121.8,280.3l4788.4,4788.4l-4788.4,4788.5 c-81.3,81.2-121.8,174.7-121.8,280.1c0,105.7,40.5,199.2,121.8,280.4l609.2,609c81.2,81.3,174.7,121.8,280.3,121.8 c105.5,0,199-40.6,280.3-121.8l5677.7-5677.8c81.2-81.2,121.8-174.7,121.8-280.3C11545.5,7894.5,11505.2,7801.1,11424,7719.7z"></path>
            </svg>
        </div>
    </div>
    <br><br>
    <h1 class="text-center text-white text-uppercase fancy-font">
    <?php 
    echo $name;

    ?>
    </h1>
    <hr class="hrforpview ">
    <h2 class="text-white fancy-font"> Description: </h2>
    <h6 class="text-white fancy-font" >  
    <?php 
    echo $description;
    ?>
    </h6>
    <hr class="hrforpview ">
    <div class="row">
        <div class="col-md-3 text-center text-white">
            <h6>Category:
                 <br>
                  <?php 
                    echo $category;
                  ?>
             </h6>
        </div>
        <div class="col-md-3 text-center text-white">
            <h6>Price Per Day:
                 <br>
                  <?php 
                    echo $price;
                  ?> $
             </h6>
        </div>
        <div class="col-md-3 text-center text-white">
            <h6>Addition Date:
                 <br>
                  <?php 
                    echo $uploaddate;
                  ?>
             </h6>
        </div>
        <div class="col-md-3 text-center text-white">
            <h6>Added By:
                 <br>
                  <?php 
                    echo $postedbyName;
                  ?>
             </h6>
        </div>
    </div>
    <hr class="hrforpview ">

    <?php if(isset($renterid)){?>
      <h5 class="text-center text-white fancy-font">Feel sorry to Tell you That But: </h5>
      <h5 class="text-center text-white fancy-font" >This product already rented</h5>
        <p class="text-center text-white fancy-font" >Check again in <?php echo $date  ?> </p>
    <?php }
    else echo('<button type="button" class="btn btn-lg btn-block text-deneme-bg text-white fancy-font" data-toggle="modal"  
    data-target="#rentproduct">-- RENT NOW --</button>')?>
    
    <br>

    <div class="modal" tabindex="-1" id="rentproduct" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rent Now!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>BURAYI YARIN BİRLİKTE YAPARIZ KEKE.</p>

        <a href="" data-toggle="modal" data-target="#terms"> I have read the terms and conditions. </a>
          <div class="slidecontainer slidercss">
            <input type="range" name="days" min="1" max="<?php echo date("t")?>" value="1" class="slider" id="daySlider">
            <p>I will rent this product for: <span id="dayVal"> days.</span> days</p>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- terms modal-->
<div class="modal fade " id="terms" tabindex="-1" role="dialog" aria-labelledby="termsModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="termsModal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <!--<iframe style="height: 600px;"  src="<?php echo base_url("assets/terms.php")?>" class=" embed-responsive" frameborder="0"></iframe>-->
        <p style="text-align: center;"><strong>Rental Of Goods Agreement</strong></p>
        <p style="text-align: center;"><strong>Work in progress!</strong></p>

<p>This Rental Of Goods Agreement, hereinafter referred to as "Agreement," is entered into and made effective as of the date set forth at the end of this document by and between the following parties:</p>
<p>"  <b> <?php echo $postedbyName; ?> </b>", an individual, with a principal place of business at the following address:</p>
<p> <b> #ProviderAdress </b> </p>
<p>and <b> <?php echo $user->full_name; ?> </b>, an individual, with a principal place of business at the following address:</p>
<p> <b> #RenterAddress</b> </p>
<p>Hereinafter, "Provider" will refer to and be used to describe the following party: " b> <?php echo $user->full_name; ?> </b>". "Renter" will refer to and be used to describe the following party: <b> <?php echo $postedbyName; ?> </b>. Provider and Renter may be referred to individually as "Party" and collectively as the "Parties."</p>
<p><em><br /> RECITALS:</em></p>
<p><em>WHEREAS, Provider wishes to offer for rent a certain Good, as defined below;</em></p>
<p><em>WHEREAS, Renter wishes to rent such Good from Provider;</em></p>
<p><em>NOW, therefore, in consideration of the promises and covenants contained herein, as well as other good and valuable consideration (the receipt and sufficiency of which is hereby acknowledged), the Parties do hereby agree as follows:</em></p>
<p><strong><br /> <br /> Article 1 - RENTAL OF ITEM:</strong></p>
<p>Provider hereby agrees to provide, and Renter agrees to rent, the following:</p>
<p><b> <?php echo $name; ?> </b> <br><br> <b> <?php echo $description; ?> </b> (the "Good")</p>   
<p>The transaction between Provider and Renter will hereinafter be described as the "Rental."</p>
<p><strong><br /> Article 2 - DURATION OF RENTAL:</strong></p>
<p>The Rental will begin on 05/24/2020 ("Start Date") and end on 05/31/2020 ("End Date").</p>
<p>Renter will acquire the Good at the following time on the Start Date ("Start Time"): <b> <?php print_r(date("Y-m-d")) ?> </b>. Renter will return the Good at the following time on the End Date ("End Time"): <b> <span id="dateVal"></span>  </b>.</p>
<p><strong><br /> Article 3 - PRICE:</strong></p>
<p>For the rental of the Good Renter agrees to pay and Provider agrees to accept the following amount:</p>
<p>$99,999 (ninety-nine thousand nine hundred ninety-nine US dollars), per day from the Start Date to the End Date of the Rental. (In sum, the "Rental Price".) This Rental Price is exclusive of any applicable taxes.</p>
<p>The Provider and the Renter each acknowledge the sufficiency of the Rental Price as consideration. Unless otherwise explicitly agreed to by each of the parties, any sales tax or other similar tax, such as use or excise tax applicable to the Rental of the Good will be paid by the Renter.</p>
<p><strong><br /> Article 4 - DEPOSIT:</strong></p>
<p>A deposit of the following amount is required: $8,888 (eight thousand eight hundred eighty-eight US dollars) ("Deposit"). The Deposit will be due on 05/24/2020.</p>
<p>After the Rental is entirely completed and the Good is returned to Provider, Renter will get the Deposit back in total.</p>
<p><strong><br /> Article 5 - PAYMENT:</strong></p>
<p>The Rental Price will be paid in only one of the following methods of payment:</p>
<p>#paymentMethod</p>
<p>Payment of the full Rental Price will be due prior to the Start Date of the Rental.</p>
<p><strong><br /> Article 6 - ACQUISITION OF GOOD:</strong></p>
<p>The Good will be transferred from the Provider to the Renter for the Rental as follows:</p>
<p>#Provider will deliver the good to renters address</p>
<p><strong><br /> Article 7 - RISK OF LOSS:</strong></p>
<p>Risk of loss for the Good will be entirely with the Renter. Renter is responsible for any and all damage of or to the Good and hereby agrees to pay Provider the full cost of any repair and/or replacement. Provider will assess the cost, at Provider's sole and exclusive discretion, and will provide Renter with an invoice to be paid immediately.</p>
<p><strong><br /> Article 8 - INSPECTION:</strong></p>
<p>Renter acknowledges that Renter has had the opportunity to fully inspect the Good and has found the Good suitable for the purpose required. Renter further acknowledges and agrees that Renter understands the proper use of the Good and that Renter will notify Provider immediately in case the Good becomes unsuitable or unsafe for use. In such instance, Renter will immediately discontinue use of the Good and Provider will replace the Good if possible. However, in no circumstance is Provider responsible for any damage, delay, or incidental or consequential damages caused by any form of interruption of use for the Good.</p>
<p><strong><br /> Article 9 - DISCLAIMER OF WARRANTY:</strong></p>
<p>Provider and Renter each agree that the Good is being rented "as is" and that Provider hereby expressly disclaims any and all warranties of quality, whether express or implied, including but not limited the warranties of merchantability and fitness for a particular purpose. Renter acknowledges that it is relying solely on its own investigations, inspections and/or examinations and has not been induced by the Provider or any of Provider's agents or representatives making any statements as to the quality or condition of the Good.</p>
<p><strong><br /> Article 10 - LIMITATION OF LIABILITY:</strong></p>
<p>Renter agrees to hold Provider harmless for any damage or injuries caused as a result of any negligence on Renter's part. In no event will Provider's liability exceed the total amount paid by Renter to Provider for the Rental of the Good for any cause of action or future claim. Renter hereby acknowledges and agrees, as above, that Provider is not liable for any special, indirect, consequential or punitive damages, including but not limited to lost profits and/or loss of business, arising out of or relating to this Agreement in any way.</p>
<p><strong><br /> Article 11 - PROHIBITED USAGE:</strong></p>
<p>Only lawful uses of the Good is permitted. Renter hereby agrees not to use the Good for any illegal purpose or in any illegal manner, or if use of the Good would be unsafe.</p>
<p><strong><br /> Article 12 - GENERAL PROVISIONS:</strong></p>
<ol>
<li>A) GOVERNING LAW: This Agreement shall be governed in all respects by the laws of the state of Alabama and any applicable federal law. Both Parties consent to jurisdiction under the state and federal courts within the state of Alabama. The Parties agree that this choice of law, venue, and jurisdiction provision is not permissive, but rather mandatory in nature.</li>
<li>B) LANGUAGE: All communications made or notices given pursuant to this Agreement shall be in the English language.</li>
<li>C) ASSIGNMENT: This Agreement, or the rights granted hereunder, may not be assigned, sold, leased or otherwise transferred in whole or part by either Party.</li>
<li>D) AMENDMENTS: This Agreement may only be amended in writing signed by both Parties.</li>
<li>E) NO WAIVER: None of the terms of this Agreement shall be deemed to have been waived by any act or acquiescence of either Party. Only an additional written agreement can constitute waiver of any of the terms of this Agreement between the Parties. No waiver of any term or provision of this Agreement shall constitute a waiver of any other term or provision or of the same provision on a future date. Failure of either Party to enforce any term of this Agreement shall not constitute waiver of such term or any other term.</li>
<li>F) SEVERABILITY: If any provision or term of this Agreement is held to be unenforceable, then this Agreement will be deemed amended to the extent necessary to render the otherwise unenforceable provision, and the rest of the Agreement, valid and enforceable. If a court declines to amend this Agreement as provided herein, the invalidity or unenforceability of any provision of this Agreement shall not affect the validity or enforceability of the remaining terms and provisions, which shall be enforced as if the offending term or provision had not been included in this Agreement.</li>
<li>G) ENTIRE AGREEMENT: This Agreement constitutes the entire agreement between the Parties and supersedes any prior or contemporaneous understandings, whether written or oral.</li>
<li>H) HEADINGS: Headings to this Agreement are for convenience only and shall not be construed to limit or otherwise affect the terms of this Agreement.</li>
<li>I) COUNTERPARTS: This Agreement may be executed in counterparts, all of which shall constitute a single agreement. If the dates set forth at the end of this document are different, this Agreement is to be considered effective as of the date that both Parties have signed the agreement, which may be the later date.</li>
<li>J) FORCE MAJEURE/EXCUSE: Neither Party is liable to the other for any failure to perform due to causes beyond its reasonable control including, but not limited to, acts of God, acts of civil authorities, acts of military authorities, riots, embargoes, acts of nature and natural disasters, and other acts which may be due to unforeseen circumstances. Provider is not liable for any delivery delay or non-performance caused by labor or transportation disputes or shortage, material delays, or delays or non-performance caused by any of Provider's suppliers.</li>
<li>K) NOTICES ELECTRONIC COMMUNICATIONS PERMITTED: Any notice to be given under this Agreement shall be in writing and shall be sent by first class mail or air mail to the address of the relevant Party set out at the head of this Agreement. Notices may also be sent via email to the relevant email address set out below, if any, or other email address as that Party may from time to time notify to the other Party in accordance with this clause.</li>
</ol>
<p>The relevant email contact information for the Parties is as follows:</p>
<p>Provider:</p>
<p>#provideremail</p>
<p>Renter:</p>
<p>#renterEmail</p>
<p>Notices sent as above shall be deemed to have been received 3 working days after the day of posting (in the case of inland first class mail), or 7 working days after the date of posting (in the case of air mail). In the case of email, notices shall be deemed to have been received the next working day after sending.</p>
<p>In proving the giving of a notice it shall be sufficient to prove that the notice was left, or that the envelope containing the notice was properly addressed and posted, or that the applicable means of telecommunication was addressed and dispatched, and dispatch of the transmission was confirmed and/or acknowledged as the case may be.</p>
<p><strong><em><br /> EXECUTION:</em></strong></p>
<p>Name: "#ProviderName"</p>
<p>Signature: _________________________</p>
<p>Date:#todaysdate</p>
<p>&nbsp;</p>
<p><br /> <br /> Name: #RenterName</p>
<p>Signature: _________________________</p>
<p>Date:#todaysdate</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    

<script src="<?php echo base_url("assets/js/sliderjs.js"); ?> "></script>
<script type="text/javascript">jssor_1_slider_init();
    </script>
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
      <script>
        function goBack() {
          window.history.back();
        }
      </script>
              
      <script>
        var slider = document.getElementById("daySlider");
        var output = document.getElementById("dayVal");
        output.innerHTML = slider.value;
      
        var someDate = new Date();
         
        slider.oninput = function() {
          output.innerHTML = this.value;

          document.getElementById('dateVal').innerHTML =slider.value;
          console(slider.value);
        }
      </script>
</body>
</html>

