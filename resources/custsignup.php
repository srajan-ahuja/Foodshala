<?php 
	require './database.php';
    $conn=connectDB();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['custSignupBtn']) && isset($_POST['cust-name']) && isset($_POST['cust-email']) && isset($_POST['cust-password']) && isset($_POST['Food-preference'])){

	        $cust_name = $_POST['cust-name'];
	        $cust_email = $_POST['cust-email'];
	        $cust_password = $_POST['cust-password'];
	        $food_preference = $_POST['Food-preference'];


	        $sql="insert into customers (cust_name, cust_email, cust_password, food_preference) values ('$cust_name', '$cust_email', '$cust_password', '$food_preference')";
	        $result= mysqli_query($conn, $sql);
	        if($result){
                    header("Location: ../index.php?registered=1");
            }
            else{
                    header("Location: ../index.php?registered=0");
            }

    	}
	}
?>
