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
    <input type="text" class="form-control" id="pName" aria-describedby="emailHelp" placeholder="Enter Product Name">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

</form>
</div>
    

</body>
</html>
