<?php
include_once("./enities/tour.class.php");
include_once("./modules/tour_controller.php");
?>
<div class="container" id="chuyendi">
    <?php
        $tourController = new TourController();
        $tourList = $tourController->getTours();
        foreach ($tourList as $tour) {
            echo '<div class="row my-5" style="cursor: pointer; user-select: none;" onclick=\'location.href="#"\'>
                    <div class="col-12 col-md-6">
                        <img class="tour-image" src="./images/tour/'.$tour->getTourID().'/'.$tour->getImagePath().'">
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="price">'.$tour->getBasePrice().' VND</p>
                        <div class="tour-content">
                            <a href="">
                                <h4>'.$tour->getName().'</h4>
                            </a>
                            <h7 style="display: block;" >'.$tour->getLocation().'</h7>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                            <p>'.$tour->getDescription().'</p>
                            <a href="" class="btn-by-tour">Mua chuyến đi</a>
                        </div>
                    </div>
                </div>';
        }

    ?>
</div>