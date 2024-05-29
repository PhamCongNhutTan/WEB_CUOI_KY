<div id="notification" style="width: 300px; position: fixed; top: 100px; right: 10px;"
    class="mt-3 d-none text-center alert alert-success alert-dismissible" role="alert">Thêm chuyến đi thành công</div>
<div class="container" id="chuyendi">
    <?php
    if (isset($_GET["tourid"])) {
        $tour = TourController::getTourByID(($_GET["tourid"]));
    }
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

                var formData = new FormData(this);
                formData.append("addCart", "true");

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "./modules/cart.php", true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        document.getElementById("notification").classList.remove("d-none");
                        form.reset();
                        setTimeout(function () {
                            document.getElementById("notification").classList.add("d-none");
                        }, 3000); // Hide notification after 3 seconds
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
    });
</script>

<?php
include("binhluan.php");
?>