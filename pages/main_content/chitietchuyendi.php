<div class="container " id="chuyendi">
    <div id="alert" style="background-color: #effff5!important; top: 7rem;" class="alert">
        <span class="msg">Thêm vào giỏ hàng thành công</span>
        <div style="background-color: #ccf3d8!important;" class="close-btn">
            <span style="color: #696969!important;" class="fas fa-times"></span>
        </div>
    </div>
    <?php
    if (isset($_GET["tourid"])) {
        $tour = TourController::getTourByID(($_GET["tourid"]));
        $tour->setBasePrice(number_format($tour->getBasePrice(), 0, '', ','));
    }
    ?>
    <h2 class="my-3"><?php echo $tour->getName() ?></h2>
    <div class="row border-0 my-3">
        <div class="col-8 p-1">
            <img class="tourImage" style="max-width: 100%"
                src='./images/tour/<?php echo $tour->getTourID() ?>/<?php echo $tour->getImagePath() ?>'>
        </div>
        <div class="col-4 p-1">
            <iframe class="map" style="width: 100%; height: 100%;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30990.256973994987!2d100.6972529!3d13.852113!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d630d80329d73%3A0x5d1594b915327b6c!2sSafari%20World!5e0!3m2!1svi!2s!4v1716964522042!5m2!1svi!2s"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <input style="width: 20%;" class="mx-2 numeric form-control p-0 m-0 ps-4" type="number"
                            name="amount" id="amount" value="1" min="1" max="100" step="1" readonly>
                        <button type="button" id="increment" onclick="stepper(this)"> + </button>
                    </p>
                    <input type="date" id="date" name="date" class="date form-control my-3" style="width: 50%;">
                    <input class="d-none" id="tourid" name="tourid" type="text"
                        value="<?php echo $tour->getTourID() ?>">
                    <div class="row border-0">
                        <button type="submit" name="addCart" class="btn btn-buy col-12 col-lg-7">Thêm vào giỏ
                            hàng</button>
                        <button type="button" name="buyCart" class="btn btn-buy col-12 col-lg-4"
                            onclick="handlePayment()">Đặt ngay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const myInput = document.getElementById("amount");
    const dateInput = document.getElementById('date');
    var today = new Date();
    var tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);

    var day = ("0" + tomorrow.getDate()).slice(-2);
    var month = ("0" + (tomorrow.getMonth() + 1)).slice(-2);
    var year = tomorrow.getFullYear();

    var minDate = year + "-" + month + "-" + day;
    dateInput.min = minDate;

    function alertSuccess() {
        $('.alert').addClass("show");
        $('.alert').removeClass("hide");
        $('.alert').addClass("showAlert");
        setTimeout(function () {
            $('.alert').removeClass("show");
            $('.alert').addClass("hide");
        }, 3000);
    }
    $('.close-btn').click(function () {
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
    });

    function stepper(btn) {
        let id = btn.getAttribute("id");
        let min = myInput.getAttribute("min");
        let max = myInput.getAttribute("max");
        let step = myInput.getAttribute("step");
        let val = myInput.getAttribute("value");
        let calcStep = (id == "increment") ? (step * 1) : (step * -1);
        let newValue = parseInt(val) + calcStep;

        if (newValue >= min && newValue <= max) {
            myInput.setAttribute("value", newValue);
        }
    }

    function handlePayment() {
        var selectedItems = [];

        var addForm = document.querySelector("#addCartForm");
        var tourID = addForm.querySelector("#tourid").value;
        var amount = parseInt(addForm.querySelector("#amount").value);
        var date = addForm.querySelector("#date").value;
        selectedItems.push({ tourID, amount, date });
        console.log(selectedItems);
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "./pages/thanhtoan.php"

        var items = document.createElement("input");
        items.type = "hidden";
        items.name = "items";
        items.value = JSON.stringify(selectedItems);
        form.appendChild(items);
        form.classList.add("payment");
        document.body.appendChild(form);
        payment = document.querySelector(".payment");
        payment.submit();

    }
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("addCartForm");
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            if (!dateInput.value) {
                return;
            }

            // Prevent default form submission
            var formData = new FormData(this);
            formData.append("addCart", "true");

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./modules/cart.php", true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alertSuccess();
                    // Hide notification after 3 seconds
                } else {
                    // Error handling
                    console.error(xhr.responseText);
                }
            };
            xhr.onerror = function () {
                console.error("Request failed");
            };
            xhr.send(formData);
        });
    });
</script>