<?php
include './public/php/function.php';

$conn = koneksi();

if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $query = "INSERT INTO login (
            fullname, username, email, password
        ) VALUES (
            '$fullname', '$username', '$email', '$password'
        )";

        mysqli_query($conn, $query);
        header("Location: login.php");
        exit;
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
            posisition: fixed;
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

         .dang {
            color: rgb(255, 255, 255);
         }

         .dang a {
            color: rgb(255, 255, 255);
            font-weight: bold;
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
            <label for="fullname">Full Name :</label>
             <input type="text" name="fullname" id="fullname">

             <label for="username">Username :</label>
             <input type="text" name="username" id="username">

                <label for="email">Email :</label>
             <input type="text" name="email" id="email">
 
             <label for="password">Password :</label>
             <input type="password" name="password" id="password">
 
             <button type="submit" name="submit">Login</button>
            <div class="dang">already have an account? <a href="login.php">Login</a></div> 
            
         </form>
     </div>
     
 </body>
 
 </html>