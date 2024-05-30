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
        elseif ($temp == 'thongtinlienhe' && $query == 'xem'){
            include("modules/thongtinlienhe/list.php");
        }
        if($temp == "quanlychuyendi"){
            switch($query){
                case '': header("Location:./"); break;
                case "view": include("modules/quanlychuyendi/viewTour.php"); break;
                case "add": include("modules/quanlychuyendi/addTour.php"); break;
                case "edit": include("modules/quanlychuyendi/editTour.php"); break;
            }
        }
        if($temp == "quanlybinhluan"){
            include("modules/quanlybinhluan/review_list.php");
        }
        if ($temp == '') {
            include("modules/quanlychuyendi/viewTour.php");
        }
        if($temp == "quanlyvedat"){
            include("modules/quanlyvedat/viewBook.php");
        }
    ?>
</div>