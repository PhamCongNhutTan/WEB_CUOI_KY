<?php 
   class User{
        
        private $email;
        private $phone;
        private $imagePath;
        private $role;
        
        public function __construct($userID)
        {
                global $mysqli;
                $query = $mysqli->prepare("SELECT * FROM User WHERE User_ID = ".$userID);
                $query->execute();
                $result = $query->get_result();
                $row = $result->fetch_assoc();
                $this->email = $row["Email"];
                $this->phone = $row["Phone"];
                $this->imagePath = $row["ImagePath"];
                $this->role = $row["Role"];
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of phone
         */ 
        public function getPhone()
        {
                return $this->phone;
        }

        /**
         * Set the value of phone
         *
         * @return  self
         */ 
        public function setPhone($phone)
        {
                $this->phone = $phone;

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
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }
    }
?>