<?php
// Include the database configuration file
require_once '../config.php';

// Query to select all records from the due_list_immunization table
$sql = "SELECT * FROM due_list_immunization";
$result = $conn->query($sql);

// Set headers to indicate the file type and disposition
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=due_list_immunization_data.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the column headings
fputcsv($output, array('ID', 'Name of Child', 'Age', 'Gender', 'Vaccine For', 'Name of Father/Mother'));

// Fetch the data and output each row to the CSV file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

// Close the file pointer
fclose($output);
?>
