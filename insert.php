<?php

$nameError = $mobileError = "";

if (isset($_POST["submit"])) {
    include("db.php");
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $dept = $_POST["dept"];
    $emp = $_POST["emp"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];

    // Check if the name is already in the database
    $nameQuery = "SELECT * FROM data WHERE name = '$name'";
    $nameResult = pg_query($db, $nameQuery);
    if (pg_num_rows($nameResult) > 0) {
        $nameError = "Name already exists. Please choose a different name.";
        echo $mobileError;
        header("Location:main.php");
    } else {
        // Check if the mobile number is already in the database
        $mobileQuery = "SELECT * FROM data WHERE mobile = '$mobile'";
        $mobileResult = pg_query($db, $mobileQuery);
        if (pg_num_rows($mobileResult) > 0) {
            $mobileError = "Mobile number already exists. Please choose a different mobile number.";
            echo $mobileError;
            header("Location:main.php");
        } else {
            // Insert the data into the database
            $insertQuery = "INSERT INTO data (name, email, age, dept, emp, mobile, address) 
                            VALUES ('$name', '$email', $age, '$dept', '$emp', '$mobile', '$address')";
            $insertResult = pg_query($db, $insertQuery);

            if ($insertResult) {
                header("Location: display_table.php");
                exit();
            } else {
                echo "Error inserting record: " . pg_last_error($db);
            }
        }
    }
    pg_close($db);
}


?>

