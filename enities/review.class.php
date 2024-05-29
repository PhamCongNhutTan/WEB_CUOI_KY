<?php
class Review
{
    private $review_id;
    private $user_id;
    private $tour_id;
    private $content;
    private $rate;
    private $review_date;
    private $type;

    // Constructor
    public function __construct($review_id = null, $user_id = null, $tour_id = null, $content = null, $rate = null, $review_date = null, $type = null)
    {
        $this->review_id = $review_id;
        $this->user_id = $user_id;
        $this->tour_id = $tour_id;
        $this->content = $content;
        $this->rate = $rate;
        $this->review_date = $review_date;
        $this->type = $type;
    }

    // Getter and Setter methods
    public function getReviewId()
    {
        return $this->review_id;
    }

    public function setReviewId($review_id)
    {
        $this->review_id = $review_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getTourId()
    {
        return $this->tour_id;
    }

    public function setTourId($tour_id)
    {
        $this->tour_id = $tour_id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function getReviewDate()
    {
        return $this->review_date;
    }

    public function setReviewDate($review_date)
    {
        $this->review_date = $review_date;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
?>