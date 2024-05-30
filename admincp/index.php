<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/logout.css">
    <link rel="stylesheet" href="./css/viewTour.css">
    <link rel="stylesheet" href="./css/addTour.css">
    <link rel="stylesheet" href="./css/alert.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/quanlytintuc.css" type="text/css">
    <link rel="stylesheet" href="css/thongtinlienhe.css" type="text/css">
    <link rel="stylesheet" href="css/quanlychuyendi.css" type="text/css">
    <link rel="stylesheet" href="css/toggleAvatar.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</head>

<body>
    <?php
    session_start();
    include("config/config.php");
    include("../enities/user.class.php");
    include("../enities/tour.class.php");
    include("../modules/tour_controller.php");
    if (isset($_SESSION["dangnhap"]) && isset($_SESSION["User_ID"])) {
        $user = new User($_SESSION["User_ID"]);
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] != "admin") {
        header("Location:../");
    }
    include("modules/menu.php");
    ?>
    <h2 class="text-center">WELCOME TO ADMIN</h2>
    <div class="container">
        <?php
        include("modules/header.php");
        include("modules/main.php");
        ?>
    </div>
    <?php
    include("modules/footer.php");
    ?>
    <script>
        
        ClassicEditor
            .create(document.querySelector('#tomtat'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#noidung'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#detail'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        
    </script>
</body>

</html>