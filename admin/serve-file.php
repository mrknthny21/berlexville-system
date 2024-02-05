<?php
// Get the filename from the query string or request body
$filename = isset($_GET['filename']) ? $_GET['filename'] : '';

// Define the path to the files directory
$directory = 'C:/xampp/htdocs/berlexville-system/resolution-files/';

// Ensure the filename is valid
if ($filename && is_readable($directory . $filename)) {
    // Set the appropriate headers
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $content_type = mime_content_type($directory . $filename);

    header('Content-Type: ' . $content_type);
    
    // Check if it's a PDF file and set additional headers
    if ($file_extension === 'pdf') {
        header('Content-Disposition: inline; filename="' . $filename . '"');
    }
    
    // Output the file contents
    readfile($directory . $filename);
} else {
    // File not found or inaccessible
    echo 'File not found or inaccessible.';
}
?>
