<?php
include "connection.php";
session_start();
if(isset($_COOKIE['idclient'])){
    $idclient=$_COOKIE['idclient'];
}


$data = $db->query("SELECT * FROM client WHERE USERNAME != 'admin'")->fetchAll();

$data2 = [];
if (isset($_SESSION['list'])) {
    $data2 = $_SESSION['list'];
    // session_destroy(); // Remove session_destroy() as it's destroying the session which is unnecessary
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affiche</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
          
        * {
	box-sizing: border-box;
}





.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  margin-left: -250px;
}

h2 small {
  font-size: 0.5em;
}

.responsive-table th {
  border-radius: 3px;
  padding: 25px 30px;
 
  margin-bottom: 25px;
  background: #FF416C;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}

.responsive-table tr {
  background-color: #ffffff;
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
  
}

.responsive-table .col-1 {
  flex-basis: 10%;
  border-right:none;
  padding:10px;
}

.responsive-table .col-2 {

  border-right:none;
  border-left:none;
}

.responsive-table .col-3 {
  flex-basis: 25%;
  border-right:none;
  border-left:none;
}

.responsive-table .col-4 {
  flex-basis: 25%;
  border-right:none;
  border-left:none;
}
.responsive-table .col-5 {
  flex-basis: 25%;
  border-left:none;
}

@media all and (max-width: 767px) {
  .responsive-table .table-header {
    display: none;
  }

  .responsive-table .table-row {}

  .responsive-table li {
    display: block;
  }

  .responsive-table .col {
    flex-basis: 100%;
    display: flex;
    padding: 10px 0;
  }

  .responsive-table .col:before {
    color: #6c7a89;
    padding-right: 10px;
    content: attr(data-label);
    flex-basis: 50%;
    text-align: right;
  }
}
a{
    text-decoration:none;
    margin-left:30px;
    color:red;
}


    </style>
</head>
<body>
<?php include 'admin_header.php'?>
<div class="container">
  <h2>Table Users</h2>
  <div class="responsive-table">
    <table border=".5" >
        <thead class="table-header">
            <th>Username</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Delete</th>
           
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td class="col-1"><?php echo htmlspecialchars($row["username"]); ?></td>
                    <td class="col-2"><?php echo htmlspecialchars($row["nom"]); ?></td>
                    <td class="col-3"><?php echo htmlspecialchars($row["prenom"]); ?></td>
                    <td class="col-4"><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td class="col-5">
                        <a href="delete_user.php?id=<?php echo $row['idclient']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br><br>
    <form action="search_user.php" method="post">
    <i class="fa fa-search" ></i>
    <input type="text" name="search" placeholder="Search..." class="search-input">
 
        <input type="submit" value="Search">
    </form><br>
   <h2>Table Users<small>search</small></h2>
    <table border=".5">
        <thead>
            <th>Username</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php foreach ($data2 as $row) { ?>
                <tr>
                    <td class="col-1"><?php echo htmlspecialchars($row["username"]); ?></td>
                    <td class="col-2"><?php echo htmlspecialchars($row["nom"]); ?></td>
                    <td class="col-3"><?php echo htmlspecialchars($row["prenom"]); ?></td>
                    <td class="col-4"><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td class="col-5">
                        <a href="delete_user.php?id=<?php echo $row['idclient']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>
