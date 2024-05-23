
<?php 
    $user = new User($mysqli, $_SESSION["User_ID"]);
?>
<form action="index.php" method="GET">
    <button type="submit" value="1" name="dangxuat" class="btn btn-dark border-0" style="background-color:inherit; font-size:22px; border-radius:1rem;">Đăng xuất</button>
</form>
<img class="border-3 rounded-circle" style="object-fit: cover; width: 30px; height: 30px;" src=<?php if($user !== null) if($user->getImagePath() == null) echo "./images/avatar/default.png"; else echo "./images/avatar/".$user->getImagePath(); ?> >
