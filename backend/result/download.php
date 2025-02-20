<?php
if (isset($_GET['result'])) {
    $file_path = $_GET['result'];

    // Decode the URL-encoded file path
    $decoded_file_path = urldecode($file_path);

    // Get the parent directory of the script
    $parent_directory = realpath(__DIR__ . '/..');

    // Construct the absolute file path
    $absolute_file_path = $parent_directory . '\result/' . $decoded_file_path;

    // Validate the file path to prevent unauthorized access
    if (strpos($absolute_file_path, $parent_directory . '/uploads/') == 0 && file_exists($absolute_file_path)) {
        // Set the appropriate headers for PDF file download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($absolute_file_path) . '"');
        header('Content-Length: ' . filesize($absolute_file_path));

        // Read the file and output it to the browser
        readfile($absolute_file_path);
        exit;
    } else {
        echo "Invalid file path.";
    }
} else {
    echo "File path not provided.";
}
?>