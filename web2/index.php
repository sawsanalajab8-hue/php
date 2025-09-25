<?php session_start(); if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
include("includes/header.php"); ?>
<div class="text-center">
  <h2>أهلا بك 👋 <?php echo $_SESSION['user_name']; ?></h2>
  <p class="lead">اختر من القائمة أعلاه لإدارة الأخبار والفئات</p>
</div>
<?php include("includes/footer.php"); ?>
