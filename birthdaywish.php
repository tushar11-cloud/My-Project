
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

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
    if (isset($_POST['sendmessage'])) {
        $body = $_POST["details"];
        // echo $subject, $details;
        $sql = "SELECT * FROM `user` WHERE month(current_date())=month(date) AND day(current_date)=day(date)";
        $sql_s = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($sql_s)) {
            $subject = 'Happy Birthday'.' '.$row['name'];
            $to_email = $row['email'];
            // $subject = "Simple Email Test via PHP";
            // $body = "Hi, This is test email send by PHP Script";
            $headers = "From: daiefsikder425@gmail.com";

            if (mail($to_email, $subject, $body, $headers)) {
                // echo "Email successfully sent to $to_email...";
            } else {
                // echo "Email sending failed...";
            }
        }
        echo '<script>alert("Message sent successfully...")</script>';
    }

    ?>

    <h1 class="text-center">Send birthday wish to customers</h1>

    <div class="container m-auto col-6">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputEmail1">Birthday Wish</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="details"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="sendmessage">Send Message</button>
        </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>