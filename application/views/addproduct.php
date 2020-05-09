<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Adding Page</title>
    <link rel="stylesheet" href= <?php echo base_url("assets/css/bootstrap.min.css");?>>
</head>
<body>
    <h3 style="text-align: center">AddProduct Page</h3>
    <h2 style="text-align: center">This will be pop up inside the user profile section </h2>
    <h2 style="text-align: center"> <i>Göeryim seni berkee</i></h2>

<br><br><br><br>

<div>
<form>
  <div class="form-group">
    <label for="productName">Product name</label>
    <input type="text" class="form-control" id="pName" placeholder="Enter Product Name">
  </div>
  
  <div class="form-group">
    <label for="productDescription">Product Description</label>
    <textarea class="form-control" id="productDescription" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="categoryChooser">Choose Categroy</label>
    <select class="form-control" id="categoryChooser">
        <option value="1">Fotoğraf & Kamera </option>
        <option value="2">Kitap Dergi       </option>
        <option value="3">Spor Ekipmanları  </option>
        <option value="4">Bahçe & Yapı Market</option>
        <option value="5">Teknik Elektronik </option>
        <option value="6">Diğer Herşey      </option>   
    </select>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="publish">
    <label class="form-check-label" for="publish">Publish item</label>
  </div>
  <form>
  <div class="form-group">
    <label for="imageInput">Enter product Image</label>
    <input type="file" class="form-control-file" id="imageInput">
  </div>
</form>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    

</body>
</html>
