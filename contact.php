<?php
include "connection.php";
session_start();

// Fetch username from session
$username = $_SESSION['username'];

$stmt = $db->prepare("SELECT * FROM client WHERE username = ?");
$stmt->execute([$username]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the form has been submitted
if(isset($_POST['send'])){
    // Retrieve form data
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $message = $_POST['message'];

    // Prepare and execute the SQL statement to insert data into the contactform table
    $insert_message = $db->prepare("INSERT INTO contactform(prenom, nom, email, username, message) VALUES(:prenom, :nom, :email, :username, :message)");

$insert_message->bindParam(':prenom', $prenom);
$insert_message->bindParam(':nom', $nom);
$insert_message->bindParam(':email', $email);
$insert_message->bindParam(':username', $username);
$insert_message->bindParam(':message', $message);

$insert_message->execute();
    

    // Provide feedback to the user after submitting the form
    $message = 'Message sent successfully!';
}
?>

<!-- Your HTML form -->
<form action="" method="POST">
    <div class="form-row">
        <div class="input-data">
            <input type="text" name="prenom" required>
            <div class="underline"></div>
            <label for="">First Name</label>
        </div>
        <div class="input-data">
            <input type="text" name="nom" required>
            <div class="underline"></div>
            <label for="">Last Name</label>
        </div>
    </div>
    <div class="form-row">
        <div class="input-data">
            <input type="email" name="email" required>
            <div class="underline"></div>
            <label for="">Email Address</label>
        </div>
        <div class="input-data">
            <input type="text" name="username" required>
            <div class="underline"></div>
            <label for="">Username</label>
        </div>
    </div>
    <div class="form-row">
        <div class="input-data textarea">
            <textarea rows="8" cols="80" name="message" required></textarea>
            <br />
            <div class="underline"></div>
            <label for="">Write your message</label>
        </div>
    </div>
    <div class="form-row submit-btn">
    <div class="input-data">
        <div class="inner"></div>
        <input type="submit" name="send" value="Submit">
    </div>
</div>
</form>
