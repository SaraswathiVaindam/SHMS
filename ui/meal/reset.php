<?php
session_start();

// Reset form data
unset($_SESSION['formData']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Example - Reset</title>
    <style>
        body {
  background-image: url("https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/rm380-06_1.jpg?w=800&dpr=1&fit=default&crop=default&q=65&vib=3&con=3&usm=15&bg=F4F4F3&ixlib=js-2.2.1&s=9a72bd7152b83d4b95adc296ac35b249");
  background-repeat: no-repeat;
  background-size: cover;
}
    </style>
</head>
<body style="text-align:center; margin-top: 200px;">
    <h2 style="color:white;">Form Data Reset</h2>
    <p style="color:white;">The form data has been reset successfully.</p>
    <button onclick="location.href='room.php'">Go Back</button>
</body>
</html>
