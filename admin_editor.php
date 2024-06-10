<!doctype html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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

  <?php
  session_start();
  include 'part/conn/conn.php';
  $sql = "SELECT * FROM `admin`";
  $sql_s = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($sql_s)) {
    echo '<div class="jumbotron jumbotron-fluid">
                  <div class="container">
                  <h1 class="text-center">Admin Dashboard</h1>
                    <h1 class="display-4">' . $_SESSION['name'] . '</h1>
                    <p class="lead">Role : ' . $row["Role"] . '</p>
                    <p class="lead">Phone number : ' . $row["phone"] . '</p>
                    <p class="lead">ID : ' . $row["ID_AD"] . '</p>
                  </div>
                </div>';
  }
  ?>





  <div class="container-fluid">
    <div class="col-4-lg">


      <div class="container">
        <div class="row ">

          <div class="col-lg-4 mb-2">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="https://m.economictimes.com/thumb/msid-103221559,width-1200,height-900,resizemode-4,imgsize-66672/sweets.jpg" alt="Card image cap" style="height: 374px">
              <div class="card-body">
                <h2 class="card-title">Food</h2>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="food__.php" class="btn btn-success">Add food Item</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-2">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="img\cat\room.jpg" alt="Card image cap" style="height: 374px">
              <div class="card-body">
                <h2 class="card-title">All Customer Details</h2>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="customer_details.php" class="btn btn-success">Book Room</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-2">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcAJl6RjfegaS7QE5-bPcfuDhmUY0R9-yPJ0iRKw_hSw&s" alt="Card image cap" style="height: 374px">
              <div class="card-body">
                <h2 class="card-title">Food List</h2>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="food_list.php" class="btn btn-success">Check It</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-2">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="https://jeffreybosworth.com/wp-content/uploads/2024/02/Sales-101-2.jpg" alt="Card image cap" style="height: 374px">
              <div class="card-body">
                <h2 class="card-title">Sales Report</h2>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="admin_income.php" class="btn btn-success">Check It</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-2">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="img\cat\offer.jpg" alt="Card image cap" style="height: 374px">
              <div class="card-body">
                <h2 class="card-title">Offer</h2>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="admin_food_order.php" class="btn btn-success">Add Offer</a>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>





  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>