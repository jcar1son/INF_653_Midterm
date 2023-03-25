<?php
    class VehiclesTable {
       
        //returns the specific vehicles told by the user
        public static function get_vehicles_filtered($sort_by, $filters) {
            $db = Database::getDB();
            $query = "SELECT * FROM vehicles";

            // Applys the needed filters
            $query_arr = get_query_expressions($filters);

            
            //if the a filter hits a required vehicle then it sets the query array
            if (count($query_arr) > 0) {

                $query .= ' WHERE ';
                $query .= implode(' AND ', $query_arr);

            }

            //we do an order from highest to lowest with a descending query
            $query .= " ORDER BY {$sort_by} DESC";

            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $vehicles = [];

            //then pulls out the required informaiton
            foreach ($rows as $row) {

                $make = MakesTable::get_make($row['make_id']);
                $type = TypesTable::get_type($row['type_id']);
                $class = ClassesTable::get_class($row['class_id']);
                $vehicle = new Vehicle($make, $type, $class, $row['year'], $row['model'], $row['price']);
                $vehicles[] = $vehicle;

            }

            return $vehicles;

        }

        //function that gets all of the vehicles to the user
        public static function get_vehicles() {

            $db = Database::getDB();
            $query = "SELECT * FROM vehicles ORDER BY price DESC";
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            $vehicles = [];

            //returns all of the vehicles with a foreach loop
            foreach ($rows as $row) {

                $make = MakesTable::get_make($row['make_id']);
                $type = TypesTable::get_type($row['type_id']);
                $class = ClassesTable::get_class($row['class_id']);
                $vehicle = new Vehicle($make, $type, $class, $row['year'], $row['model'], $row['price']);
                $vehicles[] = $vehicle;

            }

            //then we return the vehicles
            return $vehicles;
        }


    }
?>