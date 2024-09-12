<?php
include 'users_header.php';
include 'connection.php';

$row= $db->query("SELECT* from cart  ");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
    $quantity = filter_input(INPUT_POST, 'update_q', FILTER_SANITIZE_NUMBER_INT);

    if ($user_id && $quantity !== false && $quantity > 0) {
        try {
            // Prepare the SQL statement to update the quantity
            $update_quantity = $db->prepare("UPDATE cart SET quantity = ?,price=? WHERE idcart = ?");
            
            // Execute the query with the updated quantity and user ID
            $update_quantity->execute([$quantity, $user_id]);

            // Redirect the user to shoppingCart.php after updating
            header('Location: shoppingCart.php');
            exit; // Ensure that no further code execution occurs after the redirect
        } catch (PDOException $e) {
            // Handle database errors
            echo '<div class="alert alert-danger">Failed to update quantity: ' . $e->getMessage() . '</div>';
        }
    } else {
        // Invalid input or quantity
        echo '<div class="alert alert-danger">Invalid quantity. Please enter a positive integer.</div>';
    }
}

// Check if the form for deleting items is submitted
if (isset($_GET['id'])) {
    $delete_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($delete_id) {
        try {
            // Prepare and execute the query to delete the item from the cart
            $delete_item = $db->prepare("DELETE FROM cart WHERE idcart = ?");
            $delete_item->execute([$delete_id]);

            if ($delete_item->rowCount() > 0) {
                echo '<div class="alert alert-success">Item deleted from cart</div>';
            } else {
                echo '<div class="alert alert-warning">Item not found in cart</div>';
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo '<div class="alert alert-danger">Failed to delete item from cart: ' . $e->getMessage() . '</div>';
        }
    } else {
        // Invalid input
        echo '<div class="alert alert-danger">Invalid item ID.</div>';
    }
}
if(isset($_GET['delete_all'])){
    // Prepare and execute the statement
    $stmt = $db->prepare("DELETE FROM cart");
    $stmt->execute();
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="icon3.jpg" type="image/jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Elegence  Shopping cart</title>
    <style>
        .shop-cart thead{
            text-align: center;
            background: #FF416C;
            color: white;
            padding: 10px;
            width: 90px;
            height: 40px;
        }
        .shop-cart thead th{
            padding: 10px;
            width: 150px;
            text-align: center;
        }
        .shop-cart td{
            width: 200px;
            text-align: center;
        }
        td img{
            height: 120px;
            width: 100px;
            margin-left: 35px;
            padding: 10px;
        }
        .heading{
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .foot{
            height: 90px;
        }
        .foot a{
            width: 150px;
        }
        .btn {
            width: 190px;
            background: #FF416C;
            color: white;
        }
        .btn:hover{
            width: 190px;
            background: #Fc416C;
            color: white;
            border: 2px solid black;
        }
    </style>
</head>
<body>

    <div class="container">
        <section class="shop-cart">
            <h2 class="heading">Shopping Cart</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $select_cart = $db->prepare("SELECT * FROM cart");
                    $select_cart->execute();
                    $grand_total = 0;

                    if ($select_cart->rowCount() > 0) {
                        while ($cart_data = $select_cart->fetch()) {
                            $sub_total = $cart_data['price'] * $cart_data['quantity'];
                            $grand_total += $sub_total;
                        ?>
                        <tr>
                            <td><img src="<?= $cart_data['img']; ?>" style="width: 150px; height: 170px;"></td>
                            <td><h3 class="tit-box"><?php echo $cart_data['Name']; ?></h3></td>
                            <td><div class="price"><?php echo number_format($cart_data['price']) ?>Dh</div></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?= $cart_data['idcart']; ?>" name="user_id">
                                    <input type="number" min="1" value="<?= $cart_data['quantity']; ?>" name="update_q"><br><br>
                                    <input type="submit" value="Update" name="update_q" class="btn btn-dark">
                                </form>
                            </td>
                            <td><?= $sub_total ?> $</td>
                            <td>
                                <a href="shoppingCart.php?id=<?= $cart_data['idcart']; ?>" onclick="return confirm('Remove item from cart')" class="btn btn-dark">Remove from cart</a>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                    <tr>
                        <td class="foot">
                            <a href="products.php" class="btn btn-dark">Continue Shopping</a>
                        </td>
                        <td colspan="3">Grand total</td>
                        <td><?= $grand_total;?> $</td>
                        <td class="foot"><a href="shoppingCart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="btn btn-dark">Delete All</a></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    <div class="checkout-btn">
    <?php 
    // Fetch the cart ID from the database
    $cart_id_query = $db->query("SELECT idcart FROM cart");
    $cart_id_row = $cart_id_query->fetch();
    $cart_id = $cart_id_row['idcart'];
    ?>
    <a href="cart.php?id=<?php echo $cart_id; ?>" class="btn btn-dark <?= ($grand_total>1)?'':'disabled';?>">Proceed to checkout</a>
</div>
</body>
</html>