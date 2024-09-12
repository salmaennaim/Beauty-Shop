<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];

    if ($password !== $Cpassword) {
        echo "Password verification failed";
        exit();
    }

    // Check if the email already exists
    $stmt = $db->prepare("SELECT email FROM client WHERE email = :email");
    $stmt->execute(['email' => $email]);

    if ($stmt->rowCount() != 0) {
        echo "<div class='message' style=\"background-color: #ffcccc;
        padding: 10px; 
        margin-bottom: 10px; 
        border-radius: 5px;
        text-align: center;\"><p>Cet email est utilisé, veuillez en essayer un autre!</p></div><br>";

        echo "<a href='javascript:self.history.back()'><button class='btn' style=\"background-color: #4CAF50;margin-left:640px;
        color: white;
        padding: 10px 20px;
        text-decoration: none; 
        border: none;
        border-radius: 5px; 
        cursor: pointer;\">Retour</button></a>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $stmt = $db->prepare("INSERT INTO client (username, nom, prenom, email, password) VALUES (:username, :nom, :prenom, :email, :password)");
    $stmt->execute(['username' => $username, 'email' => $email, 'prenom' => $prenom, 'nom' => $nom, 'password' => $hashed_password]);

    echo "<div class='message' style=\"background-color: #ccffcc;
    padding: 10px; 
    margin-bottom: 10px; 
    border-radius: 5px;
    text-align: center;\"><p>Inscription réussie!</p></div><br>";
    echo "<a href='login.php'><button class='btn'  style=\"background-color: #4CAF50;margin-left:600px;
    color: white;
    padding: 10px 20px;
    text-decoration: none; 
    border: none;
    border-radius: 5px; 
    cursor: pointer;\">Connectez-vous maintenant</button></a>";
    exit();
} else {
    header('location: login.php');
    exit();
}
