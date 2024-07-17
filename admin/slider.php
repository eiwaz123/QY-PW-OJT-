<?php
include_once ("../process/config.php");
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);


?>


<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet"  type="text/css" href="css/slide.css">
</head>

<body>
  <h1>CSS-only Carousel</h1>

  <?php
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['productname'];
    echo '<p>' . $name . '</p>';   
    ?>

  <div class="your-class">
    

    <?php 
     
    $queryimage = "SELECT * FROM pictures  WHERE product_id = $row[id]";
    $resultimg= mysqli_query($conn, $queryimage);
    while ($rowimage = mysqli_fetch_assoc($resultimg)) {
      $picture = $rowimage['path'];
      $id = $rowimage['product_id'];
   
      echo '<img src="../process/'.$picture.'" style="height: 450px;">';
      
      ?>
    <?php } ?>
    </div>
  <?php } ?>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript" src="js/slide.js"></script>



</body>

</html>