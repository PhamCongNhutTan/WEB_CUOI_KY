<?php
if (!isset($_SESSION["User_ID"])) {
    include("./pages/main_content/trangchu.php");
}
?>
<div class="container my-3">
    <h3 class="mt-3"><span class="bar"></span>Giỏ hàng</h3>
    <div class="row">
        <!-- ---CART---------------------------- -->
        <div class="col-12 col-md-9 p-1">
            <div class="head p-3 my-3">
                <input class="form-check-input all" name="all" id="checkboxAll" type="checkbox" value="false" onchange="handleAllCheckbox()">
                <label style="padding: 2px;">Chọn tất cả</label>
                <button style="padding: 0.5rem!important; border-radius: 1rem; top: 10px;" type="button" id="" class="btn btn-danger nohover"><a style="text-decoration:none; color:white;" href="./modules/cart.php?action=remove&key=all">Xóa tất cả</a></button>
            </div>
            <?php if (isset($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $key => $item) {
                    $tour = TourController::getTourByID($item["tourID"]);
                    $date = $_SESSION["cart"][$key]["date"];
                    $formattedDate = date("d/m/Y", strtotime($date)); ?>
                    <div class="cart head my-3 p-3 d-flex position-relative" data-price="<?php echo $tour->getBasePrice() ?>"  data-tourid="<?php echo $tour->getTourID() ?>" >
                        <input class="form-check-input all" name="all" id="cartCheckbox" type="checkbox" value="false" onchange="updateTotalPrice()">
                        <img class="cart-image rounded mx-3" src="./images/tour/<?php echo $tour->getTourID() ?>/<?php echo $tour->getImagePath() ?>" alt="">
                        <div class="col-6 col-md-6">
                            <h6 style="font-size: 1.2rem;"><?php echo $tour->getName() ?></h6>
                            <h7 style="display: block; margin-bottom: 5px;"><?php echo $tour->getLocation() ?></h7>
                            <h7 id="date"><?php echo $formattedDate ?></h7>
                        </div>
                        <div class="buy-price d-flex position-absolute">
                            <button type="button" id="decrement" onclick="stepper(this)"> - </button>
                            <input style="width: 40px; height: 40px;" class="mx-2 numeric form-control p-0 m-0 ps-3" type="number" name="amount" id="amount" value="1" min="1" max="100" step="1" onchange="updateTotal(this)" readonly>
                            <button type="button" id="increment" onclick="stepper(this)"> + </button>
                        </div>
                        <div class="cart-price" id="price"><?php echo number_format($tour->getBasePrice(), 0, '', ',') ?> ₫</div>
                        <button type="button" id="" class="btn btn-danger nohover"><a style="text-decoration:none; color:white;" href="./modules/cart.php?action=remove&key=<?php echo $key ?>"><i class="bi bi-trash"></i></a></button>
                    </div>
            <?php }
            } ?>
        </div>
        <!-- --------------------------- -->
        <div style="overflow: auto;" class="col-12 col-md-3">
            <div class="head p-3 my-3">
                <h5>Tổng tiền</h5>
                <div class="totalPrice" id="totalPrice">0 ₫</div>
                <button type="button" name="addCart" class="btn btn-buy my-3" onclick="handlePayment()">Thanh toán</button>
            </div>
        </div>
    </div>
    <?php
    if (!isset($_SESSION["cart"])) {
        echo "<h5 class='text-center'>Không có sản phẩm trong giỏ hàng</h5>";
    }
    ?>
</div>
<script>
    function formatDate(dateString) {
    // Split the date string into day, month, and year components
    var parts = dateString.split('/');
    var day = parts[0];
    var month = parts[1];
    var year = parts[2];

    // Rearrange the components in the desired order
    var formattedDate = year + '/' + month + '/' + day;

    return formattedDate;
}
    function updateTotalPrice() {
        var prices = document.querySelectorAll(".cart-price");
        var total = 0;
        prices.forEach(function(price) {
            var cartItem = price.parentElement;
            var checkbox = cartItem.querySelector("#cartCheckbox");
            if (checkbox.checked == true) {
                total += VND_To_Number(price.innerText);
            }
        });
        var totalPrice = document.querySelector(".totalPrice");
        totalPrice.innerText = Number_To_VND(total) + " ₫";
    }

    function handlePayment() {
        var cartCheckboxs = document.querySelectorAll("#cartCheckbox");
        var selectedItems = [];
        cartCheckboxs.forEach(function(checkbox) {
            if (checkbox.checked == true) {
                var cartItem = checkbox.closest(".cart");
                var tourID = cartItem.dataset.tourid;
                var amount = parseInt(cartItem.querySelector("#amount").value);
                var date = cartItem.querySelector("#date").innerText;
                date = formatDate(date);
                selectedItems.push({tourID, amount, date});
            }
        });
        if(selectedItems.length == 0){
            return;
        }
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "./pages/thanhtoan.php"
        
        var items = document.createElement("input");
        items.type = "hidden";
        items.name = "items";
        items.value = JSON.stringify(selectedItems);
        form.appendChild(items);
        form.classList.add("payment");
        form.target = "_blank";
        document.body.appendChild(form);
        payment = document.querySelector(".payment");
        payment.submit();
        location.href = "./index.php";
        
    }

    function handleAllCheckbox() {
        var checkboxAll = document.getElementById('checkboxAll');
        var cartCheckboxes = document.querySelectorAll('input[id^="cartCheckbox"]');

        // If checkboxAll is checked
        if (checkboxAll.checked) {
            cartCheckboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        } else { // If checkboxAll is unchecked
            cartCheckboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }
        updateTotalPrice();
    }
    // Function to convert a number to a formatted string with commas
    function Number_To_VND(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Function to convert a formatted string with commas to a number
    function VND_To_Number(str) {
        return parseInt(str.replace(/,/g, ''));
    }

    function updateTotal(input) {
        // Retrieve the parent element of the input field
        var cartItem = input.closest('.cart');

        // Retrieve the quantity and price per item
        var quantity = parseInt(input.value);
        var pricePerItem = parseFloat(cartItem.dataset.price); // Assuming you have a data attribute for price

        // Calculate the new total price
        var totalPrice = quantity * pricePerItem;
        // Update the total price display on the page
        cartItem.querySelector('.cart-price').innerText = Number_To_VND(totalPrice) + " ₫"; // Update the total price display element
    }

    function stepper(btn) {
        let id = btn.getAttribute("id");
        let myInput = btn.parentElement.querySelector("input[type='number']");
        let min = myInput.getAttribute("min");
        let max = myInput.getAttribute("max");
        let step = myInput.getAttribute("step");
        let val = myInput.getAttribute("value");
        let calcStep = (id == "increment") ? (step * 1) : (step * -1);
        let newValue = parseInt(val) + calcStep;

        if (newValue >= min && newValue <= max) {
            myInput.setAttribute("value", newValue);
            updateTotal(myInput);
        }
        updateTotalPrice();
    }
</script>