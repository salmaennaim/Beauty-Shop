<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clientID = $_POST['idclient']; // Assuming you have a way to get the client ID
    $firstName = $_POST['prenom'];
    $lastName = $_POST['nom'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $message = $_POST['message'];

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($username) && !empty($message)) {
        try {
            // Insert contact form data into the database
            $insert_contact = $db->prepare("INSERT INTO contactform (idclient, prenom, nom, Email, username, Message) VALUES (idclient, :prenom, :nom, :email, :username, :message)");
            $insert_contact->bindParam(':idclient', $clientID);
            $insert_contact->bindParam(':prenom', $firstName);
            $insert_contact->bindParam(':nom', $lastName);
            $insert_contact->bindParam(':email', $email);
            $insert_contact->bindParam(':username', $username);
            $insert_contact->bindParam(':message', $message);
        
            $insert_contact->execute();

            // Redirect to a thank you page or wherever you want
            header('location: thank_you.php');
            exit();
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Handle form validation errors here
        echo "Please fill in all the fields.";
        // Redirect back to the contact form
        header('location: contact.php');
        exit();
    }
} else {

    echo "<div class='message'>
        <p>message envoyer avec succe</p>
        </div><br>";
    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";

    exit();
}
?>

