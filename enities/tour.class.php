<?php 
   class Tour{
        private $tourID;
        private $name;
        private $location;
        private $basePrice;
        private $imagePath;
        private $type;
        private $description;
        private $detail;
        private $google;

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
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of location
         */ 
        public function getLocation()
        {
                return $this->location;
        }

        /**
         * Set the value of location
         *
         * @return  self
         */ 
        public function setLocation($location)
        {
                $this->location = $location;

                return $this;
        }

        /**
         * Get the value of basePrice
         */ 
        public function getBasePrice()
        {
                return $this->basePrice;
        }

        /**
         * Set the value of basePrice
         *
         * @return  self
         */ 
        public function setBasePrice($basePrice)
        {
                $this->basePrice = $basePrice;

                return $this;
        }

        /**
         * Get the value of imagePath
         */ 
        public function getImagePath()
        {
                return $this->imagePath;
        }

        /**
         * Set the value of imagePath
         *
         * @return  self
         */ 
        public function setImagePath($imagePath)
        {
                $this->imagePath = $imagePath;

                return $this;
        }

        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of type
         *
         * @return  self
         */ 
        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of detail
         */ 
        public function getDetail()
        {
                return $this->detail;
        }

        /**
         * Set the value of detail
         *
         * @return  self
         */ 
        public function setDetail($detail)
        {
                $this->detail = $detail;

                return $this;
        }

        /**
         * Get the value of google
         */ 
        public function getGoogle()
        {
                return $this->google;
        }

        /**
         * Set the value of google
         *
         * @return  self
         */ 
        public function setGoogle($google)
        {
                $this->google = $google;

                return $this;
        }
   }
?>