<?php
session_start();
?>
<?php

include 'part/conn/conn.php';
if (isset($_POST['doneO'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $food = $_POST['food'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'] *$quantity;
    $select = "INSERT INTO `food_order`( `name`, `address`, `number`, `food`,`price`,`quantity`) VALUES ('$name','$address','$number','$food',$price,'$quantity')";
    $select_run = mysqli_query($conn, $select);
    if ($select_run) {
        echo 'inserted';
        header("Location: breakfast.php?alert='Order Successfully done'");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">
    <title>Hello, world!</title>
    <style>
        .from_content {
            width: 50%;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php include 'part/login/login.php' ?>
    <?php include 'part/login/singup.php' ?>
    <!-- navbar -->
    <?php include 'part/navbar/navbar.php' ?>
    <br><br>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }
    if ($loggedin == true) {
        echo ' <div class="from_content">
        <center><img src="img/logo/logos.png" style="width: 166px;margin-top: 19px;"></center>
        <h1>
            <center>Order Food</center>
        </h1>
        <hr>
        <center> <img src="avatar/' . $_GET['avatar'] . '" style="width: 50%;height: 41vh;"></center>
        <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1" name="name">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" value="' . $_SESSION['email'] . '">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1" name="password">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address" name="address">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1" name="password">Number</label>
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Number" name="number">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1" name="password">Food</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="' . $_GET['food'] . '" name="food">
            </div>';
            if($_GET['offer'] == 0){
                echo '<div class="form-group" style="display:none">
                        <label for="exampleInputPassword1" name="password">Price</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" value="' . $_GET['price'] . '" name="price">
                    </div>';
            }else{
                echo '<div class="form-group" style="display:none">
                        <label for="exampleInputPassword1" name="password">Price</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" value="' . $_GET['price'] * $_GET['offer']. '" name="price">
                    </div>';
            }
            
            echo '<br>
            <div class="form-group">
                <label for="exampleInputPassword1" name="password">Quantity</label>
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter quantity 1,2,3,4......" name="quantity">
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="doneO">order</button>
        </form>
    </div>';
    }else{
        echo '<div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Please Login First to Order Food!</h4>
            </div>';
    }

    ?>
    <br><br><br><br>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>