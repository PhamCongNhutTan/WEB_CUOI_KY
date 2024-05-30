<<<<<<< HEAD
<div id="notification" style="width: 300px; position: fixed; top: 100px; right: 10px;"
    class="mt-3 d-none text-center alert alert-success alert-dismissible" role="alert">Thêm chuyến đi thành công</div>
<div class="container" id="chuyendi">
<div class="container " id="chuyendi">
    <div id="alert" style="background-color: #effff5!important; top: 7rem;" class="alert">
        <span class="msg">Thêm vào giỏ hàng thành công</span>
        <div style="background-color: #ccf3d8!important;" class="close-btn">
            <span style="color: #696969!important;" class="fas fa-times"></span>
        </div>
    </div>
=======
<div id="notification" style="width: 300px; position: fixed; top: 100px; right: 10px;" class="mt-3 d-none text-center alert alert-success alert-dismissible" role="alert">Thêm chuyến đi thành công</div>
<div class="container" id="chuyendi">
>>>>>>> parent of aab4c2b (feat: thanh toán, chi tiết chuyến đi, giỏ hàng full)
    <?php
    if (isset($_GET["tourid"])) {
        $tour = TourController::getTourByID(($_GET["tourid"]));
    }
<<<<<<< HEAD
    $tour_id = $tour->getTourID();
    $sql_avg_star = "SELECT AVG(Rate) AS Avg_Rate FROM review WHERE Tour_ID = '$tour_id' && Type = 'chitietchuyendi'";
    $query_avg_star = mysqli_query($mysqli, $sql_avg_star);
    $result_avg_star = mysqli_fetch_assoc($query_avg_star);
    $avg_star = round($result_avg_star["Avg_Rate"], 1);
    echo '<div class="row my-5" style="cursor: pointer; user-select: none;">
                    <div class="col-12 col-md-6">
                        <img class="tour-image" src="./images/tour/' . $tour->getTourID() . '/' . $tour->getImagePath() . '">
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="price">' . $tour->getBasePrice() . ' VND</p>
                        <div class="tour-content">
                            <a href="">
                                <h4>' . $tour->getName() . '</h4>
                            </a>
                            <h7 style="display: block;" ><i style="color: gray;" class="bi bi-geo-alt-fill"> </i>' . $tour->getLocation() . '</h7>
                            <p>' . $avg_star . ' <i class="fa-solid fa-star"></i></p>
                            <p class="two-line-text">' . $tour->getDescription() . '</p>
                            <form class="d-flex" id="addCartForm" method="POST"' . '">
                              <input class="d-none" name="tourid" type="text" value="' . $tour->getTourID() . '"> 
                              <button style="text-wrap: nowrap;" type="submit" name="addCart" class="btn-by-tour">Thêm vào giỏ hàng</button>
                              <input style="width: 13%;"class="ms-3 form-control p-0 m-0 ps-4" type="number" name="amount" id="amount" value="1" min="1">    
                            </form>
                        </div>
                    </div>
                </div>';

    ?>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const forms = document.querySelectorAll("#addCartForm");
        forms.forEach(function (form) {
            form.addEventListener("submit", function (e) {
                e.preventDefault(); // Prevent default form submission
    ?>
    <h2 class="my-3"><?php echo $tour->getName() ?></h2>
    <div class="row border-0 my-3">
        <div class="col-8 p-1">
            <img class="tourImage" style="max-width: 100%" src='./images/tour/<?php echo $tour->getTourID() ?>/<?php echo $tour->getImagePath() ?>'>
        </div>
        <div class="col-4 p-1">
            <iframe class="map" style="width: 100%; height: 100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30990.256973994987!2d100.6972529!3d13.852113!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d630d80329d73%3A0x5d1594b915327b6c!2sSafari%20World!5e0!3m2!1svi!2s!4v1716964522042!5m2!1svi!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="row border-0 my-3">
        <div class="col-12 col-md-8 detail" id="detail">
            <?php
            echo $tour->getDetail();
            ?>

        </div>
        <div class="col-12 col-md-4">
            <div class="buy">
                <form id="addCartForm" method="POST" action="">
                    <p class="buy-price d-flex">
                        <h7 class="me-3 pt-2"><?php echo $tour->getBasePrice() ?> ₫</h7>
                        <button type="button" id="decrement" onclick="stepper(this)"> - </button>
                        <input style="width: 20%;" class="mx-2 numeric form-control p-0 m-0 ps-4" type="number" name="amount" id="amount" value="1" min="1" max="100" step="1" readonly>
                        <button type="button" id="increment" onclick="stepper(this)"> + </button>
                    </p>
                    <input type="date" id="date" name="date" class="date form-control my-3" style="width: 50%;">
                    <input class="d-none" id="tourid" name="tourid" type="text" value="<?php echo $tour->getTourID() ?>">
                    <div class="row border-0">
                        <button type="submit" name="addCart" class="btn btn-buy col-12 col-lg-7">Thêm vào giỏ hàng</button>
                        <button type="button" name="buyCart" class="btn btn-buy col-12 col-lg-4" onclick="handlePayment()">Đặt ngay</button>
=======
    echo '<div class="row my-5" style="cursor: pointer; user-select: none;">
                    <div class="col-12 col-md-6">
                        <img class="tour-image" src="./images/tour/' . $tour->getTourID() . '/' . $tour->getImagePath() . '">
>>>>>>> parent of aab4c2b (feat: thanh toán, chi tiết chuyến đi, giỏ hàng full)
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="price">' . $tour->getBasePrice() . ' VND</p>
                        <div class="tour-content">
                            <a href="">
                                <h4>' . $tour->getName() . '</h4>
                            </a>
                            <h7 style="display: block;" ><i style="color: gray;" class="bi bi-geo-alt-fill"> </i>' . $tour->getLocation() . '</h7>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                            <p class="two-line-text">' . $tour->getDescription() . '</p>
                            <form class="d-flex" id="addCartForm" method="POST"' . '">
                              <input class="d-none" name="tourid" type="text" value="' . $tour->getTourID() . '"> 
                              <button style="text-wrap: nowrap;" type="submit" name="addCart" class="btn-by-tour">Thêm vào giỏ hàng</button>
                              <input style="width: 13%;"class="ms-3 form-control p-0 m-0 ps-4" type="number" name="amount" id="amount" value="1" min="1">    
                            </form>
                        </div>
                    </div>
                </div>';

    ?>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const forms = document.querySelectorAll("#addCartForm");
        forms.forEach(function(form) {
            form.addEventListener("submit", function(e) {
                e.preventDefault(); // Prevent default form submission

                var formData = new FormData(this);
                formData.append("addCart", "true");

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "./modules/cart.php", true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById("notification").classList.remove("d-none");
                        form.reset();
                        setTimeout(function() {
                            document.getElementById("notification").classList.add("d-none");
                        }, 3000); // Hide notification after 3 seconds
                    } else {
                        // Error handling
                        console.error(xhr.responseText);
                    }
                };
                xhr.onerror = function() {
                    console.error("Request failed");
                };
                xhr.send(formData);
            });
        });
    });
</script>

<?php
include ("binhluan.php");
?>