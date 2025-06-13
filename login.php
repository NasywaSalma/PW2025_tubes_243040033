<?php
session_start();
require 'public/koneksi.php'; 

if (isset($_POST['login'])) {

    // Jika login sebagai admin
    if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
        $_SESSION['login'] = true;
        $_SESSION['username'] = "admin";
        header("Location: admin/php/index.php");
        exit;
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];

            header("Location: ./public/php/index.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Nama tidak ditemukan!";
    }
}
?>


 
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <title>Login</title>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
     <style>
         * {
             box-sizing: border-box;
             font-family: 'Poppins', sans-serif;
         }
 
         body {
             display: flex;
             justify-content: center;
             align-items: center;
             height: 100vh;
             margin: 0;
         }

         .videobg video{
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover; 
            position: fixed;
            overflow: hidden;
            z-index: -1;
         }
 
         .login-container {
             background-color: rgba(255, 255, 255, 0.2);
             backdrop-filter: blur(0.7);
             padding: 50px;
             border-radius: 15px;
             box-shadow: 0 10px 25px rgb(244, 238, 240);
             width: 350px;
             text-align: center;
             position: absolute;
             z-index: 1;
         }
 
         img{
             width: 10rem;
             color: rgb(180, 103, 129);
         }

        h1 {
            font-size:20px;
            color: rgb(255, 255, 255);
        }
        
         form {
             text-align: left;
         }
 
         label {
             display: block;
             margin: 10px 0 5px;
             color: rgb(255, 255, 255);
         }
 
         input[type="text"],
         input[type="password"] {
             width: 100%;
             padding: 10px;
             border: 1px solid #ccc;
             border-radius: 8px;
         }
 
         button {
             width: 100%;
             padding: 10px;
             background-color: rgb(24, 5, 5);
             color: white;
             border: none;
             border-radius: 8px;
             margin-top: 15px;
             font-weight: bold;
             cursor: pointer;
         }
 
         button:hover {
             background-color: rgb(245, 243, 243);
             color: black;
         }
 
         .error {
             color: red;
             font-style: italic;
             margin-bottom: 10px;
         }
     </style>
 </head>
 
 <body>
    
    <div class="videobg">
         <video autoplay muted loop>
            <source src="img/video/backgroundvid.mp4">
         </video>
    </div>

    <div class="login-container">
        <h1>HI, Enter Username Here</h1>
        <img src="img/autologo.jpg" alt="">
 
        <?php if (isset($error)) : ?>
            <p class="error">username / password salah!</p>
        <?php endif; ?>
            
        <form action="" method="post">
    <label for="username">Username :</label>
    
    <input type="text" name="username" id="username" required>

    <label for="password">Password :</label>
    <input type="password" name="password" id="password" required>

    <button type="submit" name="login">Login</button>

</form>

     </div>
     
 </body>
 
 </html>