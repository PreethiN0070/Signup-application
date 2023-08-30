
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$db = pg_connect("host=localhost dbname=employee user=postgres password=vigyan12#"); // Connect to the database

if (isset($_GET["name"])) {
    $nameToEdit =urldecode($_GET["name"]); // Get the name of the row to edit

   
    // Fetch the data of the row to edit from the database based on the provided name
    $selectQuery = "SELECT * FROM data WHERE name = '$nameToEdit'";
    $selectResult = pg_query($db, $selectQuery);

    if ($selectResult) {
        $rowToEdit = pg_fetch_assoc($selectResult);
    } else {
        echo "Error fetching record: " . pg_last_error($db);
        exit();
    }

    if (isset($_POST["submit"])) { // Check if the form is submitted
        // Rest of your code for updating the database

        // Update the database based on the provided name
        // ...
        $newName = $_POST["name"];
        $newEmail = $_POST["email"];
        $newMobile = $_POST["mobile"];
        $newAge = $_POST["age"];
        $newDept = $_POST["dept"];
        $newEmp = $_POST["emp"];
        $newAddress = $_POST["address"];

        $updateQuery = "UPDATE data SET 
                        name = '$newName', 
                        email = '$newEmail', 
                        mobile = '$newMobile', 
                        age = $newAge, 
                        dept = '$newDept', 
                        emp = '$newEmp', 
                        address = '$newAddress' 
                        WHERE name = '$nameToEdit'";
        $updateResult = pg_query($db, $updateQuery);

        if ($updateResult) {
            header("Location: display_table.php"); // Redirect back to the display page
            exit();
        } else {
            echo "Error updating record: " . pg_last_error($db);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Edit User</h1>
    <form action="" method="post"> <!-- Action is empty to submit to the same page -->
        Name:<input type="text" name="name" value="<?php echo $rowToEdit['name']; ?>"><br>
        Email:<input type="email" name="email" value="<?php echo $rowToEdit['email']; ?>"><br>
        Mobile:<input type="text" name="mobile" value="<?php echo $rowToEdit['mobile']; ?>"><br>
        Age:<input type="number" name="age" value="<?php echo $rowToEdit['age']; ?>"><br>
        Department:<br>
        <input type="radio" name="dept" value="development" <?php if ($rowToEdit['dept'] == 'development') echo 'checked'; ?>> Development
        <input type="radio" name="dept" value="testing" <?php if ($rowToEdit['dept'] == 'testing') echo 'checked'; ?>> Testing
        <input type="radio" name="dept" value="marketing" <?php if ($rowToEdit['dept'] == 'marketing') echo 'checked'; ?>> Marketing
        <input type="radio" name="dept" value="HR" <?php if ($rowToEdit['dept'] == 'HR') echo 'checked'; ?>> HR
        <input type="radio" name="dept" value="accounting" <?php if ($rowToEdit['dept'] == 'accounting') echo 'checked'; ?>> Accounting
        <br><br>
        Employee type:<br>
        <input type="radio" name="emp" value="intern" <?php if ($rowToEdit['emp'] == 'intern') echo 'checked'; ?>> Intern
        <input type="radio" name="emp" value="freelancer" <?php if ($rowToEdit['emp'] == 'freelancer') echo 'checked'; ?>> Freelancer
        <input type="radio" name="emp" value="consultant" <?php if ($rowToEdit['emp'] == 'consultant') echo 'checked'; ?>> Consultant <br><br>
        Address:<input type="text" name="address" value="<?php echo $rowToEdit['address']; ?>"><br>
        <br><br>
        <input type="submit" name="submit" value="Save Changes">
    </form>
</body>
</html>

<?php
pg_close($db); // Close the database connection
?>
