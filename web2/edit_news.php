<?php include("includes/db.php"); $id=$_GET['id']; $res=$conn->query("SELECT * FROM news WHERE id=$id"); $row=$res->fetch_assoc(); include("includes/header.php"); ?>
<div class="card shadow p-4 mx-auto" style="max-width:600px;">
  <h3 class="mb-3 text-center">تعديل الخبر</h3>
  <form method="post">
    <input type="text" name="title" class="form-control mb-3" value="<?php echo $row['title']; ?>" required>
    <textarea name="details" class="form-control mb-3"><?php echo $row['details']; ?></textarea>
    <button type="submit" name="update" class="btn btn-warning w-100">تحديث</button>
  </form>
</div>
<?php
if (isset($_POST['update'])) {
    $title=$_POST['title']; $details=$_POST['details'];
    $sql="UPDATE news SET title='$title',details='$details' WHERE id=$id";
    echo $conn->query($sql) ? "<div class='alert alert-success mt-3'>تم التحديث</div>" : "<div class='alert alert-danger mt-3'>".$conn->error."</div>";
}
?>
<?php include("includes/footer.php"); ?>
