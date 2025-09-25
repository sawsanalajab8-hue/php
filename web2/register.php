<?php include("includes/db.php"); include("includes/header.php"); ?>
<div class="card shadow p-4 mx-auto" style="max-width:500px;">
  <h3 class="text-center mb-3">تسجيل حساب جديد</h3>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">الاسم</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">الإيميل</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">كلمة المرور</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" name="register" class="btn btn-success w-100">تسجيل</button>
  </form>
</div>
<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    echo $conn->query($sql) ? "<div class='alert alert-success mt-3'>تم إنشاء الحساب بنجاح.</div>" : "<div class='alert alert-danger mt-3'>خطأ: ".$conn->error."</div>";
}
?>
<?php include("includes/footer.php"); ?>
