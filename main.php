<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP FORM</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>SIGN UP FORM</h1>
    <form action="insert_update.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" name="age" required><br><br>
        
        <label>Department:</label>
        <input type="radio" name="dept" value="development"> Development
        <input type="radio" name="dept" value="testing"> Testing
        <input type="radio" name="dept" value="HR">HR
<input type="radio" name="dept" value="accounting">Accounting<br><br>
        <br><br>
        
        <label>Employee Type:</label>
        <input type="radio" name="emp" value="intern"> Intern
        <input type="radio" name="emp" value="freelancer"> Freelancer
        <input type="radio" name="emp" value="consultant">Consultant
<br><br>
        <br><br>
        
        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" pattern="[0-9]{10}" required><br><br>
        
        <label for="address">Address:</label>
        <input type="text" name="address" required><br><br>
        
        
        
        <input type="submit" name="submit" value="Submit">
    </form>
    
</body>
</html>

