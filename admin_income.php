<?php session_start(); ?>
<?php include 'part/conn/conn.php'; if(isset($_POST['done'])){ $food = $_POST['food']; $cat = $_POST['cat']; $price = $_POST['price']; $offer = $_POST['offer']; $offer_des = $_POST['des']; $aa = $cat[0]; $avatar_name = $_FILES["avatar"]["name"]; $avatar_tmpName = $_FILES["avatar"]["tmp_name"]; $location = "avatar/"; $nameForDB = uniqid().$avatar_name; move_uploaded_file($avatar_tmpName, $location."$nameForDB"); $sql = "INSERT INTO `food`(`food`, `avatar`, `cat`, `price`, `offer`, `offer_des`) VALUES ('$food','$nameForDB','$aa',$price,'$offer','$offer_des')"; $result = mysqli_query($conn, $sql); if($result){ echo "inserted"; } } ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="img\logo\logos.png" style="height: 156px;"></a>

                 <button class="navbar-toggler" type="button"
            data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link btn btn-danger text-white" href="logout.php">Logout</a> </li>
            </ul>
            <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search"
                    placeholder="Search" aria-label="Search"> <button class="btn btn-outline-success my-2 my-sm-0"
                    type="submit">Search</button> </form>
        </div>
    </nav>
    <h1 class="text-center m-3">Current Monthly Report</h1>
    <?php include 'part/conn/conn.php'; // SQL query to fetch sales data 
    $sql = "SELECT id, name, address, number, food, price, quantity FROM food_order"; 
    $result = $conn->query($sql); $totalSales = 0; // Variable to store the total sales 
    if ($result->num_rows > 0) 
    { // Outputting table headers with Bootstrap styling 
    echo "<div class='container'><table class='table table-bordered'> <thead class='thead-dark'> <tr> <th>ID</th> <th>Name</th> <th>Address</th> <th>Contact Number</th> <th>Food Item</th> <th>Price per Item</th> <th>Quantity</th> <th>Total Cost</th> </tr> </thead><tbody>"; // Outputting data rows 
    while ($row = $result->fetch_assoc()) { $totalCost = $row['price'] * $row['quantity']; $totalSales += $totalCost;
     // Accumulate total cost 
     echo "<tr> <td>{$row['id']}</td> <td>{$row['name']}</td> <td>{$row['address']}</td> <td>{$row['number']}</td> <td>{$row['food']}</td> <td>{$row['price']}</td> <td>{$row['quantity']}</td> <td>{$totalCost}</td> </tr>"; } // Output total sales row with Bootstrap styling 
     echo "<tr><td colspan='7'><strong>Total Sales:</strong></td><td>{$totalSales}</td></tr>";
      echo "</tbody></table></div>"; } else { echo "<div class='alert alert-warning'>0 results</div>"; 
    } // Close connection
       $conn->close(); 
       ?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> -->
</body>

</html>