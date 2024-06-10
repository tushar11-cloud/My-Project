<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="img\logo\logos.png" style="height: 156px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a>
        </li>
      </ul>

    </div>
  </nav>
  <?php
  include 'part/conn/conn.php';
  $sql = "SELECT * FROM `user` WHERE month(current_date())=month(date) AND day(current_date)=day(date)";
  $sql_s = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($sql_s);
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>' . $count . '</strong> customers birthday today. Sent them birthday wish <a href="birthdaywish.php" class="btn btn-primary">Sent</a>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>';
  ?>


  <h1 class="text-center mt-4 mb-4">Ordered Food</h1>

  <div class="container m-auto col-8">




    <div class="row">

      <?php
      include 'part/conn/conn.php';
      $sql = "SELECT * FROM `food_order`";
      $sql_s = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($sql_s)) {
        echo '<div class="col-4 mt-4">
                <div class="card" style="width: 100%;">
                  <div class="card-body">
                    <h5 class="card-title">Food : ' . $row['food'] . '</h5>
                    <h5 class="card-title">Name : ' . $row['name'] . '</h5>
                    <h5 class="card-title">Address : ' . $row['address'] . '</h5>
                    <h5 class="card-title">Number : ' . $row['number'] . '</h5>
                    <h5 class="card-title">Quantity : ' . $row['quantity'] . '</h5>
                    <h5 class="card-title">Price : ' . $row['price'] . '</h5>
                    <p class="card-text"></p>
                    <a href="confirm_food.php?food_id=' . $row['id'] . '&&food=' . $row['food'] . '" class="btn btn-success">Confirm Order</a>
                  </div>
                </div>
              </div>';
      }
      ?>

    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>