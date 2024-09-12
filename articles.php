<?php
 include 'connection.php';

 $categories = $db->prepare("SELECT * FROM `categories`");
 $categories->execute(); // Execute the prepared statement to fetch categories
// Fetching all articles
$data = $db->query("SELECT * FROM `products`")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        h1{
            text-align:center;
            margin-bottom:8px;
        }
        .thead{
            text-align: center;
            background: #FF416C;
            color: white;
            padding: 10px;
            width: 90px;
            height: 40px;
        }
       .thead th{
            padding: 10px;
            width: 150px;
            text-align: center;
        }
        td{
            width: 200px;
            text-align: center;
            font-family: 'Playfair Display', serif;
        }
        td img{
            height: 120px;
            width: 100px;
            margin-left: 35px;
            padding: 10px;
        }
        .heading{
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .foot{
            height: 90px;
        }
        .foot a{
            width: 150px;
        }
        .btn {
            width: 190px;
            background: #FF416C;
            color: white;
            border-radius:20px;
            width:50px;
            padding:5px 5px;
        }
        .btn:hover{
            width: 100px;
            background: #eF416C;
            color: white;
            border: 2px solid black;
        }
    </style>
</head>
<body>
<?php include 'admin_header.php'?>
    <h1>Articles</h1>

    <table>
        <tr class="thead">
            <th>Date and Time</th>
            <th>Name</th>
            <th>Price</th>
            <th>Mark</th>
            <th>Description</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
        <?php foreach ($data as $row) { ?>
        <tr>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['Name'] ?></td>
            <td><?php echo $row['Price'] ?></td>
            <td><?php echo $row['Mark'] ?></td>
            <td><?php echo $row['Description'] ?></td>
            <td><img src="<?php echo $row['img']; ?>" alt="Product Image" style="max-width: 100px;"></td>
            <td>
                <form action="edit_article.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $row['ProductID'] ?>">
                    <input type="submit" name="edit_article" value="Edit" class="btn">
                </form>
            </td>
            <td>
                <form action="delete_article.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $row['ProductID']; ?>">
                    <input type="submit" value="Delete" class="btn">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
