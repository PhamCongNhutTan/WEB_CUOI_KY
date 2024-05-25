<?php
    $sql_selectAll = "SELECT * FROM POST";
    $query_selectAll = mysqli_query($mysqli, $sql_selectAll);
?>
<h3>Tất cả bài viết</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Thứ tự</th>
      <th scope="col">Tiêu đề</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Tóm tắt nội dung</th>
      <th scope="col">Nội dung</th>
      <th scope="col">Tình trạng</th>
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
      <td><?php echo $row['tieude'] ?></td>
      <td>  <img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanh']?>" width="100px" alt=""></td>
      <td><?php echo $row['tomtat'] ?></td>
      <td><?php echo $row['noidung'] ?></td>
      <td><?php if($row['tinhtrang'] == 1){
        echo "Hiển thị";
      } else {
        echo "Ẩn";
      }
      ?>
      </td>
      <td>
          <button type="button" class="btn btn-primary"> <a style="text-decoration:none; color:white;" href="?action=quanlytintuc&query=edit&post_id=<?php echo $row['post_id']?>"> Chỉnh sửa</a></button>
          <button type="button" class="btn btn-danger"><a style="text-decoration:none; color:white;" href="modules/quanlytintuc/excute.php?post_id=<?php echo $row['post_id']?>"> Xóa</a> </button>
      </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>