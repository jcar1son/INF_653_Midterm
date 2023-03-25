<?php
    class TypesTable {

        //Returns a specified type of vehicle selected

        public static function get_type($ID) {

            $db = Database::getDB();
            $query = "SELECT * FROM types
                        WHERE ID = :ID";
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();

            $type = new VehicleType($row['ID'] ?? null, $row['type'] ?? null);
            return $type;

        }

        //gets all of the current types of vehicles 

        public static function get_types() {

            $db = Database::getDB();
            
            $query = "SELECT * FROM types ORDER BY ID";
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $types = [];
            foreach($rows as $row){

                $type = new VehicleType($row['ID'], $row['type']);
                $types[] = $type;

            }

            return $types;
        }

    }
?>