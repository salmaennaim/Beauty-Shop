<?php
session_start(); // Start the session

include 'connection.php';

// SQL query to retrieve products with their respective categories
$sql = "SELECT 
            ProductID,
            Name,
            Price,
            Mark,
            Description,
            img,
            statut
        FROM 
            products";
           
                
$prdid = isset($_SESSION['ProductID']) ? $_SESSION['ProductID'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
         .section4 {
  height: 100%;
}

.d-flex {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.align-center {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.flex-centerY-centerX {
  justify-content: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.section4 {
  background-color: #f7f7f7;
}

.page-wrapper {
  height: 100%;
  display: table;
}

.page-wrapper .page-inner {
  display: table-cell;
  vertical-align: middle;
}

.el-wrapper {
  width: 360px;
  padding: 15px;
  margin: 15px auto;
  background-color: #fff;
}

@media (max-width: 991px) {
  .el-wrapper {
    width: 345px;
  }
}

@media (max-width: 767px) {
  .el-wrapper {
    width: 290px;
    margin: 30px auto;
  }
}

.el-wrapper:hover .h-bg {
  left: 0px;
}

.el-wrapper:hover .price {
  left: 20px;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  color: #818181;
}

.el-wrapper:hover .add-to-cart {
  left: 50%;
}

.el-wrapper:hover .img {
  -webkit-filter: blur(7px);
  -o-filter: blur(7px);
  -ms-filter: blur(7px);
  filter: blur(7px);
  filter: progid:DXImageTransform.Microsoft.Blur(pixelradius='7', shadowopacity='0.0');
  opacity: 0.4;
}

.el-wrapper:hover .info-inner {
  bottom: 155px;
}

.el-wrapper:hover .a-size {
  -webkit-transition-delay: 300ms;
  -o-transition-delay: 300ms;
  transition-delay: 300ms;
  bottom: 50px;
  opacity: 1;
}

.el-wrapper .box-down {
  width: 100%;
  height: 90px;
  position: relative;
  overflow: hidden;
}

.el-wrapper .box-up {
  width: 100%;
  height: 300px;
  position: relative;
  overflow: hidden;
  text-align: center;
}

.el-wrapper .img {
  padding: 20px 0;
  -webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
  -moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
  -o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
  transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
}

.h-bg {
  -webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
  -moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
  -o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
  transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  width: 660px;
  height: 100%;
  background-color: #3f96cd;
  position: absolute;
  left: -659px;
}

.h-bg .h-bg-inner {
  width: 50%;
  height: 100%;
  background-color: #464646;
  text-align: center;
  color: black;
  font-size:17px;
  font-weight: 700;
 padding-top:4px;

}

.info-inner {
  -webkit-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
  -moz-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
  -o-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
  transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  position: absolute;
  width: 100%;
  bottom: 25px;

}

.section4 .info-inner .p-name,
.info-inner .p-company {
  display: block;
 
}

.info-inner .p-name {
    font-family: 'PT Sans', sans-serif;
    font-size: 18px;
    color: #252525;
    position: relative; /* Change from absolute to relative */
    top: 0; /* Set top to 0 */
    left: 0; /* Set left to 0 */
}
.p-name {
  position: relative; /* Change from absolute to relative */
    top: 2000; /* Set top to 0 */
    left: 0; /* Set left to 0 */
}
.generalprod {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-flow: row wrap;
}

.info-inner .p-company {
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  text-transform: uppercase;
  color: #8c8c8c;
 
}
.price b{
  font-family: 'Lato', sans-serif;
  font-size: 17px;
  text-transform: capitalize; 
  color: #9c9c9c;
  
}
.a-size {
  -webkit-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
  -moz-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
  -o-transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
  transition: all 300ms cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  position: absolute;
  width: 100%;
  bottom: -20px;
  font-family: 'PT Sans', sans-serif;
  color: #828282;
  opacity: 0;
}

.a-size .size img{
  color: #252525;
  
}

.cart {
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
}

.cart .price {
  -webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
  -moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
  -o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
  transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  -webkit-transition-delay: 100ms;
  -o-transition-delay: 100ms;
  transition-delay: 100ms;
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  font-size: 16px;
  color: #252525;
  
}

.cart .add-to-cart {
  -webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
  -moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
  -o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
  transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
  /* ease-out */
  -webkit-transition-delay: 100ms;
  -o-transition-delay: 100ms;
  transition-delay: 100ms;
  display: block;
  position: absolute;
  top: 50%;
  left: 110%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.cart .add-to-cart .txt {
  font-size: 12px;
  color: #fff;
  letter-spacing: 0.045em;
  text-transform: uppercase;
  white-space: nowrap;
}
.generalprod{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-flow: row wrap;
}
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Lato', sans-serif;
  font-family: 'Oswald', sans-serif;
}
h1{
    color:white;
    background:black;
}
/* Header styles */
.header {
    background-color: black; /* Background color */
    color: #fff; /* Text color */
    padding: 20px; /* Padding */
    text-align: center; /* Center align text */
  }

  /* Navigation styles */
  ul {
    list-style-type: none; /* Remove default bullet points */
    margin: 0; /* Remove default margin */
    padding: 0; /* Remove default padding */
    text-align: center; /* Center align text */
  }

  ul li {
    display: inline-block; /* Display list items horizontally */
    margin-right: 20px; /* Add space between list items */
  }

  ul li a {
    background-color: black; 
    color: white; /* Link text color */
    text-decoration: none; /* Remove underline from links */
    padding: 10px; /* Add padding to links */
    border-radius: 5px; /* Add rounded corners */
    font-size:17px;
    transition: background-color 0.3s ease; 
    position:relative;
    top:-35px;
  }

  ul li a:hover {
    background-color: #ccc; /* Change background color on hover */
  }

  /* Icon styles */
  ul li a i {
    margin-right: 5px; /* Add space between icon and text */
  }
input{
    border:2px solid black;
}
.saerch h1{
    font-size:40px;
}
.btn{
    position:relative;
    left:-650px;
}
    </style>
</head>
<body>
<h1>Elegence</h1> 
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<div class="header"></div>
    
      <ul>
<li><a href="mainpage.php">Home</a></li>
<li><a href="contact.php">Contact</a></li>
<li><a href="footer.php">Services</a></li>
<li><a href="products.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
<li><a href="shoppingCart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
<li><a href="saerch.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>

</ul>

</div>
<div class="saerch">
    <h2>Search Products</h2>
<form action="" method="POST" class="serch">
    <input type="search" name="search" class="search" placeholder="Search here ...">
    <input type="submit" value="Search Product" class="btn1">
  </form>
</div>
<div class="reslt">
       <?php
    if(isset($_POST['search'])) {
        // Récupère la valeur saisie par l'utilisateur
        $searchTerm = $_POST['search'];
    
        // Prépare et exécute la requête SQL pour rechercher les produits correspondants
        $stmt = $db->prepare("SELECT * FROM products WHERE Name LIKE ?");
        $stmt->execute(["%$searchTerm%"]);
    
        // Vérifie s'il y a des résultats
        

    // Check if there are any results
    if ($stmt->rowCount() > 0) {
        // Output HTML for displaying each product
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Start the product container
            echo '<div class="product">';
            echo '<div class="container page-wrapper">';
            echo '<div class="page-inner">';
            echo '<div class="row">';
            echo '<div class="el-wrapper">';
            
            // Output product image and information
            echo '<div class="box-up">';
            $imageSrc = htmlspecialchars($row["img"]);
            echo '<img src="' . $imageSrc . '" alt="' . htmlspecialchars($row["Name"]) . '" width="200" name="img">';
            echo '</div>'; // Close the box-up div
            
            // Output product price and buy button
            echo '<div class="box-down">';
            echo '<div class="h-bg">';
            echo '<div class="h-bg-inner" >'. htmlspecialchars($row["Mark"]) . '</div>';
            echo '</div>';
            echo '<a class="cart" href="shop.php?id=' . htmlspecialchars($row["ProductID"]) . '">';
            echo '<span class="price" name="price"><b name="product_name">' . htmlspecialchars($row["Name"]) . '</b> <br>' . htmlspecialchars($row["statut"]) . '<br>$' . htmlspecialchars($row["Price"]) . '</span>';
            echo '<span class="add-to-cart">';
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row["ProductID"]) . '">';
            echo '<input type="submit" class="btn" value="Add to Cart" name="add_to_cart">';
            echo '</form>';
            echo '</span>';
            echo '</a>';
            echo '</div>'; // Close the box-down div
            
            // Close the el-wrapper div
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>'; // Close the product div
        }
        } else {
            // Si aucun produit correspondant n'est trouvé
            echo '<p>No products found for your search term.</p>';
        }
    }
 ?>
<?php include 'footer.php'?>


</body>
</html>
