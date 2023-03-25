<?php
    class ClassesTable {

        //returns the specified class from the drop down list
        public static function get_class($ID) {

            $db = Database::getDB();
            $query = "SELECT * FROM classes
                        WHERE ID = :ID";
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();

            $class = new VehicleClass($row['ID'] ?? null, $row['class'] ?? null);

            return $class;

        }  
       
        //returns all of the general classes
        public static function get_classes() {

            $db = Database::getDB();
            $query = "SELECT * FROM classes ORDER BY class";
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $classes = [];

            foreach ($rows as $row) {

                $class = new VehicleClass($row['ID'], $row['class']);
                $classes[] = $class;

            }

            return $classes;
        }

    }
?>