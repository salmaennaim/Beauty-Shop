<?php

include "connection.php";

// Check if product ID is provided
if (!isset($_GET['id'])) {
    // Handle error - Product ID is not provided
    echo "Product ID is not provided.";
    exit;
}

// Fetch product details based on the provided ID
$product_id = $_GET['id'];
$product = $db->query("SELECT * FROM products WHERE ProductID = $product_id")->fetch();

// Check if the product exists
if (!$product) {
    // Product not found, handle the error
    echo "Product not found!";
    exit;
}

// Check if the form is submitted
if(isset($_POST['add_to_cart'])){
    $product_name = $product['Name'];
    $product_price = $product['Price'];
    $product_image = $product['img'];
    $product_quantity = 1; // Default quantity is 1
    
    // Prepare and execute the query to check if the product is already in the cart
    $select_cart = $db->prepare("SELECT * FROM cart WHERE name = ?");
    $select_cart->execute([$product_name]);
    
    // Check if the product is already in the cart
    if ($select_cart->rowCount() > 0) {
        $msg[] = 'Product already added to cart.';
    } else {
        // Add the product to the cart
        $insert_cart = $db->prepare("INSERT INTO cart (name, price, img, quantity, idclient) VALUES (?, ?, ?, ?, ?)");
        $insert_cart->execute([$product_name, $product_price, $product_image, $product_quantity, $product_id]);
        $msg[] = 'Product has been successfully added to your cart.';
    }
}

?>


<html lang="en">

<head>
  <title>Harvest vase</title>
  <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
  <style>/* 
* Design by Robert Mayer:https://goo.gl/CJ7yC8
*
*I intentionally left out the line that was supposed to be below the subheader simply because I don't like how it looks.
*
* Chronicle Display Roman font was substituted for similar fonts from Google Fonts.
*/

body {
  background-color: #fdf1ec;
}

.wrapper {
  height: 420px;
  width: 654px;
  margin: 50px auto;
  border-radius: 7px 7px 7px 7px;
  /* VIA CSS MATIC https://goo.gl/cIbnS */
  -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
}

.product-img {
  float: left;
  height: 420px;
  width: 327px;
}

.product-img img {
  border-radius: 7px 0 0 7px;
}

.product-info {
  float: left;
  height: 420px;
  width: 327px;
  border-radius: 0 7px 10px 7px;
  background-color: #ffffff;
}

.product-text {
  height: 300px;
  width: 327px;
}

.product-text h1 {
  margin: 0 0 0 38px;
  padding-top: 52px;
  font-size: 34px;
  color: #474747;
}

.product-text h1,
.product-price-btn p {
  font-family: 'Bentham', serif;
}

.product-text h2 {
  margin: 0 0 47px 38px;
  font-size: 13px;
  font-family: 'Raleway', sans-serif;
  font-weight: 400;
  text-transform: uppercase;
  color: #d2d2d2;
  letter-spacing: 0.2em;
}

.product-text p {
  height: 125px;
  margin: 0 0 0 38px;
  font-family: 'Playfair Display', serif;
  color: #8d8d8d;
  line-height: 1.7em;
  font-size: 15px;
  font-weight: lighter;
  overflow: hidden;
}

.product-price-btn {
  height: 103px;
  width: 327px;
  margin-top: 17px;
  position: relative;
}

.product-price-btn p {
  display: inline-block;
  position: absolute;
  top: -13px;
  height: 50px;
  font-family: 'Trocchi', serif;
  margin: 0 0 0 38px;
  font-size: 28px;
  font-weight: lighter;
  color: #474747;
}

span {
  display: inline-block;
  height: 50px;
  font-family: 'Suranna', serif;
  font-size: 34px;
}

.product-price-btn .btn {
  float: right;
  display: inline-block;
  height: 50px;
  width: 176px;
  margin: 0 40px 0 16px;
  box-sizing: border-box;
  border: transparent;
  border-radius: 60px;
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  color: #ffffff;
  background-color: #9cebd5;
  cursor: pointer;
  outline: none;
  margin-right: 10px;
  text-decoration:none;
  text-align:center;
  padding-top:15px;
}

.product-price-btn .btn:hover {
  background-color: #79b0a1;
}</style>
</head>

<body>


<div class="wrapper">
    <div class="product-img" name="product_img">
        <img src="<?php echo $product['img']; ?>" height="420" width="327">
    </div>
    <div class="product-info">
        <div class="product-text">
            <h1 name="product_name"><?php echo $product['Name']; ?></h1>
            <h2>by Time to Shine</h2>
            <p><?php echo $product['Description']; ?></p>
        </div>
        <div class="product-price-btn">
            <form action="" method="post">
                <p name="product_price"><span><?php echo $product['Price']; ?></span>$</p>
                <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
            </form>
        </div>
    </div>
</div>

</body>

</html>