<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .footer {
  margin-top: 250px;
  background-color: rgb(43, 43, 43);
  color: #fff;
  padding: 40px 20px;
 
}

.footer-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.footer-column {
  flex: 1;
  margin-right: 20px;
}

.footer-column:last-child {
  margin-right: 0;
}

.footer-column h3 {
  margin-bottom: 15px;
}

.social-icons a {
  color: #fff;
  text-decoration: none;
  margin-right: 10px;
}

.footer-bottom {
  margin-top: 10px;
  text-align: center;
}
.form {
            max-width: 400px;
            width: 100%;
            padding: 0 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .field {
            width: 100%;
            margin: 16px 0;
        }

        label {
            color: #555;
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: none;
            background: rgba(255, 255, 255, .5);
            transition: background 0.3s;
        }

        input:focus, textarea:focus {
            background: rgba(255, 255, 255, 1);
            outline: none;
        }

        button {
            background: #2f4ad0;
            color: #fff;
            border: none;
            padding: 8px 16px;
            margin: 16px 0 50px 0;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        button:hover {
            background: #1d2f89;
        }

        .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .social-media span {
            font-size: 14px;
        }

        .social-media span .fas {
            margin-left: 10px;
        }

        .social-media a {
            font-size: 20px;
            color: #000;
            margin: 0 5px;
            transition: color 0.3s;
        }

        .social-media a:hover {
            color: #1d2f89;
        }

        @media (max-width: 425px) {
            .container {
                width: 100%;
            }
        }
        .product {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-flow:row wrap;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.page-inner {
    display: flex;
    justify-content: center;
    align-items: center;
}

.row {
    display: flex;
    justify-content: center;
    align-items: center;
}

.el-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
       flex-direction: column;
}

    </style>
</head>
<body>
<footer class="footer" id="contact">
      <div class="footer-content">
        <div class="footer-column">
          <div class="form">
          <form>
            <div class="field" tabindex="1">
                <label for="username">
                    <i class="far fa-user"></i>Your Name
                </label>
                <input name="username" type="text" placeholder="e.g. John Doe" required>
            </div>
            <div class="field" tabindex="2">
                <label for="email">
                    <i class="far fa-envelope"></i>Your Email
                </label>
                <input name="email" type="email" placeholder="email@domain.com" required>
            </div>
            <div class="field" tabindex="3">
                <label for="message">
                    <i class="far fa-edit"></i>Your Message
                </label>
                <textarea name="message" placeholder="Type your message here" required></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
          </div>
       
        </div>
        <div class="footer-column">
          <h3>Contact Us</h3>
          <label for="email">
                    <i class="far fa-envelope"></i>Email: elegence@gmail.com
                </label>
          <label for="phone">
          <i class="far fa-phone"></i> Phone: 0567123456
                </label>

         
        </div>
        <div class="footer-column">
          <h3>Follow Us</h3>
          <div class="social-media">
            <span>Get In Touch <i class="fas fa-long-arrow-alt-right"></i></span>
            <a class="fab fa-facebook-f" href="https://facebook.com/yourpage" target="_blank"></a>
            <a class="fab fa-twitter" href="https://twitter.com/youraccount" target="_blank"></a>
            <a class="fab fa-instagram" href="https://www.instagram.com/youraccount" target="_blank"></a>
          
        </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 Elegence. Always be Shiny.</p>
      </div>
    </footer>
</body>
</html>