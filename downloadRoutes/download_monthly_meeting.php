<?php
// Include the database configuration file
require_once '../config.php';

// Query to select all records from the monthly_meeting table
$sql = "SELECT * FROM monthly_meeting";
$result = $conn->query($sql);

// Set headers to indicate the file type and disposition
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=monthly_meeting_data.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the column headings
fputcsv($output, array('ID', 'PHC Meeting Date', 'Subcenter Meeting Date', 'About'));

// Fetch the data and output each row to the CSV file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

// Close the file pointer
fclose($output);
?>
