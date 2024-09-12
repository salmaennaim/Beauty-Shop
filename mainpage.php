<?php
include "connection.php";
session_start();

// Fetch user details from session variables
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Fetch user data
$stmt = $db->prepare("SELECT * FROM client WHERE USERNAME != 'Admin'");
$stmt->execute();
$data = $stmt->fetchAll();

$stmt2 = $db->prepare("SELECT * FROM client WHERE username = :username");
$stmt2->execute(['username' => $username]);
$row = $stmt2->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   
    <style>
        :root {
    --black: rgb(0 0 0);
    --white: rgb(255 255 255);
    --yellow: rgb(255 213 28);
    --light-yellow: rgb(255 209 98 / 60%);
    --gray: rgb(167 167 167 / 30%);
    --logo-dimensions: 18rem;
    --icon-dimensions: 3rem;
    --full-w: 100%;
    --full-h: 100%;
    --default-font: -apple-system, BlinkMacSystemFont, Roboto, helvetica neue,
      sans-serif;
    --marvin: "Marvin Visions Variable";
    --h1-clamp: clamp(10.5rem, 15vw, 30rem);
    --default-font-size: 1.8rem;
    --default-heading-size: 4.5rem;
    --duration: 0.5s;
    --short-duration: 350ms;
    --gap: 0.4rem;
    --default-padding: 1.2rem;
    --z-20: 20;
    --z-30: 30;
  }
  
  @font-face {
    font-family: "Marvin Visions Variable";
    src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/756881/MarvinVisionsTrial-Variable.ttf");
  }
  
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  /* ::selection {
    -webkit-background-clip: text;
    -webkit-box-direction: clone;
    -webkit-text-fill-color: var(--yellow);
    background-color: var(--gray);
    color: var(--yellow);
  }
   */
  html {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background-color: var(--black);
    font-family: var(--marvin), var(--default-font);
    font-size: 62.5%;
    text-transform: uppercase;
    text-rendering: optimizelegibility;
  }
  
   body {
    display: grid;
    grid-template-rows: 5rem calc(100vh - 5rem);
    min-height: 100vh;
    min-height: -webkit-fill-available;
   }
  header{
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-bottom: 15px;


  }
  nav{
    display: flex;
    justify-content: space-between;
    align-items: center;
    
   
  }
  .section1{
    width: 100%;
    height: 100vh;
  }
 .h1{
    color:red;
    font-size: 100px;
  }

  nav ul li{
    display: inline-block;
    list-style: none;
  }
  nav ul li a{
    text-decoration: none;
    display: block;
    margin-left: 200px;
  }
  header a{
    text-decoration: none;
    margin-left: 150px;
    color: var(--white);
  }
   
  img {
    display: block;
    max-width: var(--full-w);
    object-fit: cover;
    width: var(--full-w);
  }
  a {
    color: var(--white);
    cursor: pointer;
    font-size: var(--default-font-size);
    text-decoration: none;
    touch-action: manipulation;
  }
   a:hover {
  color: var(--yellow); 
  transition: color var(--short-duration) ease-in;

    
  }
  header a:hover,:focus {
    border-color: var(--yellow);

    box-shadow: 0 0.5rem 0.5rem -0.4rem var(--yellow);
    transform: translateY(-0.25rem);
  }
  @media (max-width:699px){
    section {
      display: flex;
      flex-flow: column wrap;
      grid-row: 2;
      overflow: hidden;
      height: 100vh;
      margin-top: 60px;
      
    }
    article {
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: var(--full-h);
      position: relative;
      width: var(--full-w);
      height: 100vh;
      margin-top: 20px;
      > * {
        grid-column: 1;
        grid-row: 1;
      }
  }
  .panels {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(18.5rem, 1fr));
    z-index: var(--z-20);
  }
  .span{
    margin-top: 10px;
  }
  }
     


