<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FoodShala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./resources/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            
        </script>
    </head>
    <body>
        <nav>
            <label class="logo">FoodShala</label>
            <ul>
               
               <?php
                require_once './resources/services.php';
                $data = checkLogin();
                $u_type = $data['user_type'];
                if(isset($_GET['add'])){
                    if($_GET['add']==1){
                        echo '<script>alert("Added successfully")</script>';
                    }
                }
                if(isset($_GET['error'])){
                    if($_GET['error']==1){
                        echo '<script>alert("Only Customers can order")</script>';
                    }
                }

                if($data['user_type'] == 'customer'){ ?>
                    <li><span class="hi-user">Hi <?php echo $data['user_name'] ?></span></li>
                    <li><a class="active"href = "#">Menu</a></li>
                    <li><a href = "./orders.php">Orders</a></li>
                    <li><a href = "./resources/logout.php">Logout</a></li>
                <?php }else if($data['user_type'] == 'restaurant'){ ?>
                    <li><span class="hi-user">Hi <?php echo $data['user_name'] ?></span></li>
                    <li><a href = "./orders.php">Orders</a></li>
                    <li><a class="active"href = "#">Menu</a></li>
                    <li><a href = "./addfoodrest.php">Add Dishes</a></li>
                    <li><a href = "./resources/logout.php">Logout</a></li>
                <?php } else{ ?>
                    <li><a class="active"href = "#">Menu</a></li>
                    <li><a href = "./index.php?error=4">Orders</a></li>
                    <li><a href = "./index.php">Get Started</a></li>
                <?php  }  ?>
               </ul>
        </nav>
        
        <div class="food-items-container">
        <table class= food-items-table>
            <caption><span class="available">Available Food</span></caption>
            <thead>
            <tr class="table-header">
                <th>Dish</th>
                <th>Restaurant</th>
                <th>Type</th>
                <th>Price</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
              $dbServername = "localhost";
              $dbUsername = "root";
              $dbPassword = "";
              $dbName = "ISproject";
          
              $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
              if (!$conn) {
                  die("Connection error");
              } else {
                  if (!mysqli_select_db($conn, "ISproject")) {
                      die("No database found");
                  }
              }
              $sql = "Select * from fooditems";
              $food=mysqli_query($conn, $sql);
              if(mysqli_num_rows($food)){
                while($row = mysqli_fetch_assoc($food)) {
                    $name = $row["food_name"];
                    $res = $row["r_name"];
                    $type = $row["food_type"];
                    $price = $row['food_price'];
                    $f_id = $row['food_id'];
                   ?>
                    <tr><td><?php echo $name?></td>
                    <td><?php echo $res?></td>
                    <td><?php echo $type?></td>
                    <td><?php echo $price?></td>
                    <td>
                    <button onclick="window.location.href = './resources/placeorder.php?id=<?php echo $f_id; ?>';" type='submit' name='orderBtn' class='orderBtn' value=<?php echo $f_id?>>Order</button>
                     </td></tr>
                
           <?php
             }
            }
          ?>
          </tbody>
        </table>
        </div>
        
       
    </body>
</html>
