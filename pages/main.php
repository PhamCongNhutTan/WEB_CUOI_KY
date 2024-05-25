<!-- MAIN -->
<div id="main">
    <?php
        if(isset($_GET['quanly'])) {
            $temp = $_GET['quanly'];
        } else {
            $temp = '';
        }

        if ($temp == 'chuyendi') {
            include('main_content/chuyendi.php');
        } else if ($temp == 'tintuc') {
            include('main_content/tintuc.php');
        } else if ($temp == 'lienhe') {
            include('main_content/lienhe.php');
        } else if ($temp == 'chitiettintuc') {
            include('main_content/chitiettintuc.php');
        } else if ($temp == 'giohang') {
            include('main_content/giohang.php');
        } else {
            include('main_content/trangchu.php');
        }
    ?>
</div>