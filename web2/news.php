<?php include("includes/db.php"); include("includes/header.php"); ?>
<h3 class="mb-3">الأخبار</h3>
<table class="table table-bordered table-striped text-center">
  <tr><th>العنوان</th><th>الفئة</th><th>الإجراءات</th></tr>
  <?php
  $sql="SELECT news.*,categories.name AS cat FROM news JOIN categories ON news.category_id=categories.id WHERE status='active'";
  $res=$conn->query($sql);
  while($row=$res->fetch_assoc()){
    echo "<tr>
      <td>".$row['title']."</td>
      <td>".$row['cat']."</td>
      <td>
        <a href='edit_news.php?id=".$row['id']."' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>
        <a href='delete_news.php?id=".$row['id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
      </td>
    </tr>";
  }
  ?>
</table>
<?php include("includes/footer.php"); ?>
