<?php
$db = pg_connect("host=localhost dbname=employee user=postgres password=vigyan12#");
if (isset($_GET["name"])) {
    $nameToDelete = urldecode($_GET["name"]); // Get the name of the row to delete
echo $nameToDelete;
    // Delete the row from the database based on the provided name
    $deleteQuery = "DELETE FROM data WHERE name = '$nameToDelete'";
    $deleteResult = pg_query($db, $deleteQuery);

    if ($deleteResult) {
        header("Location: display_table.php"); // Redirect back to the display page
        exit();
    } else {
        echo "Error deleting record: " . pg_last_error($db);
    }
}
?>

