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
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
        if(mysqli_num_rows($result1)>0){
        while($row = mysqli_fetch_assoc($result1)){
     ?>
    <tr>
      <th scope="row"><?php echo $row['Cat_id']; ?></th>
      <td class="category-name"><?php echo $row['Category_name']; ?></td>
      <td><?php echo $row['created_at']; ?></td>
      <td><?php echo $row['updated_at']; ?></td>
      <td>
      <button class="btn-sm btn btn-info" data-eid="<?php echo $row['Cat_id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
      <button class="btn-sm btn btn-danger delete-category" data-did="<?php echo $row['Cat_id']; ?>">Delete</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="editCategoryId">
        <div class="form-group">
          <label for="editCategoryName">Category Name</label>
          <input type="text" class="form-control" id="editCategoryName">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var catId = button.data('eid');
        var categoryName = button.closest('tr').find('.category-name').text();
        var modal = $(this);
        modal.find('#editCategoryId').val(catId);        
        $.ajax({
            type: 'POST',
            url: 'edit_category.php',
            data: { cat_id: catId },
            success: function(response) {
                if (response !== "error") {
                  modal.find('#editCategoryName').val(categoryName);
                } else {
                    modal.find('#editCategoryName').val('abc'); 
                }
            }
        });
    });
    $('#saveChanges').on('click', function() {
        var catId = $('#editCategoryId').val();
        var newCategoryName = $('#editCategoryName').val();
        
        $.ajax({
            type: 'POST',
            url: 'edit_category.php',
            data: { cat_id: catId, new_category_name: newCategoryName },
            success: function(response) {
                if (response === "success") {
                    location.reload();
                }
            }
        });
    });
    $('.delete-category').on('click', function() {
        var catId = $(this).data('did');
        
        $.ajax({
            type: 'POST',
            url: 'delete_category.php',
            data: { cat_id: catId },
            success: function(response) {
                if (response === "success") {
                    location.reload();
                } 
            }
        });
    });
});



</script>  
    <?php include "./Layouts/footer.php" ?>









