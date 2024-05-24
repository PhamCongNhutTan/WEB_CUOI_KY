<div class="clear" style="clear:both;"></div>
<div class="main">
    <?php
        if (isset($_GET['action'])){
            $temp = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $temp = '';
            $query = '';
        }
        if($temp == 'quanlytintuc' && $query == 'them'){
            include("modules/quanlytintuc/add.php");
            include("modules/quanlytintuc/list.php");
        }
        elseif ($temp == 'quanlytintuc' && $query == 'edit'){
            include("modules/quanlytintuc/edit.php");
        }
        else{
            include("modules/dashboard.php");
        }
    ?>
</div>