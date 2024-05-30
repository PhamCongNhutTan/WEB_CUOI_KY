<div class="container my-3">
    <h3 class="mt-3"><span class="bar"></span>Đơn hàng đã thanh toán</h3>
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div style="padding-top: 1.5rem!important;" class="head p-3 my-3 position-relative">
                <h5 style="display: block;"><span class="smallbar"></span>Thông tin đơn hàng</h5>
                <?php
                $totalPrice = 0;
                $books = BookController::getBooks();
                $userID = $_SESSION["User_ID"];
                foreach ($books as $key => $item) {
                    $tour = TourController::getTourByID($item->getTourID());
                    
                ?>
                    <div style="position: relative;" class="item d-flex rounded-3 mt-3">
                        <img class="cart-image rounded mx-3" src="./images/tour/<?php echo $tour->getTourID() ?>/<?php echo $tour->getImagePath() ?>" alt="">
                        <div class="col-6 col-md-6 col-lg-8 col-xs-12">
                            <h6 style="font-size: 1.2rem;"><?php echo $tour->getName() ?></h6>
                            <h7 style="display: block; margin-bottom: 5px;"><?php echo $tour->getLocation() ?></h7>
                            <h7 id="date"><?php echo $item->getBookDay() ?></h7>
                        </div>
                        <div class="amount">x<?php echo $item->getAmount() ?></div>
                        <div class="bookPrice"><?php echo number_format($item->getAmount() * $tour->getBasePrice(), 0, '', ',') ?> ₫</div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>