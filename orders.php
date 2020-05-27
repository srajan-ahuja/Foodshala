<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FoodShala</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./resources/index.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <nav>
            <label class="logo">FoodShala</label>
            <ul>
               
               <?php
               if(isset($_GET['success'])){
                if($_GET['success']==1){
                    echo '<script>alert("Order placed successfully!")</script>';
                }
            }
                require_once './resources/services.php';
                require_once './resources/database.php';
                $data = checkLogin();
                $conn=connectDB();
                $uid = $data['user_id'];

                if($data['user_type'] == 'customer'){
                    
                    $sql = "Select * from orders where c_id = '$uid' ORDER BY order_id DESC"; ?>
                    <li><span class="hi-user">Hi <?php echo $data['user_name'] ?></span></li>
                    <li><a href = "./menu.php">Menu</a></li>
                    <li><a class="active"href = "./orders.php">Orders</a></li>
                    <li><a href = "./resources/logout.php">Logout</a></li>
                <?php }else if($data['user_type'] == 'restaurant'){ 
                    $sql = "Select * from orders where r_id = '$uid' ORDER BY order_id DESC";?>
                    <li><span class="hi-user">Hi <?php echo $data['user_name'] ?></span></li>
                    <li><a href = "./menu.php">Menu</a></li>
                    <li><a class="active" href = "./orders.php">Orders</a></li>
                    <li><a href = "./addfoodrest.php">Add Dishes</a></li>
                    <li><a href = "./resources/logout.php">Logout</a></li> 
                <?php } ?>
               </ul>
        </nav>
        <div class="food-items-container">
        <?php
        echo '<table class= food-items-table>';
        echo '<caption><span class="available">Available Food</span></caption>';
        echo '<thead>';
        echo '<tr class="table-header">';
        echo '<th>Order id</th>';
        echo '<th>Dish</th>';
        if($data['user_type'] == 'customer'){

            echo '<th>Restaurant</th>';
        }else if($data['user_type'] == 'restaurant'){ 
            echo '<th>Customer</th>';
        }
        echo '<th>Price</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
              /*$dbServername = "localhost";
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
              $sql = "Select * from fooditems";*/
              $orders=mysqli_query($conn, $sql);
              if(mysqli_num_rows($orders)){
                while($row = mysqli_fetch_assoc($orders)) {
                    $order_id = $row["order_id"];
                    $res = $row["r_name"];
                    $f_name = $row["f_name"];
                    $price = $row['price'];
                    $cus = $row['c_name'];
                    echo '<tr><td>'.$order_id.'</td><td>'.$f_name.'</td>';
                    if($data['user_type'] == 'customer'){
                        echo '<td>'.$res.'</td>';
                    }else if($data['user_type'] == 'restaurant'){ 
                        echo '<td>'.$cus.'</td>';
                    }
                    echo '<td>'.$price.'</td></tr>';

            ?>
            

            
            <!--<div>
              <strong><?php echo $rows['food_name']; ?></strong>
              <p><?php echo $rows['r_name']; ?></p>
              <p>Price: <strong><?php echo $rows['food_price']; ?></strong></p>

              <button onclick="window.location.href = './placeorder.php?id=<?php echo $rows['f_id']; ?>';" class="orderBtn">Order Now</button>
            </div>-->


          <?php
             }
            }
          ?>
          </tbody>
        </table>
        </div>
        
       
    </body>
</html>
