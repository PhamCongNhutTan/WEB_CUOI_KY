<div class="container" style="margin-top: 50px; padding-top: 50px; border-top: 1px solid grey;">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="container-fluid" id="binhluan">
                <?php
                if (isset($_GET['id'])) {
                    $news_id = $_GET['id'];
                    $type = $_GET['quanly'];
                    ?>
                    <form method="POST" action="./modules/comment.php" enctype="multipart/form-data" id="commentForm">
                        <h6>Hãy cho chúng tôi biết ý kiến của bạn</h6>
                        <!-- Rating Stars Box -->
                        <div class="star-rating">
                            <input type="radio" id="1-star" name="rating" value="1" />
                            <label for="1-star" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="2-stars" name="rating" value="2" />
                            <label for="2-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="3-stars" name="rating" value="3" />
                            <label for="3-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="4-stars" name="rating" value="4" />
                            <label for="4-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="5-stars" name="rating" value="5" />
                            <label for="5-stars" class="star"><i class="fas fa-star"></i></label>
                        </div><br><br>

                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                            name="noidungbinhluan"></textarea>
                        <button class="btn-success" type="submit" name="dangbinhluan">Gửi</button>
                        <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
                        <input type="hidden" name="type" value="<?php echo $type; ?>">
                    </form>
                    <?php
                } else {
                    $news_id = $_GET['tourid'];
                    $type = $_GET['quanly'];
                    ?>
                    <form method="POST" action="./modules/comment.php" enctype="multipart/form-data" id="commentForm">
                        <h6>Hãy cho chúng tôi biết ý kiến của bạn</h6>
                        <!-- Rating Stars Box -->
                        <div class="star-rating">
                            <input type="radio" id="1-star" name="rating" value="1" />
                            <label for="1-star" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="2-stars" name="rating" value="2" />
                            <label for="2-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="3-stars" name="rating" value="3" />
                            <label for="3-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="4-stars" name="rating" value="4" />
                            <label for="4-stars" class="star"><i class="fas fa-star"></i></label>
                            <input type="radio" id="5-stars" name="rating" value="5" />
                            <label for="5-stars" class="star"><i class="fas fa-star"></i></label>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                            name="noidungbinhluan"></textarea>
                        <button class="btn-success" type="submit" name="dangbinhluan">Gửi</button>
                        <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
                        <input type="hidden" name="type" value="<?php echo $type; ?>">
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="container-fluid" id="binhluan-list">
                <h4>Đánh giá của khách hàng</h4>
                <?php
                $reviewController = new ReviewController();
                $reviewList = $reviewController->getReviews();
                foreach ($reviewList as $review) {
                    if ($review->getReviewId() == $news_id && $review->getType() == $type) {
                        echo
                            '<h6 class="cmt-name">' . $reviewController->getUserNameByUserID($review->getUserId()) . '</h6>
                            <p class="cmt-star">' . $review->getRate() . ' <i class="fas fa-star" style="color: #f2b600;"></i></p>
                            <p class="cmt-date">' . date("d/m/Y", strtotime($review->getReviewDate())) . '</p>
                            <p class="cmt-content">' . $review->getContent() . '</p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const stars = document.querySelectorAll('.star-rating label');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const rating = this.previousElementSibling.value;
                document.querySelectorAll('.star-rating label').forEach(s => s.style.color = '#bbb');
                for (let i = 1; i <= rating; i++) {
                    document.querySelector(`.star-rating input[value="${i}"] ~ label`).style.color = '#f2b600';
                }
            });
        });
    });
</script>