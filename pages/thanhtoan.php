<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/297f8955c3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/chuyendi.css" type="text/css">
    <link rel="stylesheet" href="../css/modalLogin.css">
    <link rel="stylesheet" href="../css/chitietchuyendi.css" type="text/css">
    <link rel="stylesheet" href="../css/lienhe.css" type="text/css">
    <link rel="stylesheet" href="../css/tintuc.css" type="text/css">
    <link rel="stylesheet" href="../css/bar.css" type="text/css">
    <link rel="stylesheet" href="../css/numeric.css" type="text/css">
    <link rel="stylesheet" href="../css/giohang.css" type="text/css">
    <link rel="stylesheet" href="../css/thanhtoan.css" type="text/css">
    <link rel="stylesheet" href="../admincp/css/alert.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</head>

<body style="min-height: 100vh;">
    <div id="wrapper" style="min-height: inherit;">
        <?php
        session_start();

        include("../config/config.php");
        include("../enities/user.class.php");
        include("../enities/tour.class.php");
        include("../enities/book.class.php");
        include("../modules/tour_controller.php");
        include("../modules/book_controller.php");
        if (isset($_SESSION["dangnhap"]) && isset($_SESSION["User_ID"])) {
            $user = new User($_SESSION["User_ID"]);
        }
        include("./menu_thanhtoan.php"); ?>
        <?php
        if (!isset($_POST["items"])) {
            $array = $_SESSION["bill"];
        } else {
            $array = json_decode($_POST["items"], true);
            $array = array_values($array);
            $_SESSION["bill"] = $array;
        }
        ?>
        <div class="container my-3">
            <h3 class="mt-3"><span class="bar"></span>Thanh toán</h3>
            <div class="row">
                <div class="col-12 col-md-7 offset-md-1">
                    <div style="padding-top: 1.5rem!important;" class="head p-3 my-3 position-relative">
                        <h5 style="display: block;"><span class="smallbar"></span>Thông tin đơn hàng</h5>
                        <?php
                        $totalPrice = 0;
                        foreach ($array as $key => $item) {
                            $tour = TourController::getTourByID($item["tourID"]);
                            $totalPrice += $tour->getBasePrice() * $item["amount"];
                        ?>
                            <div class="item d-flex rounded-3 mt-3">
                                <img class="cart-image rounded mx-3" src="../images/tour/<?php echo $tour->getTourID() ?>/<?php echo $tour->getImagePath() ?>" alt="">
                                <div class="col-6 col-md-6 col-lg-8 col-xs-12">
                                    <h6 style="font-size: 1.2rem;"><?php echo $tour->getName() ?></h6>
                                    <h7 style="display: block; margin-bottom: 5px;"><?php echo $tour->getLocation() ?></h7>
                                    <h7 id="date"><?php echo $item["date"] ?></h7>
                                </div>
                                <div class="amount">x<?php echo $item["amount"] ?></div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <?php
                    if (!isset($_GET["message"])) {
                    ?>
                        <div class="head p-3 my-3">
                            <h5>Chọn phương thức thanh toán</h5>
                            <div class="payment my-3">
                                <input style="width:20px; height: 20px;" type="radio" class="form-check-input" name="payment" id="momo" value="momo">
                                <label for="momo" class="payMethod ms-2">MoMo QRCode</label>
                                <img class="payImage" src="../images/payment/momo.png">
                            </div>
                            <div class="payment my-3">
                                <input style="width:20px; height: 20px;" type="radio" class="form-check-input" name="payment" id="atm" value="ATM">
                                <label for="atm" class="payMethod ms-2">ATM</label>
                                <img class="payImage" src="../images/payment/momo.png">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="head p-3 my-3">
                        <h5>Tổng tiền</h5>
                        <div class="totalPrice" id="totalPrice"><?php echo number_format($totalPrice, 0, '', ',') ?> ₫</div>
                        <?php
                        if (!isset($_GET["message"])) {
                        ?>
                            <button type="button" style="background-color: #42b1a873;" name="addCart" class="btn btn-buy my-3 pay" onclick="handlePayment()">Thanh toán</button>
                        <?php
                        } else if ($_GET["message"] == "Successful.") {
                        ?>
                            <button type="button" style="background-color: #42b1a873;" name="addCart" class="btn btn-buy my-3 pay">Thanh toán thành công</button>
                        <?php
                            foreach ($array as $key => $item){
                                BookController::addBook($_SESSION["User_ID"], intval($item["tourID"]), $item["amount"], $item["date"]);
                            }
                            unset($_SESSION["bill"]);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./footer.php"); ?>
    <footer>
        Copyright &copy; 2024 by HKT TEAM
    </footer>
</body>
<script>
    function Number_To_VND(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Function to convert a formatted string with commas to a number
    function VND_To_Number(str) {
        return parseInt(str.replace(/,/g, ''));
    }

    function handlePayment() {
        // Get all radio buttons with name "payment"
        var paymentRadios = document.getElementsByName("payment");

        // Initialize variable to store selected value
        var selectedValue = "";

        // Loop through each radio button
        for (var i = 0; i < paymentRadios.length; i++) {
            // Check if the current radio button is checked
            if (paymentRadios[i].checked) {
                // If checked, store its value
                selectedValue = paymentRadios[i].value;
                break; // Exit the loop since we found the selected radio button
            }
        }
        if (selectedValue == "") {
            return;
        }
        var form = document.createElement("form");
        form.method = "POST";
        switch (selectedValue) {
            case "momo":
                form.action = "../modules/payment/payment_momo.php";
                break;
        }
        form.target = "_blank";
        form.enctype = "application/x-www-form-urlencoded";

        // var items = document.createElement("input");
        var amount = document.createElement("input");
        amount.type = "text";
        amount.name = "amount";
        price = document.querySelector("#totalPrice");
        amount.value = VND_To_Number(price.innerText);
        // items.name = "items";
        // items.value = JSON.stringify(selectedItems);
        form.appendChild(amount);

        form.classList.add("form-payment");
        document.body.appendChild(form);
        payment = document.querySelector(".form-payment");
        payment.submit();
    }
</script>

</html>