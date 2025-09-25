<?php
include("includes/db.php");
$id=$_GET['id'];
$conn->query("UPDATE news SET status='deleted' WHERE id=$id");
header("Location: news.php");
?>

<?php include("includes/db.php"); include("includes/header.php"); ?>
<h3 class="mb-3">الأخبار المحذوفة</h3>
<ul class="list-group">
  <?php
  $res=$conn->query("SELECT * FROM news WHERE status='deleted'");
  while($row=$res->fetch_assoc()) echo "<li class='list-group-item'>".$row['title']."</li>";
  ?>
</ul>
<?php include("includes/footer.php"); ?>
