<?php
include_once("../enities/tour.class.php");
include_once("../modules/tour_controller.php");
include_once("../enities/book.class.php");
include_once("../modules/book_controller.php");
?>
<div class="container" id="viewTour">
    <h3 style="text-align: left;" class="mt-3 "><span class="bar"></span>Quản lý vé đặt</h3>
    <div class="mt-3">
        <label style="display:block;" for="">Tìm kiếm</label>
        <form method="GET" action="?action=quanlyvedat">
            <input value="quanlyvedat" name="action" class="d-none">
            <input value="view" name="query" class="d-none">
            <input style="width: 25%;" type="text" class="form-control" name="search">
            <button class="d-none" type="submit"></button>
        </form>
    </div>
    <table id="tour" class="table table-md table-striped my-3">
        <thead>
            <tr>
                <th scope="col">Thứ tự</th>
                <th scope="col">Tên chuyến đi</th>
                <th scope="col">Tên người đặt</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Chi phí</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $search = isset($_GET["search"]) ? $_GET["search"] : "";
            $bookList = BookController::getBooks();

            foreach ($bookList as $book) {
                if (
                    !isset($_GET["search"]) ||
                    (stripos($book->getBookID(), $search) !== false ||
                        stripos($book->getTourID(), $search) !== false ||
                        stripos($book->getUserID(), $search) !== false ||
                        stripos($book->getUsername(), $search) !== false ||
                        stripos($book->getTourname(), $search) !== false ||
                        stripos($book->getAmount(), $search) !== false ||
                        stripos($book->getBookDay(), $search) !== false ||
                        stripos($book->getTotalPrice(), $search) !== false
                    )
                ) {
            ?>
                    <tr class="py-3">
                        <td style="text-align: center;"><?php echo $book->getBookID() ?></td>
                        <td><?php echo $book->getTourname() ?></td>
                        <td><?php echo $book->getUsername() ?></td>
                        <td style="text-align: center;"><?php echo $book->getAmount() ?></td>
                        <td><?php echo $book->getBookDay() ?></td>
                        <td><?php echo number_format($book->getTotalPrice(), 0, '', ',') ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>