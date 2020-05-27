<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FoodShala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./resources/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
           $(document).ready(function(){
                $(".nveg-add").hide();
                $(".veg").css("background","#74a1d4");

                $(".nveg").click(function(){
                    $(".veg-add").hide();
                    $(".nveg-add").show();
                    $(".nveg").css("background","#74a1d4")
                    $(".veg").css("background","white")
                    
                });
                $(".veg").click(function(){
                    $(".nveg-add").hide();
                    $(".veg-add").show();
                    $(".veg").css("background","#74a1d4")
                    $(".nveg").css("background","white")
                });
                

            });
        </script>
    </head>
    <body>
        <nav>
            <label class="logo">FoodShala</label>
            <ul>
               
               <?php
                require_once './resources/services.php';
                $data = checkLogin();

                if($data['user_type'] == 'restaurant'){ ?>
                    <li><span class="hi-user">Hi <?php echo $data['user_name'] ?></span></li>
                    <li><a href = "./menu.php">Menu</a></li>
                    <li><a href = "./restorders.php">Orders</a></li>
                    <li><a class="active" href = "./addfoodrest.php">Add Dishes</a></li>
                    <li><a href = "./resources/logout.php">Logout</a></li> 
                <?php }  ?>
               </ul>
        </nav>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error']==0){
                    echo '<script>alert("Please enter details correctly and submit")</script>';
                }if($_GET['error']==1){
                    echo '<script>alert("Please try again!")</script>';
                }

            }
        ?>
        <div class = "container">
            <div class = "addfood-form">
                <div class="foodtype-box">
                    <div class="veg">Veg</div>
                    <div class="nveg">Non Veg</div>
                </div><br><br><br>
                <div class = "veg-add">
                    <form name="v-food-add" action="http://localhost:8080/last/resources/addfood.php" method="post">
                    <input type="text" name="v-food-name" placeholder="Dish Name" class="input"><br>
                    <input type="text" name="v-food-price" placeholder="Price" class="input"><br>
                    <button type="submit" name="addVfood" class="btn">Add</button>
                    
                    </form>
                </div>
                <div class = "nveg-add">
                    <form name="n-food-add" action="http://localhost:8080/last/resources/addfood.php" method="post">
                    <input type="text" name="nv-food-name" placeholder="Dish Name" class="input"><br>
                    <input type="text" name="nv-food-price" placeholder="Price" class="input"><br>
                    <button type="submit" name="addNVfood" class="btn">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
