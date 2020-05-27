<?php

    session_start();

    require "./database.php";
    $conn=connectDB();
    if (isset($_POST['restloginBtn'])) {


        $login_email = $_POST['l-rest-email'];
        $login_password = $_POST['l-rest-password'];

        if (empty($login_email) || empty($login_password)) {
            header('Location: ../index.php?error=0');
            exit();
        } else {
            $sql = "SELECT * FROM restaurants WHERE rest_email='$login_email' ";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);

            if ($resultcheck == 0) {
                header('Location: ../index.php?error=1');
                exit();
            } else {
                if ($rows = mysqli_fetch_assoc($result)) {
                    if ($login_password != $rows['rest_password']) {
                        header('Location: ../index.php?error=2');
                        exit();
                    } else {
                        $_SESSION['user_id'] = $rows['rest_id'];
                        $_SESSION['user_name'] = $rows['rest_name'];
                        $_SESSION['user_email'] = $rows['rest_email'];
                        $_SESSION['user_type'] = 'restaurant';
                        mysqli_close($conn);
                        
                        header('Location: ../menu.php');
                        exit();
                    }
                        
                } else {
                    mysqli_close($conn);
                    header('Location: ../index.php?error=1');
                    exit();
                }
                
            }
            
        }
        

    } else {
        header('Location: ../index.php?error=3');
        exit();
    
    }
?>
