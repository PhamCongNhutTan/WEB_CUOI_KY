<button type="button" id="home" class="btn btn-dark me-3" style="background-color:inherit; font-size:22px; border-radius:3rem;">
    <a id="admin" style="text-decoration: none; font-weight: 500;" href="../">Trang chủ</a>
</button>
<form action="index.php" method="GET">
    <button type="submit" value="1" name="dangxuat" class="logout btn btn-dark border-0 me-3 px-1" style="font-size:22px; border-radius:3rem;">Đăng xuất</button>
</form>
<img class="border-1 rounded-circle" style="object-fit: cover; width: 50px; height: 50px; border: solid 3px white;" src=<?php if (isset($user)) if ($user->getImagePath() == null) echo "../images/avatar/default.png";
                                                                                                    else echo "../images/avatar/" . $_SESSION["User_ID"] . "/" . $user->getImagePath(); ?>>