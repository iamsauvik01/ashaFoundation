<?php
// Include the database configuration file
require_once '../config.php';

// Query to select all records from the record_of_death table
$sql = "SELECT * FROM record_of_death";
$result = $conn->query($sql);

// Set headers to indicate the file type and disposition
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=record_of_death_data.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the column headings
fputcsv($output, array('ID', 'Name', 'Date', 'Time', 'Gender'));

// Fetch the data and output each row to the CSV file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

// Close the file pointer
fclose($output);
?>
