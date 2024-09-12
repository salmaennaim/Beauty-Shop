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
                p.CategoryID = 1"; 
    
    $prdid = isset($_SESSION['ProductID']) ? $_SESSION['ProductID'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
          *{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;

}



.content h3{
  position:relative;
  left:-500px;
  top:-100px;
  color:black;
  font-weight: 600;
  font-size:40px;
}
.content a{
  position:relative;
  left:-500px;
  top:-100px;
  text-decoration:none;
  background-color:black;
  padding:4px;
  color:white;
  border:1px solid;
  border-radius:5px;
 
}
.Header__shape {
  animation-duration: 4s;
  animation-timing-function: cubic-bezier(.18,1.17,.03,1.46);
  animation-fill-mode: backwards;
  transform-origin: center;
 
  transform-box: fill-box;
}


/* // aaand the rest of the code */

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
.hero{
    width: 100%;
height: 100vh;
background-image: linear-gradient(rgba(12, 3,51, 0.3) , rgba (12, 3,51, 0.3)) ; position: relative;
padding: 0 5%; display: flex;
align-items:center;
justify-content: center;
}
header{
  width:100%;
  height:40px;
  
  font-family: 'Poppins', sans-serif;
  display:flex;
  align-items:center;
  position:relative;
  top:40px;
  left:30px;
}
nav{
  position: fixed;
  z-index: 99;
 
  
  
  
}
nav .wrapper{
  position: relative;
  max-width: 1300px;
  padding: 0px 30px;
  height: 70px;
  line-height: 70px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.wrapper .logo a{
  color: #f2f2f2;
  font-size: 30px;
  font-weight: 600;
  text-decoration: none;
  position:relative;
  left:-450px;
  top:-19px;
}
.wrapper .nav-links{
  display: inline-flex;
}
.nav-links li{
  list-style: none;
}
.nav-links li a{
  color: #f2f2f2;
  text-decoration: none;
  font-size: 18px;
  font-weight: 500;
  padding: 9px 15px;
  border-radius: 5px;
  transition: all 0.3s ease;
  position:relative;
  bottom:50px;
  left:300px;
}
.nav-links li a:hover{
  background: #3A3B3C;
}
.nav-links .mobile-item{
  display: none;
}
.nav-links .drop-menu{
  position: absolute;
  
  width: 180px;
  line-height: 45px;
  top: 85px;
  opacity: 0;
  visibility: hidden;
  box-shadow: 0 6px 10px rgba(0,0,0,0.15);
}
.nav-links li:hover .drop-menu,
.nav-links li:hover .mega-box{
  transition: all 0.3s ease;
  top: 70px;
  opacity: 1;
  visibility: visible;
}
.drop-menu li a{
  width: 100%;
  display: block;
  padding: 0 0 0 15px;
  font-weight: 400;
  border-radius: 0px;
}
.mega-box{
  position: absolute;
  left: 0;
  width: 100%;
  padding: 0 30px;
  top: 85px;
  opacity: 0;
  visibility: hidden;
}
.mega-box .content{
  background: #242526;
  padding: 25px 20px;
  display: flex;
  width: 90%;
  justify-content: space-between;
  box-shadow: 0 6px 10px rgba(0,0,0,0.15);
}
.mega-box .content .row{
  width: calc(10% - 15px);
  line-height: 20px;
  display:flex;
}
.content .row img{
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.content .row header{
  color: #f2f2f2;
  font-size: 20px;
  font-weight: 500;
}
.content .row .mega-links{
  margin-left: -40px;
  border-left: 1px solid rgba(255,255,255,0.09);
}
.row .mega-links li{
  padding: 0 20px;
}
.row .mega-links li a{
  padding: 0px;
  padding: 0 20px;
  color: #d9d9d9;
  font-size: 17px;
  display: block;
}
.row .mega-links li a:hover{
  color: #f2f2f2;
}
.wrapper .btn{
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  display: none;
}
.wrapper .btn.close-btn{
  position: absolute;
  right: 30px;
  top: 10px;
}

@media screen and (max-width: 970px) {
  .wrapper .btn{
    display: block;
  }
  .wrapper .nav-links{
    position: fixed;
    height: 100vh;
    width: 100%;
    max-width: 350px;
    top: 0;
    left: -100%;
    background: #242526;
    display: block;
    padding: 50px 10px;
    line-height: 50px;
    overflow-y: auto;
    box-shadow: 0px 15px 15px rgba(0,0,0,0.18);
    transition: all 0.3s ease;
  }
  /* custom scroll bar */
  ::-webkit-scrollbar {
    width: 10px;
  }
  ::-webkit-scrollbar-track {
    background: #242526;
  }
  ::-webkit-scrollbar-thumb {
    background: #3A3B3C;
  }
  #menu-btn:checked ~ .nav-links{
    left: 0%;
  }
  #menu-btn:checked ~ .btn.menu-btn{
    display: none;
  }
  #close-btn:checked ~ .btn.menu-btn{
    display: block;
  }
  .nav-links li{
    margin: 15px 10px;
  }
  .nav-links li a{
    padding: 0 20px;
    display: block;
    font-size: 20px;
  }
  .nav-links .drop-menu{
    position: static;
    opacity: 1;
    top: 65px;
    visibility: visible;
    padding-left: 20px;
    width: 100%;
    max-height: 0px;
    overflow: hidden;
    box-shadow: none;
    transition: all 0.3s ease;
  }
  #showDrop:checked ~ .drop-menu,
  #showMega:checked ~ .mega-box{
    max-height: 100%;
  }
  .nav-links .desktop-item{
    display: none;
  }
  .nav-links .mobile-item{
    display: block;
    color: #f2f2f2;
    font-size: 20px;
    font-weight: 500;
    padding-left: 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: all 0.3s ease;
  }
  .nav-links .mobile-item:hover{
    background: #3A3B3C;
  }
  .drop-menu li{
    margin: 0;
  }
  .drop-menu li a{
    border-radius: 5px;
    font-size: 18px;
  }
  .mega-box{
    position: static;
    top: 65px;
    opacity: 1;
    visibility: visible;
    padding: 0 20px;
    max-height: 0px;
    overflow: hidden;
    transition: all 0.3s ease;
  }
  .mega-box .content{
    box-shadow: none;
    flex-direction: column;
    padding: 20px 20px 0 20px;
  }
  .mega-box .content .row{
    width: 100%;
    margin-bottom: 15px;
    border-top: 1px solid rgba(255,255,255,0.08);
  }
  .mega-box .content .row:nth-child(1),
  .mega-box .content .row:nth-child(2){
    border-top: 0px;
  }
  .content .row .mega-links{
    border-left: 0px;
    padding-left: 15px;
  }
  .row .mega-links li{
    margin: 0;
  }
  .content .row header{
    font-size: 19px;
  }
}
nav input{
  display: none;
}
.section .content {
text-align: center;
}
.section .content h1{
font-size: 160px;
color: #111;
font-weight: 600;
  animation-name: mv;
            animation-duration: 4s;
            animation-timing-function: linear; 
            animation-fill-mode: forwards;
            animation-delay: 1s;
           
}
.hero h1,.link{
    margin-right: 810px;
}
.hero h1{
    font-size: 40px;
    font-weight: 400;
    
    
}
b{
    color:  rgb(84, 14, 14);
   
}

 @keyframes mv{
            
            50%{
              opacity: 0;
              
            }
           100%{
              font-size: 60px;
              text-align: left;
              translate: -480px 0;
            }
        }
     .section   .content h3{
text-align: center;
animation-name: mvh3;
            animation-duration: 5s;
            animation-timing-function: linear; 
            animation-fill-mode: forwards;
margin-bottom: 30px;
color: #0f0f0f;
font-size: 40px;
font-weight: 600;

}
@keyframes mvh3{
             
            50%{
              opacity: 0;
              
            }
            100%{
              font-weight: 600;
              font-size: 30px;
              text-align: left;
              translate: -490px 0;
            }
        }
