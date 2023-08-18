<?php
include './admin_inc/config.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['new_category_name']) && $_POST['new_category_name'] != ""){
        $catId = $_POST['cat_id'];
        $newCategoryName = $_POST['new_category_name'];
    
        $updateSql = "UPDATE category SET Category_name = '$newCategoryName',updated_at = now() WHERE Cat_id = $catId";
        $updateResult = mysqli_query($conn, $updateSql);
    
        if ($updateResult) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
?>
