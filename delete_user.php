<?php
include "connection.php";
$sql = $db ->prepare('DELETE FROM client WHERE idclient = "'.$_GET['id'].'"');
$sql -> execute();
header("Location: users.php");
exit();
?>

