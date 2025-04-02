<?php 
    class Validate {
        // Function That Checks Each Input Fields and Check if it is Empty
        public function checkEmpty ($data, $fields) {
            $message = null;
            // Iterate Th
            foreach ($fields as $value) {

                if (empty(trim($data[$value]))) {
                    $message .= "$value, ";
                }
            }//end foreach

            if ($message != null) {
                $message .= "Field(s) Cannot be Empty";
            }
            return $message;
        } 

        // Function to Validate the Date of Birth Input, Using the Same Principals as the ValidAge Function in the Lesson
        // Using a Pattern Cobbled Together Using These Resources 
        // https://www.youtube.com/watch?v=zPeEU9dP83M Learning the Syntax for Patterns
        // https://regex101.com/ Testing the Pattern (Besides Using the Database)
        public function validDateOfBirth($value) {
            if ($value != null) {
                $dateArray = array();//Create a new Array to Store the Individual Numbers for the Date
                $dateArray = explode("-", $value);
                /* Split the $value String Variable Into an Array Based on the Hyphen Character 
                    So 1967-05-23 Becomes ["1967", "05", "23"]*/
                //Convert Each of the Element of the Array Created Above Into an Integer
                $dateYear = (int)$dateArray[0];
                $dateMonth = (int)$dateArray[1];
                $dateDay = (int)$dateArray[2];

                $validYear = false;
                $validMonth = false;
                $validDay = false;

                //If the $dateYear is Between or Equal to 1900 and 2025, set $validYear to True
                if ($dateYear <= 2025 && $dateYear >= 1900) {
                    $validYear = true;
                }
                //If the $dateMonth is Between or Equal to 1 and 12, set $validMonth to True
                if ($dateMonth >= 01 && $dateMonth <= 12 ){
                    $validMonth = true;
                }
                //If the $dateDay is Between or Equal to 1 and 31, set $validDay to True
                if ($dateDay >= 01 && $dateDay <= 31 ){
                    $validDay = true;
                }

                if ($validYear && $validMonth && $validDay ) {
                    return true;
                }
            }
            return false;
        }
        //Function That Checks if an Email Input, is a Valid Email
        public function validEmail ($email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }

            return false;
        }
        //Function That Checks if an Input is a Valid Name (I.E: Only Alphabetical Characters )
        public function validName($name){
            //If the $name Variable Matches the Pattern Below, Return True
            if (preg_match("/^[a-zA-z]{1,}+$|[a-zA-z]{1,}\s[a-zA-z]{1,}+$|[a-zA-z]{1,}-[a-zA-z]{1,}+$/", $name)) {
                return true;
            }
            return false;
        }
        //Function That Checks if an Input is a Valid Password (I.E has all of the Requirements Listed)
        public function validPassword ($pass) {
            //Variables That Store the State of the Password Requirements
            $containsSpecial = false;
            $containsNumber = false;
            $correctLength = false;
            //Array That Stores What Counts as a Special Character
            $specialChar = array('~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '{', '}', '[', ']', '|', '\\', ';', ':', '"', '<', '>', ',', '.', '/', '?' );
            //Iterate Through the specialChar Array, and if any of the Elements in the Array are in the String Turn the Corresponding Condition Variable to True
            for ($i = 0; $i < count($specialChar); $i++) {
                if (str_contains($pass, $specialChar[$i])) {
                    $containsSpecial = true;
                }
            }
            //Iterate Through the Password String, and if any of the Character are the Digits 0-9 Turn the Corresponding Condition Variable to True
            for ($i = 0; $i < 10; $i++) {
                if (str_contains($pass, (string)$i ) ) {
                    $containsNumber = true;
                }
            }
            //If the Password String is 8 Character or More in Length Turn the Corresponding Condition Variable to True
            if (strlen($pass) >= 8) {
                $correctLength = true;
            }

            //If all Three Condition Variables are True 
            if ($containsSpecial && $containsNumber && $correctLength) {
                return true;
            }
            return false;
        }

        public function availableEmail ($email, $table) {

            foreach ($table as $key=> $row) {
                if ($email === $row['email']) {
                    return false;
                }
            }
            return true;
        }

        public function validRating ($ratingValue) {
            if (preg_match("/^[1-5]+$/", $ratingValue) ) {
                return true;
            }
            return false;
        }

        public function samePasswords ($password1, $password2) {
            if ($password1 == $password2) {
                return true;
            }
            return false;
        }

        public function sanitizeString ($text) {
            $text = str_replace("'", "’", $text);

            return $text;
        }

        public function checkLength ($fields, $data, $lengths) {
            $msg = null;

            for ($i = 0; $i < count($fields); $i++) {

                if (strlen($data[$i]) > $lengths[$i]) {
                    $msg .= "" . $fields[$i] . ", ";
                }
            }

            if ($msg != null) {
                $msg .= "Field(s) Exceeds Maximum Allowed Characters";
            }

            return $msg;
        }
    }
?>