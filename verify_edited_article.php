<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $edited_article = $_POST['Earticle'];
    $user_id = $_POST['user_id'];

    try
    {
        if (!empty($edited_article))
        {
            $Update_article = $db->prepare("SELECT * FROM products WHERE ProductID = ?");
            $Update_article->execute([$edited_article, $user_id]);
        }

        header('location: articles.php');
    }
    catch (PDOException $e)
    {
        echo 'error: ' . $e;
    }
}