<div class="avatar-container">
    <img onclick="toggleDropdown()" class="avatar border-1 rounded-circle"
        style="object-fit: cover; width: 50px; height: 50px; border: solid 3px white;" src=<?php if (isset($user)) if ($user->getImagePath() == null)
            echo "./images/avatar/default.png";
        else
            echo "./images/avatar/" . $_SESSION["User_ID"] . "/" . $user->getImagePath(); ?>>
    <div id="dropdown-menu" class="my-dropdown-menu">
        <?php
        if (isset($_SESSION['dangnhap'])) {
            ?>
            <div class="btn-container"><button class="btn-avatar-toggle"><a href="index.php?quanly=giohang">
                        <i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a></button></div>
            <div class="btn-container"><button class="btn-avatar-toggle"><a href="index.php?quanly=donhang">
                        <i class="fa-solid fa-money-bill"></i>Đơn hàng</a></button></div>
            <div class="btn-container"><button class="btn-avatar-toggle"><a href="index.php?quanly=taikhoan">
                        <i class="fa-solid fa-user"></i></i>Tài khoản</a></button></div>
            <div class="btn-container"><button class="btn-avatar-toggle" style="padding-right: 0px; margin-right: 10px"><a href="index.php?quanly=doimatkhau">
                        <i class="fa-solid fa-lock"></i>Đổi mật khẩu</a></button></div>
            <div class="breaker"></div>
            <?php
        }

        if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin")
            echo '<div class="btn-container"><button id="admin" type="button" class="btn-avatar-toggle">
            <a id="admin" href="./admincp"><i class="fa-solid fa-gear"></i>AdminCP</a>               
            </button></div>';
        ?>
        <form action="index.php" method="GET">
            <div class="btn-container"><button type="submit" value="1" name="dangxuat" class="btn-avatar-toggle"><a>
                        <i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a></button></div>
        </form>
    </div>
</div>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('dropdown-menu');
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        } else {
            dropdown.style.display = "block";
        }
    }

    window.onclick = function (event) {
        if (!event.target.matches('.avatar')) {
            var dropdowns = document.getElementsByClassName('my-dropdown-menu');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>