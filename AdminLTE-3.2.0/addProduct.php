<?php
   include './Layouts/header.php';
?>
<div class="container mt-5">
    <h1>Add Products</h1>
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Name</label>
    <input type="text" name="ProductName" class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Category</label>
    <input type="text" class="form-control w-25" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Product Image</label>
  <input class="form-control w-25" type="file" id="formFile">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
  <textarea class="form-control w-25" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
  <button type="submit" class="btn btn-dark">Add Product</button>
</form>
</div>

<?php include "./Layouts/footer.php" ?>