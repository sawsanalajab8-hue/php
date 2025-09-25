<?php include("includes/db.php"); session_start(); include("includes/header.php"); ?>
<div class="card shadow p-4 mx-auto" style="max-width:700px;">
  <h3 class="mb-3 text-center">إضافة خبر جديد</h3>
  <form method="post" enctype="multipart/form-data">
    <input type="text" name="title" class="form-control mb-3" placeholder="عنوان الخبر" required>
    <textarea name="details" class="form-control mb-3" placeholder="تفاصيل الخبر" required></textarea>
    <select name="category_id" class="form-control mb-3" required>
      <option value="">اختر الفئة</option>
      <?php
      $cats = $conn->query("SELECT * FROM categories");
      while ($c = $cats->fetch_assoc()) echo "<option value='".$c['id']."'>".$c['name']."</option>";
      ?>
    </select>
    <input type="file" name="image" class="form-control mb-3">
    <button type="submit" name="save" class="btn btn-primary w-100">حفظ</button>
  </form>
</div>
<?php
if (isset($_POST['save'])) {
    $title=$_POST['title']; $details=$_POST['details']; $cat=$_POST['category_id']; 
    $img="";
    if (!empty($_FILES['image']['name'])) {
        $img="assets/images/".basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'],$img);
    }
    $sql="INSERT INTO news (title,category_id,details,image,user_id) VALUES ('$title','$cat','$details','$img','$uid')";
    echo $conn->query($sql) ? "<div class='alert alert-success mt-3'>تمت الإضافة</div>" : "<div class='alert alert-danger mt-3'>".$conn->error."</div>";
}
?>
<?php include("includes/footer.php"); ?>
