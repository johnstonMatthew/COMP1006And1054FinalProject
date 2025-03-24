<?php 
    
    class Utilities {
        public function returnData ($query, $connection) {
            
            $table = $connection->prepare($query);
            $table->execute();
            $tableData = $table->fetchAll();

            return $tableData;
        }
    } 
?>