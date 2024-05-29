<!-- MENU -->
<div class="sticky-top" id="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?quanly=chuyendi">Chuyến đi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=tintuc">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=lienhe">Liên hệ</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['dangnhap'])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=giohang">Giỏ hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=taikhoan">Thông tin tài khoản</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=doimatkhau">Đổi mật khẩu</a>
                    </li>
                    <?php
                    }
                    ?>
                    <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li> -->
                </ul>

                <!-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
            </div>
            <div class="login d-flex ml-auto align-items-center">
                <?php
                if(isset($_GET["dangxuat"])){
                    unset($_SESSION["dangnhap"]);
                    session_destroy();
                }
                if (!isset($_SESSION['dangnhap'])) {
                    include("./modules/components/login_button.php");
                }else{
                    include("./modules/components/logout_button.php");
                }
                ?>
            </div>
        </div>
    </nav>
</div>