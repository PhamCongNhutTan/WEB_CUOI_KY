<div class="form-qltt">
  <h3>Chỉnh sửa bài viết</h3>
  <?php
  $sql_sua_bv = "SELECT * FROM post WHERE post_id = '$_GET[post_id]' LIMIT 1";
  $query_sua_bv = mysqli_query($mysqli, $sql_sua_bv);
  ?>
  <?php
  while ($row = mysqli_fetch_array($query_sua_bv)) {

    ?>
    <form method="POST" action="modules/quanlytintuc/excute.php?post_id=<?php echo $row['post_id'] ?>"
      enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Tiêu đề</label>
        <input type="text" class="form-control" id="" name="tieude" value="<?php echo $row['tieude'] ?>">
      </div>

      <div class="form-group">
        <label for="">Hình ảnh</label>
        <input type="file" class="form-control" id="" name="hinhanh">
        <img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanh'] ?>" width="100px" alt="">
      </div>

      <div class="form-group">
        <label for="">Tóm tắt nội dung</label>
        <textarea class="form-control" id="tomtat" name="tomtat" style="resize: none;"
          rows="10"><?php echo $row['tomtat'] ?></textarea>
      </div>

      <div class="form-group">
        <label for="">Nội dung chi tiết</label>
        <textarea class="form-control" id="noidung" name="noidung" style="resize: none;"
          rows="10"><?php echo $row['noidung'] ?></textarea>
      </div>

      <div class="form-group">
        <label style="display:block;" for="">Tình trạng</label>
        <select style="width: 100%; padding: 4px;" name="tinhtrang" id="">
          <?php
          if ($row['tinhtrang'] == 1) {
            ?>
            <option value="1" selected>Hiển thị</option>
            <option value="0">Ẩn</option>
            <?php
          } else {
            ?>
            <option value="1">Hiển thị</option>
            <option value="0" selected>Ẩn</option>
            <?php
          }
          ?>
        </select>
      </div>

      <button type="submit" name="suabaiviet" class="btn btn-success mt-3">Sửa bài viết</button>
    </form>
    <?php
  }
  ?>
</div>