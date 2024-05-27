<?php
$sql_post = "SELECT * FROM post WHERE post_id='$_GET[id]' LIMIT 1";
$query = mysqli_query($mysqli, $sql_post);
$query_all = mysqli_query($mysqli, $sql_post);

$row_post_title = mysqli_fetch_array($query);
?>
<!-- Chua CSS -->
<h3 class="text-center"><?php echo $row_post_title['tieude'] ?></h3>
<div class="container" id="cttt">
    <?php
    while ($row = mysqli_fetch_array($query_all)) {
        ?>
        <div class="clearfix">
            <img class="image-cttt" src="admincp/modules/quanlytintuc/uploads/<?php echo $row['hinhanh'] ?>"
                alt="Cardimagecap">
            <div class="space"></div>
            <p class="text-cttt"><?php echo $row['noidung'] ?></p>
        </div>
        <?php
    }
    ?>
</div>
