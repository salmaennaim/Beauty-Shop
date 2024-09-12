<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user_id = $_POST['user_id'];

    try
    {
        if (!empty($user_id))
        {
            $delete = $db->prepare("DELETE FROM products WHERE ProductID = ?");
            $delete->execute([$user_id]);

            header('location: articles.php');
        }
    }
    catch (PDOException $e)
    {
        echo 'error: ' . $e;
    }
    
}