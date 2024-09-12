<?php
// Include database connection
include 'connection.php';

// Check if ID parameter is provided
if (isset($_GET['ProductID'])) {
    $id = $_GET['ProductID'];

    // Prepare and execute query to retrieve image data based on ID
    $query = $db->prepare("SELECT img FROM products WHERE ProductID = ?");
    $query->execute([$id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Set content type header based on image type (assuming img column stores image data)
        header("Content-type: image/jpeg"); // Change image/jpeg to appropriate image format

        // Output the image data
        echo $result['img']; // Assuming the img column stores the image data as binary
    } else {
        // Image not found
        echo "Image not found.";
    }
} else {
    // ID parameter is missing
    echo "ID parameter is missing.";
}
?>
