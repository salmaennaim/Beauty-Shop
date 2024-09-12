<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="" method="post">
    <div class="field input">
            <label for="email">Username</label>
            <input type="usernmae" name="username" id="username" required>
        </div>
        <div class="field input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="field input">
            <label for="password">password</label> 
            <input type="password" name="password" id="password" required> 
        </div>
        <div class="field input">
            <label for="confirm_password">Confirmation password</label> 
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>
        <div class="field">
            <input type="submit" name="inscrire" id="submit" value="S'inscrire">
        </div>
        <div class="links">
                    Already a member?<a href="login.php">Sign Up</a>
        </div>
    </form>
            <?php
    include "connexion.php";
    if(isset($_POST['inscrire'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mdp = $_POST['password'];
        $mdpHash = password_hash($mdp,PASSWORD_DEFAULT);
        echo "$mdpHash";
        $sql = $conn -> exec("INSERT INTO utilisateur (Identifiant,Email,Mdp) VALUES ('$Identifiant','$email','$mdp')");
        header("Location: login.php");
    }
    ?>
</body>
</html>
