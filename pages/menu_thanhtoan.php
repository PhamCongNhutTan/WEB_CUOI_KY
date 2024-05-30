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
                        <a class="nav-link" href="../index.php?quanly=chuyendi">Chuyến đi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php?quanly=tintuc">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php?quanly=lienhe">Liên hệ</a>
                    </li>
                    <?php
                    if (isset($_SESSION['dangnhap'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php?quanly=giohang">Giỏ hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php?quanly=taikhoan">Thông tin tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php?quanly=doimatkhau">Đổi mật khẩu</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="login d-flex ml-auto align-items-center">
                <?php
                if (isset($_GET["dangxuat"])) {
                    unset($_SESSION["dangnhap"]);
                    unset($_SESSION["role"]);
                }
                if (!isset($_SESSION['dangnhap'])) {
                } else { ?>
                    <button type="button" id="home" class="btn btn-dark me-3 border-0" style="background-color:inherit; font-size:22px; border-radius:3rem;">
                        <a id="admin" style="text-decoration: none; font-weight: 500;" href="../">Trang chủ</a>
                    </button>
                    <form action="../index.php" method="GET">
                        <button type="submit" value="1" name="dangxuat" class="logout btn btn-dark border-0 me-3 px-1" style="background-color: inherit; font-size:22px; border-radius:3rem;">Đăng xuất</button>
                    </form>
                    <img class="border-1 rounded-circle" style="object-fit: cover; width: 50px; height: 50px; border: solid 3px white;" src=<?php if (isset($user)) if ($user->getImagePath() == null) echo "../images/avatar/default.png";
                                                                                                                                            else echo "../images/avatar/" . $_SESSION["User_ID"] . "/" . $user->getImagePath(); ?>>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</div>