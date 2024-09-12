<?php
session_start(); // Start the session

include 'connection.php';

// SQL query to retrieve products with their respective categories
$sql = "SELECT 
            p.ProductID,
            p.Name AS ProductName,
            p.Price,
            p.Mark,
            p.Description,
            p.img,
            p.statut,
            c.Name AS CategoryName
        FROM 
            products p
        JOIN 
            categories c ON p.CategoryID = c.CategoryID
        WHERE 
            p.CategoryID = 2"; 

$prdid = isset($_SESSION['ProductID']) ? $_SESSION['ProductID'] : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-PY/ZWrXQrnIWoEV8GRsIWy3kgpZGBuac4LoUp1OCaGMLlyk7p94n2LSt5DW1f+eA" crossorigin="anonymous">
    <style>
        *{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;

}
.sectionvis {
  background-color: black;
  background-position: 0 0, 25px 25px;
  background-size:25px 25px;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;

  min-height: 100vh;
  padding: 20px;

  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  
}

.anim .sectionvis{
  animation-name: hid;
  animation-fill-mode: forwards;
  z-index: 1;
  animation-delay: 3s;
}
@keyframes hid{
  from{
    visibility: visible;
  }
  to{
    display: none;
  }
}

.anim .section{
  animation-name: vis;
  animation-fill-mode: forwards;
  visibility: hidden;
  animation-delay: 3s;
  color: white;
  
}
@keyframes vis{
  from{
    visibility: hidden;
  }
  to{
    visibility: visible;
  }
}

.block-effect {
  font-size: calc(8px + 6vw);
}

.block-reveal {
  --t: calc(var(--td) + var(--d));

  color: transparent;
  padding: 4px;

  position: relative;
  overflow: hidden;

  animation: revealBlock 0s var(--t) forwards;
}

.block-reveal::after {
  content: '';

  width: 0%;
  height: 100%;
  padding-bottom: 4px;

  position: absolute;
  top: 0;
  left: 0;

  background: var(--bc);
  animation: revealingIn var(--td) var(--d) forwards, revealingOut var(--td) var(--t) forwards;
}


/* animations */
@keyframes revealBlock {
  100% {
    color: white;
  }
}

@keyframes revealingIn {

  0% {
    width: 0;
  }

  100% {
    width: 100%;
  }
}

@keyframes revealingOut {

  0% {
    transform: translateX(0);
  }

  100% {
    transform: translateX(100%);
  }

}

.abs-site-link {
  position: fixed;
  bottom: 20px;
  left: 20px;
  color: hsla(0, 0%, 0%, .6);
  font-size: 16px;
}


.hero{
    width: 100%;
height: 100vh;
background-image: linear-gradient(rgba(12, 3,51, 0.3) , rgba (12, 3,51, 0.3)) ; position: relative;
padding: 0 5%; display: flex;
align-items:center;
justify-content: center;
}

.section .content {
text-align: center;
}
.section .content h1{
font-size: 100px;
color: #111;
font-weight: 3;
}
.back-video {
position: absolute;
right: 0;
bottom: 0; 
z-index: -1;
width: 100%;

}
.section2{
    margin-top: 20px;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}
.hero h1,.link{
    margin-right: 810px;
}
.hero h1{
    font-size: 40px;
    font-weight: 400;
    
}
b{
    color: rgb(148, 114, 60);
}
.link{
    margin-top: 24px;
   
    
}
.link a{
    text-decoration: none;
    background-color: rgb(148, 114, 60);
    color: white;
    padding: 10px;
    border-radius: 6px 6px 6px 6px;
    width: 100px;
    font-size: 10px;
}
.section2{
    margin-top: 20px;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    
}
.card{
    display: flex;
    flex-direction: column;
    text-align: center;
    
    width: 250px;
    height: 400px;
    border-radius: 10px 10px 10px 10px;
    animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
}
.card a,span,p,h5{
    margin-top: 10px;
    font-style: small;
    font-size: 17px;
    color: white;
}
.card a{
    text-decoration: none;
    background-color: #D5AB6C;
    color: white;
    width: 80px;
    padding: 8px;
    margin-left: 80px;
    font-size: 10px;
    margin-top: 20px;

}
.card h5{
       background-color: rgb(148, 114, 60);
       color: grey;
       padding-top: 6px;
       border: 1px solid black;
       width: 25px;
       height: 25px;
       border-radius: 50%;
       margin-left: 108px;
       margin-top: 25px;
       font-size: 10px;
}
.card p{
    font-size: 10px;
}
.section2{
    height: 100%;
    background-position: center;
    padding: 50px;
    
    background-repeat: no-repeat;
    background-color: black;
    
}

