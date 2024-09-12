<?php
include 'connection.php';

// Fetch categories from the database
$categories = $db->prepare("SELECT * FROM `categories`");
$categories->execute();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the user ID from the form
    $user_id = $_POST['user_id'];

    // Fetch the article data based on the provided ID
    $get_data = $db->prepare("SELECT * FROM `products` WHERE ProductID = ?");
    $get_data->execute([$user_id]);
    $data = $get_data->fetch();

    // Check if the update form is submitted
    if(isset($_POST['update'])){
        try {
            // Retrieve the updated article details from the form
            $name = $_POST['Name'];
            $price = $_POST['Price'];
            $mark = $_POST['Mark'];
            $description = $_POST['Description'];
            $status = $_POST['statut'];

            // Prepare the SQL statement to update the article
            $update_article = $db->prepare("UPDATE products SET Name = ?, Price = ?, Mark = ?, Description = ?, statut = ? WHERE ProductID = ?");
            
            // Execute the query with the updated article details and user ID
            $update_article->execute([$name, $price, $mark, $description, $status, $user_id]);

            // Redirect the user to articles.php after updating
            header('location: articles.php');
            exit; // Ensure that no further code execution occurs after the redirect
        } catch (PDOException $e) {
            // Handle any potential errors
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
</head>
<body>
    <h2>Edit Article</h2>
    <form action="" method="post">
    <img src="<?php echo $data['img']; ?>" alt="Product Image" style="width: 230px; height: 240px;"><br>
        <!-- Form fields for updating the article -->
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="Name" value="<?php echo $data['Name']; ?>">
        
        <label class="form-label">Price</label>
        <input type="number" class="form-control" step="0.01" name="Price" min="0" value="<?php echo $data['Price']; ?>" >
        
        <label class="form-label">Mark</label>
        <input type="text" class="form-control" name="Mark" min="0" value="<?php echo $data['Mark']; ?>" >
        
        <label class="form-label">Description</label>
        <textarea class="form-control" name="Description" ><?php echo $data['Description']; ?></textarea>
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="img" accept=".jpg, .jpeg, .png" >
        
        <label class="form-label">Status</label>
        <select name="statut" class="form-control" >
            <option value=""><?php echo $data['statut']; ?></option>
            <option value="Available">Available</option>
            <option value="Out of stock">Out of stock</option>
            <option value="On sale">On sale</option>
            <!-- Add more options if needed -->
        </select><br><br>
        
        <input type="hidden" name="user_id" value="<?php echo $data['ProductID']; ?>">
        <input type="submit" value="Update" class="btn btn-dark" name="update"><br><br>
    </form>
</body>
</html>
