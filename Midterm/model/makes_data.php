<?php
    class MakesTable {
      

        //gets the specific make
        public static function get_make($ID) {
            
            $db = Database::getDB();
            $query = "SELECT * FROM makes WHERE ID = :ID";
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();

            $make = new VehicleMake($row['ID'] ?? null, $row['make'] ?? null);

            return $make;

        }

        //gets all of the makes in the case there is no filter
        
        public static function get_makes() {
            $db = Database::getDB();
            $query = "SELECT * FROM makes ORDER BY ID";
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $makes = [];
            foreach ($rows as $row) {
                $make = new VehicleMake($row['ID'], $row['make']);
                $makes[] = $make;
            }

            return $makes;
        }
        

    }
?>