.section3{
    margin-top: 20px;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    background-color: black;
    /* background-image: url('https://i.pinimg.com/564x/14/3c/f9/143cf98c145cd25867289e6826386417.jpg');
    background-repeat: no-repeat;
    background-position: center; */
}
.section3 img{
    position: absolute;
    right: 20px;
    animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
   
}

.section3 h1{
    text-align: left;
    font-size: large;
    color: white;
    margin-right: 560px;
    margin-bottom: 100px;
    font-size: 30px;
    animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
   
}
@keyframes mvuph{
  from{
      opacity: 0;
      translate: 0 70px;
  }
  to{
    opacity: 1;
    translate: 0 -40px;
  }
}
.section3 span{
    color: rgb(148, 114, 60);
    animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
}
.section3 a{
    text-decoration: none;
    background-color: rgb(148, 114, 60);
    color: white;
    padding: 10px;
    border-radius: 6px 6px 6px 6px;
    width: 100px;
    font-size: 10px;
    margin-left: 80px;
    animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
}
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
  background-color: black;
  
    
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
  background-color: black;

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
.section5{
    width: 100%;
    height: 100vh;
    background-image: url('img/bkh.jpg');
    background-color: black;
    background-repeat: no-repeat;
    background-position: center;
} 
.section5 .produit{
  display: flex;
    align-items: center;
    justify-content: space-between;
}
.pup{
  color: white;
  display: block;
  margin: 50px;
  animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
}
.pup span{
  color: rgb(148, 114, 60);
  animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
}
.section5 h1{
  text-align: center;
  color: white;
  animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
}
.section5 .produit .pup a{
    text-decoration: none;
    background-color: rgb(148, 114, 60);
    color: white;
    padding: 10px;
    border-radius: 6px 6px 6px 6px;
    width: 100px;
    font-size: 10px;
    margin-left: 80px;
    margin-top: 20px;
    animation: mvuph linear both;
    animation-timeline: view();
    animation-range: entry 50% cover 50%;
}
.container2 {
  display: flex;
  height: 100vh;
  font-family: 'Montserrat', sans-serif;
}

.sectioninside {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  overflow: hidden;
  background-size: cover;
  background-position: center;
  color: #fff;
  transition: flex .4s ease;
  position: relative;
}

.sectioninside .overlay {
  background-color: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
  position: absolute;
  transition: background-color .8s ease;
}

.sectioninside .content {
  z-index: 2;
}

.sectioninside:hover {
  flex: 2;
}

.sectioninside:hover .overlay {
  background-color: rgba(0, 0, 0, 0.95);
}

#marketing {
  background-image: url(img/sp.jpg);
}


#technology {
  background-image: url(img/cl.jpg);
}

#advertising {
  background-image: url(img/chjpg.jpg);
}


    </style>
