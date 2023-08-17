<?php include './Layouts/header.php';
  
  if(isset($_POST['insert_category'])){
    if(isset($_POST['category']) && trim($_POST['category']) != "" ){
        $category_name = mysqli_real_escape_string($conn,$_POST['category']);
        $sql = sprintf("INSERT INTO `category` (`Category_name`, `created_at`, `updated_at`) VALUES ('%s', now() , now() )",$category_name);
       $res = mysqli_query($conn,$sql);
    }
    else{
        echo "Please fill Category";
    }
  } 
?>
    <div class="container mt-5">
        <h1>Add Category</h1>
    <form class="mt-3" action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
        <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input  type="text" name="category"  class="form-control w-25" id="exampleInputEmail1" placeholder="Category Name">
                  </div>
                  <div class="card-footer">
                      <button type="submit" name="insert_category" class="btn btn-primary">Submit</button>
                  </div>
    </form>
</div>

<?php include "./Layouts/footer.php" ?>
  










