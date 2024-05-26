<?php
    $sql_selectAll = "SELECT * FROM contact";
    $query_selectAll = mysqli_query($mysqli, $sql_selectAll);
?>
<h3>Tất cả bài viết</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Thứ tự</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Gmail</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Nội dung</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_selectAll)){
        $i++;
      ?>
      <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['name'] ?></td>
      <td> <?php echo $row['gmail'] ?> </td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['message'] ?></td>
      <td>
          <button type="button" class="btn btn-danger"><a style="text-decoration:none; color:white;" href="modules/thongtinlienhe/excute.php?contact_id=<?php echo $row['contact_id']?>"> Xóa</a> </button>
      </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>