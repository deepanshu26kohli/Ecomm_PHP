<?php
 include './Layouts/header.php';

 $sql1 = sprintf("SELECT * FROM category");
 $result1 = mysqli_query($conn,$sql1) or die("Query Failed.");
?>

   
    <div class="container mt-5">
        <h1>All Categories</h1>
     
        <table class="table">
  <thead>
    
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php
        if(mysqli_num_rows($result1)>0){
        while($row = mysqli_fetch_assoc($result1)){
     ?>
    <tr>
      <th scope="row"><?php echo $row['Cat_id']; ?></th>
      <td><?php echo $row['Category_name']; ?></td>
      <td><?php echo $row['created_at']; ?></td>
      <td><?php echo $row['updated_at']; ?></td>
      <td>
      <button class="btn-sm btn btn-info" data-eid =<?php $row['Cat_id'] ?> data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
      <button class="btn-sm btn btn-danger" data-did =<?php $row['Cat_id'] ?>>Delete</button>
     
      </td>
    </tr>
    <?php }} ?>
  </tbody>
</table>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
    <?php include "./Layouts/footer.php" ?>









