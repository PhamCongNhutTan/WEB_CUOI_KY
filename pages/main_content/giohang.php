<div class="container my-3">
    <h3 class="mt-3"><span class="bar"></span>Giỏ hàng</h3>
    <table id="tour" class="table table-striped my-3 text-center">
        <thead>
            <tr>
                <th scope="col">Thứ tự</th>
                <th scope="col">Tên chuyến đi</th>
                <th scope="col">Địa điểm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Chi phí</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $key => $item) {
                    $tour = TourController::getTourByID($item["tourID"]); ?>
                    <tr class="py-3">
                        <td style="text-align: center;"><?php echo $tour->getTourID() ?></td>
                        <td><?php echo $tour->getName() ?></td>
                        <td><?php echo $tour->getLocation() ?></td>
                        <td>
                            <img style="width: 100%; max-width: 200px;" class="border-2 rounded" src="<?php echo "./images/tour/" . $tour->getTourID() . "/" . $tour->getImagePath() ?>" width="100px" alt="">
                        </td>
                        <td style="text-wrap: nowrap;"><?php echo ($item["amount"]); ?></td>
                        <td><?php echo $tour->getBasePrice() ?> VND</td>
                        <td>
                            <button type="button" id="nothover" class="btn btn-danger"> <a style="text-decoration:none; color:white;" href="./modules/cart.php?action=remove&tourid=<?php echo $tour->getTourID() ?>"><i class="bi bi-trash"></i></a></button>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
    <?php
    if (!isset($_SESSION["cart"])) {
        echo "<h5 class='text-center'>Không có sản phẩm trong giỏ hàng</h5>";
    } else {
    }

    ?>
</div>