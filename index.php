<?php
require './resources/database.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FoodShala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./resources/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".signup-form").hide();
                $(".signup").css("background","none");

                $(".signup").click(function(){
                    $(".login-form").hide();
                    $(".signup-form").show();
                    $(".signup").css("background","white")
                    $(".login").css("background","none")
                    
                });
                $(".login").click(function(){
                    $(".signup-form").hide();
                    $(".login-form").show();
                    $(".login").css("background","white")
                    $(".signup").css("background","none")
                });

            });
            $(document).ready(function(){
                $(".restaurant-signup").hide();
                $(".customer").css("background","#74a1d4");

                $(".restaurant").click(function(){
                    $(".customer-signup").hide();
                    $(".restaurant-signup").show();
                    $(".restaurant").css("background","#74a1d4")
                    $(".customer").css("background","white")
                    
                });
                $(".customer").click(function(){
                    $(".restaurant-signup").hide();
                    $(".customer-signup").show();
                    $(".customer").css("background","#74a1d4")
                    $(".restaurant").css("background","white")
                });
                

            });
            $(document).ready(function(){
                $(".restaurant-login").hide();
                $(".l-customer").css("background","#74a1d4");

                $(".l-restaurant").click(function(){
                    $(".customer-login").hide();
                    $(".restaurant-login").show();
                    $(".l-restaurant").css("background","#74a1d4")
                    $(".l-customer").css("background","white")
                    
                });
                $(".l-customer").click(function(){
                    $(".restaurant-login").hide();
                    $(".customer-login").show();
                    $(".l-customer").css("background","#74a1d4")
                    $(".l-restaurant").css("background","white")
                });
                

            });

        </script>
    </head>
    <body>
        <nav>
            <label class="logo">FoodShala</label>
            <ul>
               <li><a href = "./menu.php">Menu</a></li>
               <li><a href = "./index.php?error=4">Orders</a></li>
               <li><a class="active" href = "./index.php">Get Started</a></li></ul>
        </nav>
        <?php
            if(isset($_GET['registered'])){
                if($_GET['registered']==1){
                    echo '<script>alert("User signed up successfully, please login!")</script>';
                }if($_GET['registered']==0){
                    echo '<script>alert("Unable to register as user, please signup again")</script>';
                }
            }
            if(isset($_GET['error'])){
                if($_GET['error']==0){
                    echo '<script>alert("Please enter both credentials and login")</script>';
                }if($_GET['error']==1){
                     echo '<script>alert("User Does Not Exist")</script>';
                }if($_GET['error']==2){
                    echo '<script>alert("Incorrect Password")</script>';
                }if($_GET['error']==3){
                    echo '<script>alert("cant respond")</script>';
                }if($_GET['error']==4){
                    echo '<script>alert("Login first to view orders!")</script>';
                }if($_GET['error']==5){
                    echo '<script>alert("You need to login to order food")</script>';
                }

            }
        ?>
        <div class = "container">
            <div class="login">Log in</div>
            <div class="signup">Sign up</div>
            <div class = "login-form">
                <div class="l-usertype-box">
                    <div class="l-customer">Customer</div>
                    <div class="l-restaurant">Restaurant</div>
                </div><br><br><br>
                <div class = "customer-login">
                    <form name="cust-login" action="./resources/custlogin.php" method="post">
                    <input type="email" name="l-cust-email" placeholder="Email" class="input"><br>
                    <input type="password" name="l-cust-password" placeholder="Password" class="input"><br>
                    <button type="submit" name="custloginBtn" class="btn">Login</button>
                    <!--<div class="btn">Login</div> -->
                    </form>
                </div>
                <div class = "restaurant-login">
                    <form name="rest-login" action="./resources/restlogin.php" method="post">
                    <input type="email" name="l-rest-email" placeholder="Email" class="input"><br>
                    <input type="password" name="l-rest-password" placeholder="Password" class="input"><br>
                    <button type="submit" name="restloginBtn" class="btn">Login</button>
                    <!--<div class="btn">Login</div> -->
                    </form>
                </div>
            </div>
            <div class = "signup-form">
                <div class="usertype-box">
                    <div class="customer">Customer</div>
                    <div class="restaurant">Restaurant</div>
                </div><br><br><br>
                <div class="customer-signup">
                    <form name="cust-signup" action="./resources/custsignup.php" method="post">
                    <input type="text" name="cust-name" placeholder="Name" class="input"><br>
                    <input type="email" name="cust-email" placeholder="E-mail Address" class="input"><br>
                    <input type="password" name="cust-password"placeholder="Choose a Password" class="input"><br>
                    <span class="food-preference">Food Preference</span>
                    <select id="food-preference2" name="Food-preference" class="input">
                        <option value="veg">Veg</option>
                        <option value="nveg">Non Veg</option>
                        </select>
                        <br>
                    <button type="submit" name="custSignupBtn" class="btn">Create Account</button>
                    <!-- <div class="btn" onClick="document.forms["cust-signup"].submit();" name="custSignupBtn">Create Account</div> -->
                </form>
                </div>
                <div class="restaurant-signup">
                    <form name="rest-signup" action="./resources/restsignup.php" method="post">
                        <input type="text" name="rest-name" placeholder="Restaurant Name" class="input"><br>
                        <input type="email" name="rest-email" placeholder="E-mail Address" class="input"><br>
                        <input type="password" name="rest-password" placeholder="Choose a Password" class="input"><br>
                         <button type="submit" name="restSignupBtn" class="btn">Create Account</button>
                        <!-- <div type="submit" class="btn">Create Account</div> -->
                    </form>
                    
                </div>
                
            </div>
        </div>
    </body>
</html>
