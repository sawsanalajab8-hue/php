<?php include("includes/db.php"); include("includes/header.php"); ?>
<h3 class="mb-3">جميع الفئات</h3>
<table class="table table-bordered table-striped">
  <tr><th>#</th><th>اسم الفئة</th></tr>
  <?php
  $res = $conn->query("SELECT * FROM categories");
  while ($row = $res->fetch_assoc()) {
      echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td></tr>";
  }
  ?>
</table>
<?php include("includes/footer.php"); ?>
