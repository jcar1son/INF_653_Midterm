<?php
    
    //sets the values when quering for the make_id and etc.
    function get_query_expressions($arr) {

        $query_arr = array();

        foreach($arr as $key => $value) {

            if ($value != '') {

                $query_arr[] = $key . ' = ' . $value;

            }

        }

        return $query_arr;
    }
?>