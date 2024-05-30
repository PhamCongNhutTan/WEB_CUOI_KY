<div class="sticky-top" id="admin-menu">
  <nav class="navbar navbar-expand-lg navbar-light list-admin" id="admin-navbar">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlychuyendi&query=view">Quản lý chuyến đi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlytintuc&query=them">Quản lý tin tức</a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="index.php?action=quanlybinhluan&query=xem">Quản lý bình luận</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=quanlyvedat&query=view">Quản lý vé đặt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=thongtinlienhe&query=xem">Thông tin liên hệ</a>
          </li>
        </ul>
      </div>
      <?php
      if (isset($_GET["dangxuat"])) {
        unset($_SESSION["dangnhap"]);
        header("Location:../");
      }
      if (isset($_SESSION['dangnhap'])) {
        include ("./modules/components/logout_button.php");
      }
      ?>
    </div>
  </nav>
</div>