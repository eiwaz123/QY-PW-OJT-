<?php
session_start();
if(!isset( $_SESSION['user_id']))  {
       header("Location:../signin.php");
              
} 
$con = mysqli_connect('localhost', 'root', '', 'qyprint');
if (isset($_POST['liked'])) {
    $postid = $_POST['product_id'];
    $result = mysqli_query($con, "SELECT * FROM products WHERE id=$postid");
    $row = mysqli_fetch_array($result);
    $n = $row['likes'];

    mysqli_query($con, "INSERT INTO likes (user_id, product_id) VALUES ($user_id, $postid)");
    mysqli_query($con, "UPDATE products SET likes=$n+1 WHERE id=$postid");

    echo $n+1;
    exit();
}
if (isset($_POST['unliked'])) {
    $postid = $_POST['product_id'];
    $result = mysqli_query($con, "SELECT * FROM products WHERE id=$postid");
    $row = mysqli_fetch_array($result);
    $n = $row['likes'];

    mysqli_query($con, "DELETE FROM likes WHERE product_id=$postid AND user_id=$user_id");
    mysqli_query($con, "UPDATE products SET likes=$n-1 WHERE id=$postid");
    
    echo $n-1;
    exit();
}


?>