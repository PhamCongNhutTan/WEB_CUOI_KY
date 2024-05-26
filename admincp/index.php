<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/logout.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/quanlytintuc.css" type="text/css">
</head>

<body>
    <?php
    include ("modules/menu.php");
    ?>
    <h2 class="text-center">WELCOME TO ADMIN</h2>
    <div class="container">
        <?php
        session_start();
        include ("config/config.php");
        include ("../enities/user.class.php");
        if (isset($_SESSION["dangnhap"]) && isset($_SESSION["User_ID"])) {
            $user = new User($_SESSION["User_ID"]);
        }
        if (isset($_SESSION["role"]) && $_SESSION["role"] != "admin") {
            header("Location:../");
        }
        include ("modules/header.php");
        include ("modules/main.php");
        include ("modules/footer.php");
        ?>
    </div>
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
    </script>
</body>

</html>