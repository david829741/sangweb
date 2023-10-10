<?php
include "connexion.php";




// Fetch data from the database
$sql = "SELECT *  FROM centre";

$result = mysqli_query($conn, $sql);

// Check if query was successful
if ($result) {
    // Create an array to store the data
    $data = array();

    // Loop through the data and add it to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Return the data as JSON
    echo json_encode($data);
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>