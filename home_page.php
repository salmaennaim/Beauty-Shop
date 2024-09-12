<?php
    include 'connection.php';

    $data = $db->query("SELECT * FROM article")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        *{
            font-family:Arial, Helvetica, sans-serif
        }
        .article{
            padding: 20px;
            min-width: 400px;
        }
        pre{
            font-size: 18px;
        }
    </style>
</head>

<body>
    <h1>Welcome <?php echo $_GET['user'] ?></h1>
    <?php foreach ($data as $row) { ?>
        <div class="article">
            <h3> > Date and time : <?php echo $row['ATIME'] ?></h3>
            <pre><?php echo $row['ARTICLE'] ?></pre>
        </div>
        <br>
    <?php } ?>
</body>
</html>