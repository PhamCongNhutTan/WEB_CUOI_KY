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
                </ul>
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