<?php
include 'connection.php';

// Fetch categories
$categories = $db->prepare("SELECT * FROM `categories`");
$categories->execute();

// Display category options
foreach ($categories as $categorie) {
    echo '<option value="' . $categorie['CategoryID'] . '">' . $categorie['Name'] . '</option>';
}

// PHP code for inserting product data into the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Mark = $_POST['Mark'];
    $Description = $_POST['Description'];
    $img = $_FILES['img']['name']; // Access uploaded file using $_FILES
    $statut = $_POST['statut'];
    $Cat = $_POST['categorie']; // Selected category ID

    // Temporary file path
    $temp_file = $_FILES['img']['tmp_name'];

    try {
        // Check if required fields are not empty
        if (!empty($Name) && !empty($Price) && !empty($Mark) && !empty($Description) && !empty($img) && !empty($statut)) {
            // Fetch category name based on the selected category ID
            $get_category_name = $db->prepare("SELECT Name FROM `categories` WHERE CategoryID = ?");
            $get_category_name->execute([$Cat]);
            $category_name = $get_category_name->fetchColumn();

            // Perform the insertion into the database
            $add_product = $db->prepare("INSERT INTO Products (Name, Price, Mark, Description, img, statut, CategoryID) VALUES (:Name, :Price, :Mark, :Description, :img, :statut, :CategoryID)");
            $add_product->bindParam(':Name', $Name);
            $add_product->bindParam(':Price', $Price);
            $add_product->bindParam(':Mark', $Mark);
            $add_product->bindParam(':Description', $Description);
            $add_product->bindParam(':img', $img);
            $add_product->bindParam(':statut', $statut);
            $add_product->bindParam(':CategoryID', $Cat);
            
            $add_product->execute();

            // Move uploaded file to desired location
            move_uploaded_file($temp_file, 'upload/' . $img);

            // Redirect to admin page after successful insertion
            header('location: Admin_page.php');
            exit();
        } else {
            echo 'Some fields are empty';
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
