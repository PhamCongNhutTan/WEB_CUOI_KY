<?php
include_once ("../enities/tour.class.php");
include_once ("../modules/tour_controller.php");
if (isset($_GET["type"])) {
    $type = $_GET["type"];
} else {
    $type = "";
}
?>
<div class="container" id="viewTour">
    <a style="text-decoration: none;" href="?action=quanlychuyendi&query=add">
        <button id="create" type="button" class="btn btn-success text-success ms-2 mt-3"
            style="background-color: inherit">
            <i class="bi bi-plus-circle text-success"></i><a style="text-decoration: none; color: green;"
                href="?action=quanlychuyendi&query=add"> Thêm chuyến đi</a>
        </button>
    </a>
    <div class="mt-3">
        <label style="display:block;" for="">Trạng thái</label>
        <select class="form-select" style="width: 25%; padding: 4px;" name="type" id="" onchange="handleSelect(this);">
            <option value="Không" <?php if ($type == "khong" || $type == "")
                echo "selected" ?>>Không</option>
                <option value="Đang mở" <?php if ($type == "dangmo")
                echo "selected" ?>>Đang mở</option>
                <option value="Đang đóng" <?php if ($type == "dangdong")
                echo "selected" ?>>Đang đóng</option>
            </select>
        </div>
        <table id="tour" class="table table-md table-striped my-3">
            <thead>
                <tr>
                    <th scope="col">Thứ tự</th>
                    <th scope="col">Tên chuyến đi</th>
                    <th scope="col">Địa điểm</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Chi phí</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php


            $tourList = TourController::getTours();
            $filteredTourList = array();
            foreach ($tourList as $tour) {
                if ($type == "khong" || $type == "") {
                    $filteredTourList[] = $tour;
                }
                if ($type == "dangmo") {
                    if ($tour->getType() == "Đang mở")
                        $filteredTourList[] = $tour;
                }
                if ($type == "dangdong") {
                    if ($tour->getType() == "Đang đóng")
                        $filteredTourList[] = $tour;
                }
            }
            foreach ($filteredTourList as $tour) {
                ?>
                <tr class="py-3">
                    <td style="text-align: center;"><?php echo $tour->getTourID() ?></td>
                    <td><?php echo $tour->getName() ?></td>
                    <td><?php echo $tour->getLocation() ?></td>
                    <td style="text-wrap: nowrap;"><?php echo $tour->getDescription() ?></td>
                    <td><?php echo $tour->getBasePrice() ?> VND</td>
                    <td>
                        <img style="width: 100%; max-width: 300px;" class="border-2 rounded"
                            src="<?php echo "../images/tour/" . $tour->getTourID() . "/" . $tour->getImagePath() ?>"
                            width="100px" alt="">
                    </td>
                    <td style="text-wrap: nowrap;"><?php echo ($tour->getType() ?? "Không có") ?></td>
                    <td>
                        <button type="button" class="btn btn-primary"> <a style="text-decoration:none; color:white;"
                                href="?action=quanlychuyendi&query=edit&tour_id=<?php echo $tour->getTourID() ?>"><i
                                    class="bi bi-pencil"></i></a></button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    function handleSelect(select) {
        var selectedValue = select.value;
        if (selectedValue === "Không") {
            location.href = "?action=quanlychuyendi&query=view&type=khong";
        } else if (selectedValue === "Đang mở") {
            location.href = "?action=quanlychuyendi&query=view&type=dangmo";
        } else if (selectedValue === "Đang đóng") {
            location.href = "?action=quanlychuyendi&query=view&type=dangdong";
        }
    }
</script>