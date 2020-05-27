<?php

    session_start();

    require "./database.php";
    $conn=connectDB();
    if (isset($_POST['custloginBtn'])) {


        $login_email = $_POST['l-cust-email'];
        $login_password = $_POST['l-cust-password'];

        if (empty($login_email) || empty($login_password)) {
            header('Location: ../index.php?error=0');
            exit();
        } else {
            $sql = "SELECT * FROM customers WHERE cust_email='$login_email' ";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);

            if ($resultcheck == 0) {
                header('Location: ../index.php?error=1');
                exit();
            } else {
                if ($rows = mysqli_fetch_assoc($result)) {
                    if ($login_password != $rows['cust_password']) {
                        header('Location: ../index.php?error=2');
                        exit();
                    } else {
                        $_SESSION['user_id'] = $rows['cust_id'];
                        $_SESSION['user_name'] = $rows['cust_name'];
                        $_SESSION['user_email'] = $rows['cust_email'];
                        $_SESSION['user_preference'] = $rows['food_preference'];
                        $_SESSION['user_type'] = 'customer';
                        mysqli_close($conn);
                        /*if (isset($_GET['id'])) {
                              header('Location: ../placeorder.php?id='.$_GET['id']);
                              exit();
                          }*/
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
