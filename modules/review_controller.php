<?php
class ReviewController
{
    public static function getReviews()
    {
        global $mysqli;
        $reviews = array();

        $query = "SELECT * FROM Review";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc()) {
                $review = new Review();

                $review->setReviewId($row["Tour_ID"]);
                $review->setUserId($row["User_ID"]);
                $review->setTourId($row["Tour_ID"]);
                $review->setContent($row["Content"]);
                $review->setRate($row["Rate"]);
                $review->setReviewDate($row["Review_Date"]);
                $review->setType($row["Type"]);

                $reviews[] = $review;
            }
        }
        
        return $reviews;
    }

    public static function getUserNameByUserID($user_id)
    {
        global $mysqli;

        $query = "SELECT Username FROM `user_info` WHERE User_ID = " . $user_id;
        $result = $mysqli->query($query);
        $row = mysqli_fetch_assoc($result);
        $userName = $row["Username"];
        return $userName;
    }
}
?>