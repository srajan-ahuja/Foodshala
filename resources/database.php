<?php
function connectDB(){
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

    return $conn;
}
?>