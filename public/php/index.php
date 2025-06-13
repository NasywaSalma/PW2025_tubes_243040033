 <?php
        require 'function.php';
        $cars = query("SELECT * FROM popularvehicles");
    ?>

<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Automotive Style</title> 

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    
    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> <span>auto</span>style</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#vehicles">vehicles</a>
            <a href="#services">services</a>
            <a href="#research">riview</a>
            <a href="#contact">contact</a>
        </nav>

        <a href="../../index.php">
            <div id="login-btn">
                <button class="btn">logout</button>
                <i class="bi bi-people"></i>
            </div>
        </a>
        
    </header>

    <section class="home" id="home">

        <h1 class="home-parallax" data-speed="-2">find your car</h1>
        <img class="home-parallax" data-speed="5" src="../img/cars.jpg" alt="">
        <a href="gallery.php" class="btn home-parallax" data-speed="7"> explore cars</a>

    </section>

    <!--icon section-->

    <section class="icons-container">

        <div class="icons">
            <i class="bi bi-shop-window"></i>
            <div class="content">
                <h3>150+</h3>
                <p>branches</p>
            </div>
        </div>

        <div class="icons">
            <i class="bi bi-bag-check"></i>
            <div class="content">
                <h3>4770+</h3>
                <p>cars sold</p>
            </div>
        </div>

        <div class="icons">
            <i class="bi bi-emoji-laughing"></i>
            <div class="content">
                <h3>590+</h3>
                <p>happy clients</p>
            </div>
        </div>

        <div class="icons">
            <i class="bi bi-plus-circle"></i>
            <div class="content">
                <h3>890+</h3>
                <p>new cars</p>
            </div>
        </div>

    </section>

    <!--icon section end-->

    <!--vehicles section-->

    <section class="vehicles" id="vehicles">
   
    <h1 class="heading"> popular <span>vehicles</span></h1>

    <div class="swiper vehicles-slider">
        <div class="swiper-wrapper">
        
            <?php foreach ($cars as $mhs): ?>
                <div class="swiper-slide box">
                    <img src="../../img/<?= ($mhs['img']); ?>" alt="">
                    <div class="content">
                        <h3><?= ($mhs['name']); ?></h3>
                        <div class="price"><span>price: </span>$<?= ($mhs['price']); ?>/-</div>
                        <p>
                            <span class="fas fa-circle"></span> <?= ($mhs['year']); ?>
                            <span class="fas fa-circle"></span> <?= ($mhs['transmission']); ?>
                            <span class="fas fa-circle"></span> <?= ($mhs['fuel_type']); ?>
                            <span class="fas fa-circle"></span> <?= ($mhs['horsepower']); ?>
                        </p>
                        <a href="detail/detail2.php?id=<?= $mhs['id']; ?>"" class="btn">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
    </section>

    <!--vehicles section end-->

    <!--service section-->

    <section class="services" id="services">

        <h1 class="heading">our <span>services</span></h1>

        <div class="box-container">
            <div class="box">
                <i class="bi bi-bag-check"></i>
                <h3>car selling</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, dolore.</p>
                <a href="readmore.php?id=1" class="btn">read more</a>
            </div>
            <div class="box">
                <i class="bi bi-tools"></i>
                <h3>parts repair</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, dolore.</p>
                <a href="readmore.php?id=2" class="btn">read more</a>
            </div>
            <div class="box">
                <i class="bi bi-battery-full"></i>
                <h3>battery replacement</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, dolore.</p>
                <a href="readmore.php?id=3" class="btn">read more</a>
            </div>
            <div class="box">
                <i class="bi bi-fuel-pump-diesel"></i>
                <h3>oil change</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, dolore.</p>
                <a href="readmore.php?id=4" class="btn">read more</a>
            </div>
            <div class="box">
                <i class="bi bi-people"></i>
                <h3>oil change</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, dolore.</p>
                <a href="readmore.php?id=5" class="btn">read more</a>
            </div>
            <div class="box">
                <i class="bi bi-headset"></i>
                <h3>24/7 support</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, dolore.</p>
                <a href="readmore.php?id=6" class="btn">read more</a>
            </div>
        </div>
        
    </section>

    <!--service section ends-->

    <!--newsletter section-->

    <section class="newsletter" id="research">

        <h3>subscribe for latest updates</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, ut?</p>
        <form action="subscribe.php" method="POST">
            <input type="email" name="email" placeholder="Masukkan email" required>
            <input type="submit" value="Subscribe">
        </form>

    </section>

    <!--newletter section end-->

    <!--contact section-->

    <section class="contact" id="contact">

        <h1 class="heading"><span>contact</span> us </h1>

        <div class="row">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.201034972396!2d107.59067007500697!3d-6.866496667181818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6be3e8a0c49%3A0x730028bf4627def4!2sUniversitas%20Pasundan!5e0!3m2!1sid!2sid!4v1748593676443!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
            <form action="contact.php" method="POST">
                <h3>get in touch</h3>
                <input type="text" name="name" placeholder="name" class="box" required>
                <input type="email" name="email" placeholder="email" class="box" required>
                <input type="text" name="number" placeholder="number" class="box" required>
                <textarea name="message" placeholder="message" class="box" cols="30" rows="10" required></textarea>
                <input type="submit" value="send message" class="btn">
            </form>
        </div>

    </section>

    <!--contact section end-->

    <!--footer-->

    <section class="footer">

        <div class="box-container">
            <div class="box">
                <h3>our branches</h3>
                <a href="#"><i class="bi bi-geo-alt"></i> Bandung </a>
                <a href="#"><i class="bi bi-geo-alt"></i> Jakarta </a>
                <a href="#"><i class="bi bi-geo-alt"></i> Karawang </a>
                <a href="#"><i class="bi bi-geo-alt"></i> Bali </a>
                <a href="#"><i class="bi bi-geo-alt"></i> Solo </a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#home"><i class="bi bi-house-door"></i> home </a>
                <a href="#vehicles"><i class="bi bi-car-front"></i> vehicles </a>
                <a href="#services"><i class="bi bi-gear-wide-connected"></i> services </a>
                <a href="#review"><i class="bi bi-envelope"></i> review </a>
                <a href="#contact"><i class="bi bi-person-rolodex"></i> contact </a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#"><i class="bi bi-telephone"></i> +62 821-9876-0909 </a>
                <a href="#"><i class="bi bi-person-rolodex"></i> salmanasywa96@gmail.com </a>
                <a href="#"><i class="bi bi-geo-alt"></i> setiabudi, bandung - 4001 </a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#"><i class="bi bi-instagram"></i> instagram </a>
                <a href="#"><i class="bi bi-facebook"></i> facebook </a>
                <a href="#"><i class="bi bi-twitter-x"></i> X </a>
            </div>
        </div>

        <div class="credit"> created by cute person | hello there! </div>

    </section>

    <!--footer-->

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!--custom js-->
<script src="../js/script.js"></script>

</body>
</html>



