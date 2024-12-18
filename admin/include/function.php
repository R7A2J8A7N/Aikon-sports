<?php

function get_the_teachers($args)
{
    $output = array();
    foreach ($args as $arg) {
        $output[] = $arg;
    }
    return $output;
}

function get_the_classes($conn)
{
    $output = array();
    $query  = mysqli_query($conn, 'SELECT * FROM `classes`');
    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            $output[] = $row;
        }
    } else {
        die('Error: ' . mysqli_error($conn));
    }
    return $output;
}


//---------------- functionssssssss -----------------//

function get_posts(array $args = [], string $type = 'object')
{
    global $conn;
    $condition_ar = [];
    $condition = "";

    if (!empty($args)) {
        foreach ($args as $k => $v) {
            $v = (string)$v;
            $condition_ar[] = "$k = '$v'";
        }

        if (count($condition_ar) > 0) {
            $condition = "WHERE " . implode(" AND ", $condition_ar);
        }
    }
    $sql = "SELECT * FROM `posts` $condition";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    return data_output($query, $type);
}


//---------------- function get post metadata -----------------//
function get_post(array $args = []) {
    global $conn;
    $condition = "WHERE 0";
    $condition_ar = array();

    if (!empty($args)) {
        foreach ($args as $k => $v) {
            $v = (string)$v;
            $condition_ar[] = "$k = '$v'";
        }
        if (count($condition_ar) > 0) {
            $condition  = "WHERE " . implode(" AND ", $condition_ar);
        }
    }

    $sql = "SELECT * FROM `sections` $condition";  // Use the sections table instead
    $query = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($query);
}



//---------------- function get metadata -----------------//
// function get_metadata($item_id, $meta_key = '') {
//     global $conn;

//     // Build query based on whether meta_key is provided
//     if (!empty($meta_key)) {
//         $query = mysqli_query($conn, "SELECT * FROM `metadata` WHERE `item_id` = $item_id AND meta_key = '$meta_key'");
//     } else {
//         $query = mysqli_query($conn, "SELECT * FROM `metadata` WHERE `item_id` = $item_id");
//     }

//     // Fetch the result
//     $result = mysqli_fetch_assoc($query);

//     // Return the result or an empty array if nothing was found
//     return $result ? $result : [];
// }


function get_metadata($item_id, $meta_key = '',$type ='object')
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM metadata WHERE item_id = $item_id");
    if (!empty($meta_key)) {
        $query = mysqli_query($conn, "SELECT * FROM metadata WHERE item_id = $item_id AND meta_key = '$meta_key'");
    }

    return data_output($query, $type);
}

//---------------- function data_output -----------------//

function data_output($query, $type = 'object')
{
    $output = [];
    if ($type == 'object') {
        while ($result = mysqli_fetch_array($query)) {
            $output[] = $result;
        }
    } else {
        while ($result = mysqli_fetch_assoc($query)) {
            $output[] = $result;
        }
    }

    return $output;
}


function get_user_data($user_id, $type = 'object') {
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM `user-accounts` WHERE id = $user_id");
    return data_output($query, $type);
}