.section        .content a{
margin-left: -1040px;
text-decoration: none;
background-color:  rgb(84, 14, 14);
color: white;
border: 1px solid;
padding: 10px;
margin-bottom: 7px;
font-size: 7px;
animation-name: mvp;
            animation-duration: 5s;
            animation-timing-function: linear; 
            animation-fill-mode: forwards;
            animation-delay: 4s;
            opacity: 0;
            overflow:hidden;

}
@keyframes mvp{
             from {
                opacity: 0;
            }
            to {
                opacity: 1;
               
            } 
            
        }
.back-video {
position: absolute;
right: 0;
bottom: 0; 
z-index: -1;
width: 100%;

}
        .menu{
            display: none;
        }
        header{
            position: absolute;
           bottom: 83%;
           left: -5px;
            width: 100%;
            padding: 40px 100px;
            z-index: 10000;
            display: flex;
           align-items: top;
           justify-content: space-evenly;
          
           
           
        }
        header .h3{
            color: black;
        }
        .text{
            z-index: 5;
            color:white;
        }
       
        .video-slide{
           position: relative;
           top: 2px;
            right: 30px;
            bottom: 60px;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
            margin-right: 20px;
            background-size: cover;
        }
        .section2 {
            width: 100%;
            height: 100vh;
            
            margin-top: 10px;
        }
        .section2 .marck{
          display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        .section2 .marck img{
            border-radius: 50%;
        }
        .section2 .box{
                display: flex;
                flex-direction: column;
                text-align: center;
        }
        .section2 h3{
          text-align: center;
          margin-bottom: 50px;
          font-size: 40px;
        }
        .section3{
            width: 100%;
            height: 100vh;
           
            
        }
        .section3 h3{
          text-align: center;
          margin-bottom: 50px;
          font-size: 40px;
        }
        .section3 .boxContainer{
          display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        .section3 .boxContainer .box2{
                width: 300px;
                
                display: flex;
                align-items: center;
                background: rgb(222,208,171);
                background: linear-gradient(10deg, rgb(17, 7, 5) 10%, rgb(247, 27, 3) 90%);
      
        }
        .section3 .boxContainer .box2 h4{
           background-color: white;
        }
        .box span{
            font-size: 50px;
            color:#ded0ab;
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
.section5 {
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  
}

.section5 .back1,
.section5 .back2 {
  flex: 1; 
  height: 100%; 
}

.section5 .back1 {
  background-image: url('img/jcha.jpg');
  background-repeat: no-repeat;
  background-size: cover; 
}

.section5 .back2 {
  background-image: url('img/av.jpg');
  background-repeat: no-repeat;
  background-size: cover; 
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
  background-image: url(img/img2.jpg);
}


#technology {
  background-image: url(https://i.pinimg.com/564x/c9/3b/9e/c93b9efaf30ea90c24fdd2449724e766.jpg);
}

#advertising {
  background-image: url(https://i.pinimg.com/564x/16/80/93/1680932775e72c05961a368cc524183d.jpg);
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

.block-effect {
  font-size: calc(8px + 6vw);
}

.block-reveal {
  --t: calc(var(--td) + var(--d));

  color: transparent ;
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



        
    </style>
</head>
<body>
  <div class="anim">
    <div class="sectionvis">
  
      <h1 class="block-effect" style="--td: 1.2s">
        <div class="block-reveal" style="--bc: #4040bf; --d: .1s">Makeup</div>
        <div class="block-reveal" style="--bc: #bf4060; --d: .5s">Shop Now</div>
      </h1>
      </div>
    
     
      
      <div class="section">
        <?php include 'users_header.php'?>
          <div class="hero">
         

  
              <video autoplay loop muted plays-inline class="back-video"> <source src="bk.mp4" type="video/mp4">
              </video>
              
 <div class="content">
             
              <h3>Be Your Own Kind<br> Of Beautiful</h3>
          <a href="#section4">SHOP NOW</a> </div>
              </div>
        
         
         
      </div>
  </div>
  
    <div class="section2">
      <h3> Best Marck</h3>
      <div class="marck">
        <div class="box"><img src="img/elif.jpg" alt=""width="200" height="200"><h4>Elif</h4></div>
        <div class="box"><img src="img/hb.jpg" alt=""width="200" height="200"><h4>Huda Beauty</h4></div>
        <div class="box"><img src="img/nars.jpg" alt=""width="200" height="200"><h4>Nars</h4></div>
        <div class="box"><img src="img/ch.jpg" alt=""width="200" height="200"> <h4>Chanel</h4></div>
        <div class="box"><img src="img/dr.jpg" alt=""width="200" height="200"><h4>Dior</h4></div>
        <div class="box"><img src="img/kk.jpg" alt=""width="200" height="200"><h4>Kiko</h4></div>
      </div>
       

    </div>
    <div class="section5">
      <div class="back1"></div>
      <div class="back2"></div>
    </div>
    <div class="section3">
      <h3>Chosen For You</h3>
      <div class="boxContainer">
        <div class="box2"><img src="img/fn.jpg" alt=""width="250" height="350"><h4>90% Want by costumers <br><span>NARS</span></h4></div>
        <div class="box2"><img src="img/lp.jpg" alt=""width="250"><h4>25% Discount   <br><span>LIPSTICK</span></h4></div>
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