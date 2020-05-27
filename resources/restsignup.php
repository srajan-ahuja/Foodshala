<?php 
	require './database.php';
    $conn=connectDB();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['restSignupBtn']) && isset($_POST['rest-name']) && isset($_POST['rest-email']) && isset($_POST['rest-password'])){

	        $rest_name = $_POST['rest-name'];
	        $rest_email = $_POST['rest-email'];
	        $rest_password = $_POST['rest-password'];
	        $rest_hashpassword = md5($rest_password);


	        $sql="insert into restaurants (rest_name, rest_email, rest_password) values ('$rest_name', '$rest_email', '$rest_password')";
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
