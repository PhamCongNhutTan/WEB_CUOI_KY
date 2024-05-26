<div class="sticky-top" id="admin-menu">
  <nav class="navbar navbar-expand-lg navbar-light bg-light list-admin">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlychuyendi&query=them">Quản lý chuyến đi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlytintuc&query=them">Quản lý tin tức</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=thongtinlienhe&query=xem">Thông tin liên hệ</a>
          </li>
        </ul>
      </div>
      <?php
      if (isset($_GET["dangxuat"])) {
        session_destroy();
        header("Location:../");
      }
      if (isset($_SESSION['dangnhap'])) {
        include ("./modules/components/logout_button.php");
      }
      ?>
    </div>
  </nav>
</div>