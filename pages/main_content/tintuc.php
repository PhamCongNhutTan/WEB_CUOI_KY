<?php
    $sql_tintuc = "SELECT * FROM post ORDER BY post_id DESC";
    $query_tintuc = mysqli_query($mysqli, $sql_tintuc);
?>

<div class="container" id="tintuc">
    <div class="row">
        <?php
        while ($row = mysqli_fetch_array($query_tintuc)){
            if ($row['tinhtrang'] == '1'){
        ?>  
            <div class="col-6 col-md-4 col-lg-3 ">
                <div class="card">
                <img class="card-image-top" src="admincp/modules/quanlytintuc/uploads/<?php echo $row['hinhanh'] ?>" alt="Card image cap">
                <div class="card-body">
                    <a class="tintuc-tilte" href="index.php?quanly=chitiettintuc&id=<?php echo $row['post_id'] ?>">
                    <h5 class="card-title"><?php echo $row['tieude']?></h5>
                    </a>
                    <?php echo $row['tomtat']?></p>
                    </div>
                </div>
            </div>
        
        <?php  
            }
        }
        ?>
    </div>
</div>
