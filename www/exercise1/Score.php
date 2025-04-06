<?php
    class score
    {
        // I've used a class instead raw data pasted into the code for hypothetical future testing and clarity
        protected $username;
        protected $digits;
        public $score;
        function __construct($username,$digits,$score) {
            $this->username=$username;
            $this->digits=$digits;
            $this->score=$score;
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
         * Get the value of score
         */ 
        public function getScore()
        {
                return $this->score;
        }

        /**
         * Set the value of score
         *
         * @return  self
         */ 
        public function setScore($score)
        {
                $this->score = $score;

                return $this;
        }

        /**
         * Get the value of digits
         */ 
        public function getDigits()
        {
                return $this->digits;
        }

        /**
         * Set the value of digits
         *
         * @return  self
         */ 
        public function setDigits($digits)
        {
                $this->digits = $digits;

                return $this;
        }
    }
    

?>
    
