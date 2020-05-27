<?php
require './database.php';
require './services.php';
$u_data = checkLogin();
$conn=connectDB();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['addVfood']) && isset($_POST['v-food-name']) == null || isset($_POST['v-food-price'])==null  ){
        header("Location: ../addfoodrest.php?error=0");
    }else if(isset($_POST['addNVfood']) && isset($_POST['nv-food-name']) == null && isset($_POST['nv-food-price']) == null){
        header("Location: ../addfoodrest.php?error=0");

    }
    else if(isset($_POST['addVfood']) && isset($_POST['v-food-name']) && isset($_POST['v-food-price'])){
        $type = 'veg';
        $f_name = $_POST['v-food-name'];
        $f_price = $_POST['v-food-price'];
        $r_id = $u_data['user_id'];
        $r_name = $u_data['user_name'];
        $sql = "insert into fooditems (food_name, food_type, r_id, r_name, food_price) values ('$f_name', '$type', '$r_id', '$r_name','$f_price')";
        $result = mysqli_query($conn, $sql);
    
    }else  if(isset($_POST['addNVfood']) && isset($_POST['nv-food-name']) && isset($_POST['nv-food-price'])){
        $type = 'non veg';
        $f_name = $_POST['nv-food-name'];
        $f_price = $_POST['nv-food-price'];
        $r_id = $u_data['user_id'];
        $r_name = $u_data['user_name'];
        $sql = "insert into fooditems (food_name, food_type, r_id, r_name, food_price) values ('$f_name', '$type', '$r_id', '$r_name','$f_price')";
        $result = mysqli_query($conn, $sql);
    
    }else{
        header("Location: ../addfoodrest.php?error=1");
    }

    if($result)
    {
        header("Location: ../menu.php?add=1");
    }
    

}else{
    header("Location: ../addfoodrest.php?error=1");
}
