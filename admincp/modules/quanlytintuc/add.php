<h3>Thêm bài viết</h3>
<form method="POST" action="modules/quanlytintuc/excute.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Tiêu đề</label>
    <input type="text" class="form-control" id="" name = "tieude">
  </div>

  <div class="form-group">
    <label for="">Hình ảnh</label>
    <input type="file" class="form-control" id="" name="hinhanh">
  </div>

  <div class="form-group">
    <label for="">Tóm tắt nội dung</label>
    <textarea type="text" class="form-control" id="tomtat" name="tomtat"></textarea>
  </div>

  <div class="form-group">
    <label for="">Nội dung chi tiết</label>
    <textarea type="text" class="form-control" id="noidung" name="noidung"></textarea>
  </div>
  
  <div class="form-group">
    <label style="display:block;" for="">Tình trạng</label>
    <select style="width: 100%; padding: 4px;" name="tinhtrang" id="">
      <option value="1">Hiển thị</option>
      <option value="0">Ẩn</option>
    </select>
  </div>

  <button type="submit" name="thembaiviet" class="btn btn-success mt-3">Thêm bài viết</button>
</form>