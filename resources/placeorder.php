<?php
$f_id = $_GET['id'];
require './database.php';
require './services.php';
$u_data = checkLogin();
$conn=connectDB();
       

$c_id = $u_data["user_id"];
$c_name = $u_data["user_name"];
        //$f_id = $_POST['orderBtn'];

$sql1 = "SELECT * FROM fooditems WHERE food_id = '$f_id';
$match = mysqli_query($conn,$sql1);
if(mysqli_num_rows($match)){
    while($row = mysqli_fetch_assoc($match)) {
        $name = $row["food_name"];
        $res = $row["r_name"];
        $res_id = $row["r_id"];
        $price = $row['food_price'];
        
        $sql= "insert into orders (c_id, r_id, f_name, f_id, r_name, c_name, price) values ('$c_id', '$res_id', '$name', '$f_id','$res','$c_name','$price')";
        $result = mysqli_query($conn,$sql);
        header('Location: ../orders.php?success=1');
           
    }


?>
