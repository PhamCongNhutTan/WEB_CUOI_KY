<div class="avatar-container">
    <img onclick="toggleDropdown()" class="avatar border-1 rounded-circle"
        style="object-fit: cover; width: 50px; height: 50px; border: solid 3px white;" src=<?php if (isset($user)) if ($user->getImagePath() == null)
            echo "../images/avatar/default.png";
        else
            echo "../images/avatar/" . $_SESSION["User_ID"] . "/" . $user->getImagePath(); ?>>

    <div id="dropdown-menu" class="my-dropdown-menu">
        <div class="btn-container">
            <button class="btn-avatar-toggle" type="button">
                <a id="admin" href="../"><i class="fa-solid fa-house"></i>Trang chủ</a>
            </button>
        </div>
        <form action="index.php" method="GET">
            <div class="btn-container">
                <button class="btn-avatar-toggle" type="submit" value="1" name="dangxuat">
                <a><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
                </button>
            </div>
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