</head>
<body>
  <div class="anim">
    <div class="sectionvis">
  
      <h1 class="block-effect" style="--td: 1.2s">
        <div class="block-reveal" style="--bc: #4040bf; --d: .1s">Hair</div>
        <div class="block-reveal" style="--bc: #bf4060; --d: .5s">Shop Now</div>
      </h1>
      </div>
    <div class="section1">
    <?php include 'users_header.php'?>
        <div class="hero">

            <video autoplay loop muted plays-inline class="back-video"> <source src="p3.mp4" type="video/mp4">
            </video>
           
            </video>
             <div class="content">
            <h1>Look great with <br>Extensions
          </h1>
          <div class="link">
            <a href="#section4">See More</a> 
          </div>
         
            </div>
            </div>
    </div>
    </div>
    <div class="section6" id="about">
      <div class="container2">
        <div id="marketing" class="sectioninside">
          <div class="content">
            <h1>Shampoos</h1>
          </div>
          <div class="overlay"></div>
        </div>
        <div id="technology" class="sectioninside">
          <div class="content">
            <h1>Hair coloring</h1>
          </div>
          <div class="overlay"></div>
        </div>
        <div id="advertising" class="sectioninside">
          <div class="content">
            <h1>Condotionair</h1>
          </div>
          <div class="overlay"></div>
        </div>
      </div>
        
    </div>
    
    <div class="section3">
        <h1>The Best Product <br>For You!<br><br>
        <span>Healthy hair that looks attractive can<br> make you feel confident and super<br> attractive. Shiny and strong hair makes<br> you the cynosure of all eyes.</span><br><br>  <a href="#section4">Bay Now</a> </h1>
       
        <img src="img/s2.jpg" alt="" ><br>
        
    </div>
    <div class="section5">
      <h1>Most popular</h1>
      <div class="produit">
        <div class="pup">
          <h4> <span>Pack Oriel Paris</span><br><br>
           Gift for you<br>bay this pack by a good price.<br> <br><b>120$</b><br><br>   </h4>
           
            <img src="img/s31.jpg" alt="" height="250" width="180"><br>
            <br><a href="#section4">Bay Now</a> 
        </div>
        <div class="pup">
          <h4> <span>New</span><br><br>
           the most popular Now<br> with a good price <br> Shiny and strong hair makes<br><br> </h4>
           
            <img src="img/s32.jpg" alt="" height="210" width="250"><br>
            <br><br><br><a href="#section4">Bay Now</a> 
            
        </div>
      </div>
      
       
    </div>
    <div class="section4" id="section4">
        <div class="generalprod">
          <?php
        // Execute the query
        try {
          // Execute the query
          $result = $db->query($sql);
      
          // Check if there are any results
          if ($result->rowCount() > 0) {
            // Output HTML for displaying each product
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Start the product container
                echo '<div class="product">';
                echo '<div class="container page-wrapper">';
                echo '<div class="page-inner">';
                echo '<div class="row">';
                echo '<div class="el-wrapper">';
                
                // Output product image and information
                echo '<div class="box-up">';
                $imageSrc = htmlspecialchars($row["img"]);
                echo '<img src="' . $imageSrc . '" alt="' . htmlspecialchars($row["ProductName"]) . '" width="200" name="img">';
                echo '</div>'; // Close the box-up div
                
                // Output product price and buy button
                echo '<div class="box-down">';
                echo '<div class="h-bg">';
                echo '<div class="h-bg-inner" >'. htmlspecialchars($row["Mark"]) . '</div>';
                echo '</div>';
                echo '<a class="cart" href="shop.php?id=' . htmlspecialchars($row["ProductID"]) . '">';
                echo '<span class="price" name="price"><b name="product_name">' . htmlspecialchars($row["ProductName"]) . '</b> <br>' . htmlspecialchars($row["statut"]) . '<br>$' . htmlspecialchars($row["Price"]) . '</span>';
                echo '<span class="add-to-cart">';
                echo '<span class="txt"><input type="submit" class="btn" value="add to cart" name="add-to-cart"></span>';
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
            echo "0 results";
        }
    } catch (PDOException $e) {
        // If an error occurs during query execution, display error message
        echo "Query failed: " . $e->getMessage();
    }
    
    // Close the database connection
    $db = null;
    ?>

            
        </div>
       
    </div>
    <?php include 'footer.php'?>
    
</body>
</html>