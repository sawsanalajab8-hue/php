<?php include("includes/db.php"); include("includes/header.php"); ?>
<div class="card shadow p-4 mx-auto" style="max-width:500px;">
  <h3 class="mb-3 text-center">إضافة فئة جديدة</h3>
  <form method="post">
    <input type="text" name="name" class="form-control mb-3" placeholder="اسم الفئة" required>
    <button type="submit" name="save" class="btn btn-success w-100">حفظ</button>
  </form>
</div>
<?php
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    echo $conn->query("INSERT INTO categories (name) VALUES ('$name')") 
        ? "<div class='alert alert-success mt-3'>تمت الإضافة</div>" 
        : "<div class='alert alert-danger mt-3'>".$conn->error."</div>";
}
?>
<?php include("includes/footer.php"); ?>
