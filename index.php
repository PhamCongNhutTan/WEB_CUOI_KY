<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/297f8955c3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/chuyendi.css" type="text/css">
    <link rel="stylesheet" href="css/lienhe.css" type="text/css">
    <link rel="stylesheet" href="css/tintuc.css" type="text/css">
    <link rel="stylesheet" href="css/bar.css" type="text/css">
    <link rel="stylesheet" href="css/modalLogin.css" type="text/css">
    <link rel="stylesheet" href="css/binhluan.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <script src="js/scripts.js"></script>
</head>

<body>
    <div id="wrapper">
        <?php
        session_start();
        include ("./config/config.php");
        include ("./enities/user.class.php");
        include ("./enities/tour.class.php");
        include ("./enities/review.class.php");
        include ("./modules/tour_controller.php");
        include ("./modules/review_controller.php");
        if (isset($_SESSION["dangnhap"]) && isset($_SESSION["User_ID"])) {
            $user = new User($_SESSION["User_ID"]);
        }
        include("pages/menu.php");
        if($_GET["quanly"] != "chitietchuyendi")
            include("pages/header.php");
        include("pages/main.php");
        include("pages/footer.php");
        ?>
    </div>

    <footer>
        Copyright &copy; 2024 by HKT TEAM
    </footer>
</body>
<script>
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel)
</script>

</html>