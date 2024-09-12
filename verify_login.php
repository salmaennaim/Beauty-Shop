<?php
include 'connection.php';

session_start(); // Start session to use session variables

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $User = $_POST['user'];
    $password = $_POST['password'];

    $login_query = $db->prepare("SELECT idclient, username, `TYPE`, nom, prenom, email FROM client WHERE (username = :user OR email = :email) AND password = :password");
    $login_query->bindParam(':user', $User);
    $login_query->bindParam(':email', $User); // Assuming username and email can be used interchangeably for login
    $login_query->bindParam(':password', $password);
    $login_query->execute();

    $user = $login_query->fetch(PDO::FETCH_ASSOC);

    if($user) { // Check if user exists
        // Store user data in session variables
        $_SESSION['valid'] = true; // You might want to set this to true to indicate that the user is authenticated
        $_SESSION['username'] = $user['username'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['email'] = $user['email'];

        if ($user['TYPE'] === 'A')
        {
            header('location: Admin_page.php');
            exit();
        }
        else 
        {
            // Set cookie for the client's ID
            setcookie('idclient', $user['idclient'], time() + 60 * 60 * 24 * 30, '/');
            header('location: mainpage.php?user=' . $user['username']);
            exit();
        }
    }
    else
    {
        echo 'Email ou mot de passe incorrect !';
    }
}
?>
