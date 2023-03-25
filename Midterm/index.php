<?php

//the required files for the index
require_once('model/database.php');
require_once('util/util.php');
require_once('model/make.php');
require_once('model/type.php');
require_once('model/class.php');
require_once('model/vehicle.php');
require_once('model/vehicles_data.php');
require_once('model/makes_data.php');
require_once('model/types_data.php');
require_once('model/classes_data.php');

//filters the input from the user
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if (!$action) {

    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {

        $action = 'vehicles_list';

    }

}

//uses a switch case to filter the input from the user
switch ($action) {

    case 'vehicles_list':

    case 'vehicles_list_filtered': {
        $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
        $sort_by = filter_input(INPUT_GET, 'sort_by', FILTER_SANITIZE_STRING) ?? 'price';

        //Applyies the filters
        if ($make_id || $type_id || $class_id || $sort_by) {
            $filters = [];
            if ($make_id) {

                $filters['make_id'] = $make_id;

            }

            if ($type_id) {

                $filters['type_id'] = $type_id;

            }

            if ($class_id) {

                $filters['class_id'] = $class_id;

            }

            //the end filtered table
            $vehicles_list = VehiclesTable::get_vehicles_filtered($sort_by, $filters);

        } 
        
        //otherwise gets the unfiltered list
        else {

            $vehicles_list = VehiclesTable::get_vehicles();

        }

        //classes for getting the makes types and classes
        $makes_list = MakesTable::get_makes();
        $types_list = TypesTable::get_types();
        $classes_list = ClassesTable::get_classes();

        include('view/vehicles_list.php');
        break;
    }
}

?>