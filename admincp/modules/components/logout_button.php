<form action="index.php" method="GET">
    <button  type="submit" value="1" name="dangxuat" class="logout btn btn-dark border-0 mx-3" style="background-color:inherit; font-size:22px; border-radius:3rem;">Đăng xuất</button>
</form>
<img class="border-3 rounded-circle mx-4" style="object-fit: cover; width: 30px; height: 30px;" src=<?php if(isset($user)) if($user->getImagePath() == null) echo "../images/avatar/default.png"; else echo "../images/avatar/".$user->getImagePath(); ?> >