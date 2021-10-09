<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Name" name="name">
    <input type="date" placeholder="Date of Birth" name="dob">
    <input type="text" placeholder="Address" name="address">
    <input type="file" placeholder="Image Link" name="img">
    <button>Submit</button>
</form>
</body>
</html>

<?php
include "data.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Upload anh
    $imgUrl = "images/avt.png";
    if (isset($_FILES["img"])) {
        if (empty($errors) == true) {
            move_uploaded_file($_FILES['img']["tmp_name"], "images/" . $_FILES["img"]["name"]);
            $imgUrl = "images/" . $_FILES["img"]["name"];
        } else {
            print_r($errors);
        }
    }

    $customer = [
        "name" => $_POST["name"],
        "day_of_birth" => $_REQUEST["dob"],
        "address" => $_REQUEST["address"],
        "profile" => $imgUrl
    ];

    addNewCustomer($customer);
    header("location: index.php"); //Cau lenh chuyen trang PHP
}
