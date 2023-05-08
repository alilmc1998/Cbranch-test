<?php
include('conect.php');

// Get the ID of the record to delete
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Construct the SQL query to delete the record
$sql = "DELETE FROM tbxls WHERE id = $id";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: table.php"); // redirect to welcome page

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
