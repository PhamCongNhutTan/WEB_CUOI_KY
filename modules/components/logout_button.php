<?php
if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin")
    echo '<button id="admin" type="button" class="btn btn-dark border-0 me-3" style="background-color:inherit; font-size:22px; border-radius:3rem;">
            <a id="admin" style="text-decoration: none;" href="./admincp">AdminCP</a>
            </button>';
?>
<form action="index.php" method="GET">
    <button type="submit" value="1" name="dangxuat" class="btn btn-dark border-0 me-3" style="background-color:inherit; font-size:22px; border-radius:3rem;">Đăng xuất</button>
</form>
<img class="border-1 rounded-circle" style="object-fit: cover; width: 30px; height: 30px;" src=<?php if (isset($user)) if ($user->getImagePath() == null) echo "./images/avatar/default.png"; else echo "./images/avatar/" . $user->getImagePath(); ?>>