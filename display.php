<?php
//include("db.php");
$db = pg_connect("host=localhost dbname=employee user=postgres password=vigyan12#");
// Retrieve data from PostgreSQL and display in a table
$query = "SELECT * FROM data";
$result = pg_query($db, $query);

$dataArray = array();

while ($row = pg_fetch_assoc($result)) {
    $dataArray[] = $row;
}

pg_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>user credentials</title>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Employee Credentials</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Age</th>
            <th>Department</th>
            <th>Employee_type</th>
            <th>Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($dataArray as $index => $row): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['dept']; ?></td>
            <td><?php echo $row['emp']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
    <a href="edit.php?name=<?php echo urlencode($row['name']); ?>">Edit</a></td>
    <td><a href="delete1.php?name=<?php echo urlencode($row['name']); ?>">Delete</a>
</td>
            
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
