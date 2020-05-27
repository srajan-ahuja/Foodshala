<?php
session_start();
function checkLogin(){
    $user_data = array();
    $user_data = array_fill_keys(array('user_id', 'user_name', 'user_type', 'user_preference'), '');
    if(isset($_SESSION['user_type'])){
        if(($_SESSION['user_type'] == 'customer')){
            $user_data['user_id'] = $_SESSION['user_id'];
            $user_data['user_name'] = $_SESSION['user_name'];
            $user_data['user_type'] = $_SESSION['user_type'];
            $user_data['user_preference'] = $_SESSION['user_preference'];
        }else if(($_SESSION['user_type'] == 'restaurant')){
            $user_data['user_id'] = $_SESSION['user_id'];
            $user_data['user_name'] = $_SESSION['user_name'];
            $user_data['user_type'] = $_SESSION['user_type'];
        }

    }
    return $user_data;
}




?>
