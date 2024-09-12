<?php
    include 'connection.php';

    // Fetch categories
    $categories = $db->prepare("SELECT * FROM `categories`");
    $categories->execute(); // Execute the prepared statement to fetch categories
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        
        h1{
            text-align:center;
           
        }
        h2{
            text-align:center;
            
            border-radius:10px;
            color:black;
            
            width:150px;
            margin-left:160px;
            margin-top:20px;
        }
        form{
            
            border:1px solid black;
            
            border-radius:10px;
            width:500px;
            
        }
        input{
            width:400px;
            height: 30px;
            border-radius:2px;
            margin-left:10px;
        }
        textarea{
            margin-left:10px;
        }
        b{
            color:red;
        }
        .btn{
            padding:7px;
            width:60px;
            margin-bottom:10px;
            background: black;
            color:white;
        }
        label{
            margin-left:20px;
        }
        select option{
            margin-left:10px;
        }
    </style>
</head>
<body>
<?php include 'admin_header.php'?>

<div class="container">

    
    
    <form action="verify_article.php" method="post" enctype="multipart/form-data">
    <h2>Add Article</h2><br><br>
        <!-- Form fields for adding article -->
        <label class="form-label">Name <b>*</b>:</label><br>
        <input type="text" class="form-control" name="Name" required><br>
        
        <label class="form-label">Price<b>*</b>:</label><br>
        <input type="number" class="form-control" step="0.01" name="Price" min="0" required><br>
        
        <label class="form-label">Mark<b>*</b>:</label><br>
        <input type="text" class="form-control" name="Mark" min="0" required><br>
        
        <label class="form-label">Description<b>*</b>:</label><br>
        <textarea class="form-control" name="Description" required></textarea><br>
        
        <label class="form-label">Image<b>*</b>:</label><br>
        <input type="file" class="form-control" name="img" accept=".jpg, .jpeg, .png" required><br>
        
        <label class="form-label">Status <b>*</b>:</label><br>
        <select name="statut" class="form-control" required><br>
            <option value="">Select Status</option>
            <option value="Available">Available</option>
            <option value="Out of stock">Out of stock</option>
            <option value="On sale">On sale</option>
            <!-- Add more options if needed -->
        </select><br><br>
        <label class="form-label">Catégorie</label><br>
        <select name="categorie" class="form-control">
            <option value="">Choisissez une catégorie</option>
            <?php
            foreach ($categories as $categorie) {
                echo '<option value="' . $categorie['CategoryID'] . '">' . $categorie['Name'] . '</option>';
            }
            ?>
        </select><br><br><br>
        <input type="submit" value="ADD" class="btn">
    </form><br>
</div>


    
   
</body>
</html>
