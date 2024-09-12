<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="icon3.jpg" type="image/jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Elegence </title>
</head>
<style>
       *{
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
}
     .navbar{
        margin-left: 100px;
        padding: 6px;
        justify-content: space-evenly;
     }
    .navbar a i{
        color: white;
        text-decoration: none;
        margin-top: 5px;
        font-weight: 700;
        font-size: 25px;
    }
    .navbar a i:hover{
        color:black ;
        text-decoration: none;
        margin-top: 5px;
        font-weight: 700;
        font-size: 25px;
    }

    .header{
        
        background-color: #FF416C;
        width: 100%;
        height: 89px;
        padding: 10px;
        display: flex;
        position: fixed;
        z-index: 999;
       

    }
    .header a{
        font-size: 23px;
        color: white;
        font-weight: 700;
        text-decoration: none;
        margin-left: 40px;
        padding: 20px;
    }
    .header a:hover{
        font-size: 23px;
        color:black;
        font-weight: 700;
        text-decoration: none;
        margin-left: 40px;
        padding: 20px;
    }

    .header .serch .search{
        width: 400px;
        height: 40px;
        margin-left: 200px;
        padding: 20px;
        margin-top: 15px;
        color: white;
        background-color:  white;
        border: 1px solid white;
        border-radius: 10px;

    }
    .header .serch .btn1{
        width: 140px;
        height: 44px;
        background-color:  white;
        border: 1px solid white;
        border-radius: 10px;
        margin-left: 10px;
    }
    .header .serch .btn1:hover{
        background-color: black;
        color: white;
    }
    .formulaire {
        background-color: transparent;
        width: 750px;
        padding: 20px;
        height: 470px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 3px;
        backdrop-filter: blur(5px);
        border-radius: 30px;
        border: 4px double #145A32;
    }
    .col {
        display: flex;
        justify-content: space-evenly;
       
    }
    input {
        height: 40px;
        width: 310px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 15px;
        color: black;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid black;
        background-color: transparent;
    }
    p {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 600;
    }
    span {
        font-size: 17px;
        color: gray;
    }
    .link {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 600;
        text-align: center;
    }
    .link select{
        width: 700px;
        height: 34px;
        background-color: transparent;
    }

    .btn{
        background-color: #FF416C;
        color: white;
        width: 700px;
       
    }
    .btn:hover{
        background-color: black;
        color: white;
        width: 700px;
        border: 2px solid black;
       
    }
    body {
        background: url('Cosmetic packaging set (1).jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .formulaire h3{
        color: black;
        text-align: center;
        font-weight: 600;
    }
    .display-order{
        border: 1px solid black;
        width: 750px;
        margin-left: 300px;
        padding: 20px;
        margin-bottom: 10px;
    }
    .display-order span{
        display: inline-block;
        color: black;
        margin-left: 60px;
        font-weight: 600;
    }
.order-msg{
    border: 3px double black;
    width: 750px;
}
</style>
<body>
<header class="header">
      <a href="user.php">Elegence</a>
      <div class="serch">
      <input type="search" name="search" class="search" placeholder="Search here ..."><input type="submit" value="Search Product" class="btn1">
      </div>
       <nav class="navbar">
       <a href="shoppingCart.php"><i class="fa-solid fa-cart-shopping"></i> </a>
       <a href="profile.php"><i class="fa-solid fa-user"></i></a>
       </nav>
</header><br><br><br><br>
<div class="display-order">
    <?php 
    $select_cart = $db->prepare("SELECT * FROM cart ");
    $select_cart->execute();
    $total = 0;
    $grand_total = 0;
    if ($select_cart->rowCount() > 0) {
        while ($products = $select_cart->fetch()) {
            $total_price = number_format($products['quantity'] * $products['price']);
            $grand_total += $total_price; 
    ?>
            <span><?= $products['Name'] ?>(<?= $products['quantity'] ?>)</span>
    <?php
        }
    } else {
        echo '<div class="display-order"><span>Your Cart is empty!</span></div>';
    }
    ?>
    <span class="grand_total">Grand total: <?= $grand_total; ?> $</span>
</div>
<div class="container">

    <section class="chechout">
    <form method="post" class="formulaire">
       <h3>Complete your order</h3>
        <div class="col">
            <p>Your name <span>*</span>: <br> <input type="text" placeholder="Enter your name" name="name" required></p><br>
            <p>Your email <span>*</span>: <br> <input type="email" placeholder="Enter your email" name="email" required></p> 
        </div><br>
        <div class="col">
            <p>Country<span>*</span>: <br>
            <input type="text" placeholder="Enter your Country" name="Country" required>
             </p>
            <p>City<span>*</span>: <br>
            <input type="text" placeholder="Enter your City" name="City" required>
             </p>  
        </div>
        <div class="col">
            <p>Adresse<span>*</span>: <br>
            <input type="text" placeholder="Enter your Adresse" name="Adresse" required>
             </p>
            <p>Postal code<span>*</span>: <br>
            <input type="text" placeholder="Enter your Postal code" name="Postal code" required>
             </p>  
        </div>
        <p class="link">Payment method<span>*</span>: 
            <br> <select name="method">
                <option value="Cash on delivery" selected>Cash on delivery</option>
                <option value="Credit Cart">Credit Cart</option>
                <option value="paypal">Paypal</option>
                </select>
        </p>
        <input type="submit" value="Order Now" name="order" class="btn btn-dark">
        
</form>
    </section>
</div>
<?php
    if(isset($_POST['order'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $Country = $_POST['Country'];
        $City = $_POST['City'];
        $Adresse = $_POST['Adresse'];
        $Postal_code = $_POST['Postal_code']; // Change to match the input field name
        $method = $_POST['method'];
        $cart = $db->prepare("SELECT * FROM cart");
        $cart->execute();
        $products_total = 0;
        $product_name = [];
        $product_price = [];
        while ($data = $cart->fetch()){
            $product_name[] = $data['Name'] .'('.$data['quantity'].')';
            $product_price[] = number_format($data['price'] * $data['quantity']);
        }
        $total_product = implode(',', $product_name);
        $price_total = array_sum($product_price); // Sum up the elements of the $product_price array
        
       
        $sql = $db->prepare("INSERT INTO orders(`name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`)
        VALUES ('$name','$email','$method','$City','$Country','$Adresse','$Postal_code','$total_product','$price_total')");
        $sql->execute();
        if($cart && $sql){
            echo '<div class="order-msg">
                <div class="msg-cont">
                    <h4>Thank you for shopping </h4>
                    <div class="ord-details">
                        <span>'.$total_product.'</span>
                        <span class="total">Total: '.$price_total.' </span>
                    </div>
                    <div class="costum-details">
                        <p> Your name:<span>'.$name.'</span></p>
                        <p> Your email:<span>'.$email.'</span></p>
                        <p> Your adress:<span>'.$Adresse.'</span></p>
                        <p> Your Postal code:<span>'.$Postal_code.'</span></p>
                        <p> Your city:<span>'.$City.'</span></p>
                        <p> Your county:<span>'.$Country.'</span></p>
                        <p> Your payment mode:<span>'.$method.'</span></p>
                        <p>(pay when product arrives)</p>
                    </div>
                    <a href="user.php"><i class="fa-solid fa-cart-shopping"></i>Continue Shopping</a>
                </div>
            </div>';
        }
    }
?>

</body>
</html>