<?php include("includes/db.php"); session_start(); include("includes/header.php"); ?>
<div class="card shadow p-4 mx-auto" style="max-width:500px;">
  <h3 class="text-center mb-3">تسجيل الدخول</h3>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">الإيميل</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">كلمة المرور</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" name="login" class="btn btn-primary w-100">دخول</button>
  </form>
</div>
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email']; $password = $_POST['password'];
    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: index.php");
        } else echo "<div class='alert alert-danger mt-3 text-center'>كلمة المرور خاطئة.</div>";
    } else echo "<div class='alert alert-danger mt-3 text-center'>المستخدم غير موجود.</div>";
}
?>
<?php include("includes/footer.php"); ?>
