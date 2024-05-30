<?php 
   class Book{
        private $bookID;
        private $tourID;
        private $userID;
        private $username;
        private $tourname;
        private $amount;
        private $bookDay;
        private $totalPrice;

        /**
         * Get the value of bookID
         */ 
        public function getBookID()
        {
                return $this->bookID;
        }

        /**
         * Set the value of bookID
         *
         * @return  self
         */ 
        public function setBookID($bookID)
        {
                $this->bookID = $bookID;

                return $this;
        }

        /**
         * Get the value of tourID
         */ 
        public function getTourID()
        {
                return $this->tourID;
        }

        /**
         * Set the value of tourID
         *
         * @return  self
         */ 
        public function setTourID($tourID)
        {
                $this->tourID = $tourID;

                return $this;
        }

        /**
         * Get the value of userID
         */ 
        public function getUserID()
        {
                return $this->userID;
        }

        /**
         * Set the value of userID
         *
         * @return  self
         */ 
        public function setUserID($userID)
        {
                $this->userID = $userID;

                return $this;
        }

        /**
         * Get the value of amount
         */ 
        public function getAmount()
        {
                return $this->amount;
        }

        /**
         * Set the value of amount
         *
         * @return  self
         */ 
        public function setAmount($amount)
        {
                $this->amount = $amount;

                return $this;
        }

        /**
         * Get the value of bookDay
         */ 
        public function getBookDay()
        {
                return $this->bookDay;
        }

        /**
         * Set the value of bookDay
         *
         * @return  self
         */ 
        public function setBookDay($bookDay)
        {
                $this->bookDay = $bookDay;

                return $this;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of tourname
         */ 
        public function getTourname()
        {
                return $this->tourname;
        }

        /**
         * Set the value of tourname
         *
         * @return  self
         */ 
        public function setTourname($tourname)
        {
                $this->tourname = $tourname;

                return $this;
        }

        /**
         * Get the value of totalPrice
         */ 
        public function getTotalPrice()
        {
                return $this->totalPrice;
        }

        /**
         * Set the value of totalPrice
         *
         * @return  self
         */ 
        public function setTotalPrice($totalPrice)
        {
                $this->totalPrice = $totalPrice;

                return $this;
        }
   }