<nav class="navbar navbar-expand-lg navbar-light bg-light list-admin">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GIao diện admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <?php
      if (isset($_GET["dangxuat"])) {
        session_destroy();
        header("Location:../");
      }
      if (isset($_SESSION['dangnhap'])) {
        include("./modules/components/logout_button.php");
      }
    ?>
  </div>
</nav>