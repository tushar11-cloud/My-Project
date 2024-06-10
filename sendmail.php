<?php
include 'part/conn/conn.php';
$sql = "SELECT  `email` FROM `user`";
$sql_s = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($sql_s)) {
$to_email = $row['email'];
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: daiefsikder425@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
}
?>