.panel {
  animation: scale-in-ver-center var(--duration)
    cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
    rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
  opacity: 0;
  position: relative;
}
@keyframes scale-in-ver-center {
  0% {
    transform: scaleY(0);
    opacity: 1;
  }

  100% {
    transform: scaleY(1);
    opacity: 1;
  }
}
 article{
  display: flex;
  justify-content: space-between;
  align-items: center;
 }

  img {
    filter: brightness(0.33);
    height: 100vh;
  }
  img:hover{
    filter: brightness(1);
    height: 100vh;
  }
  span {
    font-size: var(--default-heading-size);
    left: 0;
    
    margin: 0 auto;
    text-align: center;
    right: 0;
    top: 0;
    margin-top: 1px;
    height: fit-content;
    opacity: 0;
    padding: var(--default-padding) var(--gap);
    position: absolute;
    width: var(--full-w);
    z-index: var(--z-30);
   
  }
  &::before {
    
    content: "";
    display: block;
    background-color: var(--gray);
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform: scaleY(0);
    transform-origin: bottom left;
    transition: transform var(--short-duration) ease-in-out;
    z-index: -1;
    height: 0%;
    
  }
  span:hover{
    height: 100%;
  }
  
  @keyframes slide-in-top {
    0% {
      transform: translateY(-100rem);
      opacity: 0;
    }
  
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }
  .o1 span{
      animation: slide-in-top 0.5s
        cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }
  

    .o2 span{
      animation: slide-in-top 0.5s
        cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }
  

    .o3 span{
      animation: slide-in-top 0.5s
        cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }
  
    .o4 span{
      animation: slide-in-top 0.5s
        cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }
  
  .o1 img {
    animation: scale-in-ver-center var(--duration)
        cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards,
      slit-out-vertical 1s ease-in forwards;
    animation-delay: 2s, 4.5s;
    opacity: 0;
    height: var(--full-h);
    transform: scale(1.75);
  }
  .o2 img {
    animation: scale-in-ver-center var(--duration)
        cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards,
      slit-out-vertical 1s ease-in forwards;
    animation-delay: 2.1s, 4.5s;
    opacity: 0;
    height: var(--full-h);
    transform: scale(1.75);
  }
  .o3 img {
    animation: scale-in-ver-center var(--duration)
        cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards,
      slit-out-vertical 1s ease-in forwards;
    animation-delay: 2.2s, 4.5s;
    opacity: 0;
    height: var(--full-h);
    transform: scale(1.75);
  }
  .o4 img {
    animation: scale-in-ver-center var(--duration)
        cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards,
      slit-out-vertical 1s ease-in forwards;
    animation-delay:  2.3s, 4.5s;
    opacity: 0;
    height: var(--full-h);
    transform: scale(1.75);
  }
  img:hover span{
    box-shadow: rgba(255, 209, 98, 0.25) 0px 30px 60px -12px inset,
      rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
  }
    

      span::before {
        transform: scaleX(1);
        transform-origin: bottom center;
        width: auto;
      }
      
      ul {
        display: flex;
        flex-flow: row nowrap;
        
      }
        &:nth-of-type(2) {
          align-items: center;
          gap: var(--default-padding);
          justify-content: center;
          width: var(--full-w);
        }
          
    
            &:first-of-type,
            &:last-of-type {
              margin-left: auto;
             
            }
            header img{
              margin-top: 10px;
              margin-right: 90px;
              width:100px;
              height:50px;
              border-radius: 10px;
            }
            header img{
              filter: brightness(1);
            }
            
       button{
        background-color:black;
        color:white;
        border: none;
        padding: 7px;
        font-weight: 600;
       }
       i{
       color:white;
       }
    </style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li>
                <a href="#" class="link"> <p>Hello <b><?php echo htmlspecialchars($username); ?></b>, Welcome</p> </a>
            </li>
            <li>
            <a href="profile.php?username=<?php echo $row['username']; ?>"  class="link"> <p><i class="fa-solid fa-user"></i></p> </a>
            </li>
            
            <li>
                <a href="#" class="link">
                    <form action="Log_out.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $row['idclient']; ?>">
                        <button type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </a>
            </li>
        </ul>
    </nav>
</header>
<section>
    <article>
        <ul class="panels">
            <li class="panel o1"><a href="mk.php"><span>Makeup</span>
                    <img src="img/mk1.jpg" alt="LOGO"/></a>
            </li>
            <li class="panel o2"><a href="hair.php"><span>Hair</span>
                    <img src="img/hr1.jpg" alt="LOGO"/>
                </a></li>
            <li class="panel o3"><a href="nls.php"><span>Nails</span>
                    <img src="img/nls1.jpg" alt="LOGO"/>
                </a></li>
            <li class="panel o4"><a href="parfum.php"><span>Parfum</span>
                    <img src="img/pr1.jpg"
                         alt="image of hot air balloons" width="150"/></a></li>
        </ul>
    </article>
</section>
</body>
</html>
