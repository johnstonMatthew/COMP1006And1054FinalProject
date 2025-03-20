<?php 
    class Validate {
        public function checkEmpty ($data, $fields) {
            $message = null;
            
            foreach ($fields as $value) {

                if (empty($data[$value])) {
                    $message .= "<p> $value Field Cannot be Empty </p>";
                }
            }//end foreach
            return $message;
        } 

        // Function to Validate the Date of Birth Input, Using the Same Principals as the ValidAge Function in the Lesson
        // Using a Pattern Cobbled Together Using These Resources 
        // https://www.youtube.com/watch?v=zPeEU9dP83M Learning the Syntax for Patterns
        // https://regex101.com/ Testing the Pattern (Besides Using the Database)
        public function validDateOfBirth($value) {
            $dateArray = array();//Create a new Array to Store the Individual Numbers for the Date
            $dateArray = explode("-", $value);
            /* Split the $value String Variable Into an Array Based on the Hyphen Character 
                So 1967-05-23 Becomes ["1967", "05", "23"]*/

            //Convert Each of the Element of the Array Created Above Into an Integer
            $dateYear = (int)$dateArray[0];
            $dateMonth = (int)$dateArray[1];
            $dateDay = (int)$dateArray[0];

            //If the $dateYear is Between or Equal to 1900 and 2025, set $validYear to True
            if ($dateYear <= 2025 && $dateYear >= 1900) {
                $validYear = true;
            }
            //If the $dateMonth is Between or Equal to 1 and 12, set $validMonth to True
            if ($dateMonth <= 01 && $dateMonth >= 12 ){
                $validMonth = true;
            }
            //If the $dateDay is Between or Equal to 1 and 31, set $validDay to True
            if ($dateDay <= 01 && $dateDay >= 31 ){
                $validDay = true;
            }
        }

        public function validEmail ($email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }

            return false;
        }

        public function validName($name){
            //If the $name Variable Matches the Pattern Below, Return True
            if (preg_match("/^[a-zA-z]+$/", $name)) {
                return true;
            }
            return false;
        }

        public function validPassword ($pass) {
            $containsSpecial = false;
            $containsNumber = false;
            $correctLength = false;

            $specialChar = array('~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '{', '}', '[', ']', '|', '\\', ';', ':', '"', '<', '>', ',', '.', '/', '?' );

            for ($i = 0; $i < count($specialChar); $i++) {
                if (str_contains($pass, $specialChar[$i])) {
                    $containsSpecial = true;
                }
            }

            for ($i = 0; $i < 10; $i++) {
                if (str_contains($pass, (string)$i ) ) {
                    $containsNumber = true;
                }
            }

            if (strlen($pass) >= 8) {
                $correctLength = true;
            }

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
    }
?>