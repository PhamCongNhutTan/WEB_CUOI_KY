<?php
include_once ("../modules/review_controller.php");
$sql_selectAll = "SELECT * FROM review";
$query_selectAll = mysqli_query($mysqli, $sql_selectAll);
$reviewController = new ReviewController();
?>
<div class="container" id="list-ttlh">
  <h3>Tất cả bài viết</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Người dùng</th>
        <th scope="col">Tên</th>
        <th scope="col">Loại</th>
        <th scope="col">Ngày</th>
        <th scope="col">Số sao</th>
        <th scope="col">Nội dung</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_selectAll)) {
        $i++;
        ?>
        <tr>
          <td><?php echo $reviewController->getUserNameByUserID($row['User_ID']) ?></td>
          <td>
            <?php
            if ($row['Type'] == "chitiettintuc") {
              echo $reviewController->getPostTitleByPostID($row['Tour_ID']);
            } else {
              echo $reviewController->getTourNameByTourID($row['Tour_ID']);
            }
            ?>
          </td>
          <td>
            <?php
            if ($row['Type'] == "chitiettintuc") {
              echo "Tin tức";
            } else {
              echo "Chuyến đi";
            }
            ?>
          </td>
          <td><?php echo $row['Review_Date'] ?></td>
          <td><?php echo $row['Rate'] ?></td>
          <td><?php echo $row['Content'] ?></td>
          <td>
            <button type="button" class="btn btn-danger"><a style="text-decoration:none; color:white;"
                href="modules/quanlybinhluan/excute.php?review_id=<?php echo $row['Review_ID'] ?>"> Xóa</a> </button>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>