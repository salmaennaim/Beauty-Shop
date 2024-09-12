<?php

include 'connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $search = $_POST['search'];

    // Corrected the placeholder for the username and concatenated the wildcard
    $query = $db->prepare('SELECT * FROM client WHERE username LIKE :username');
    // Concatenate the wildcard with the search term
    $search = '%' . $search . '%';
    $query->bindParam(':username', $search);
    $query->execute();

    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    
    $_SESSION['list'] = $data;

    header('location: users.php');
    exit();
}
else
{
    header('location: users.php');
    exit();
}
?>
