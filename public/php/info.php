<?php
  $scrollId = isset($_GET['id']) ? $_GET['id'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Futuristic Car</title>
  <style>
    :root {
      --yellow: #ffc107;
      --light-yellow: #ffee80;
      --black: #111;
      --white: #fff;
      --gray: #f4f4f4;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--gray);
      color: var(--black);
    }

    section.about {
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      background-color: var(--white);
    }

    .about__container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 3rem;
      width: 100%;
      max-width: 1200px;
      align-items: center;
    }

    .about__group {
      position: relative;
    }

    .about__img {
      width: 100%;
      max-width: 500px;
      border-radius: 1rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      display: block;
    }

    .about__card {
      position: absolute;
      bottom: 1rem;
      right: 1rem;
      background-color: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      padding: 1rem;
      border-radius: 1rem;
      width: 250px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      text-align: center;
    }

    .about__card-title {
      font-size: 2rem;
      font-weight: 700;
      color: var(--black);
      margin-bottom: 0.5rem;
    }

    .about__card-description {
      font-size: 0.9rem;
      color: #333;
    }

    .about__data {
      text-align: justify;
      padding: 1rem;
    }

    .about__tittle {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      line-height: 1.2;
      color: var(--black);
    }

    .about__description {
      font-size: 1rem;
      margin-bottom: 2rem;
      color: #444;
    }

    .button {
      display: inline-block;
      background-color: var(--light-yellow);
      color: var(--black);
      padding: 1rem 2rem;
      border-radius: 0.5rem;
      font-size: 1rem;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .button:hover {
      background-color: var(--yellow);
    }

    @media screen and (max-width: 768px) {
      section.about {
        height: auto;
        padding: 2rem 1rem;
      }

      .about__container {
        grid-template-columns: 1fr;
        gap: 2rem;
      }

      .about__card {
        position: static;
        margin-top: 1rem;
        width: 100%;
      }

      .about__group {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .about__data {
        padding: 0;
      }

      .about__tittle {
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <section class="about section" id="1">
    <div class="about__container">
      <div class="about__group">
        <img src="../../img/1.jpg" alt="Car image" class="about__img">
        <div class="about__card">
          <h3 class="about__card-title">2.500+</h3>
          <p class="about__card-description">
            Unit telah terjual. Jadilah bagian dari masa depan dengan kendaraan berteknologi tinggi kami.
          </p>
        </div>
      </div>

      <div class="about__data">
        <h2 class="section__tittle about__tittle">
          Machine Will <br> Future Technology
        </h2>
        <p class="about__description">
          Mobil futuristik kami dirancang dengan teknologi mutakhir untuk mendukung gaya hidup modern Anda. Dengan perpaduan desain elegan, efisiensi tinggi, dan fitur cerdas seperti AI-integrated dashboard, self-driving mode, dan zero-emission engine, kami menghadirkan pengalaman berkendara yang belum pernah ada sebelumnya. Jadikan masa depan sebagai kenyataan hari ini dengan memiliki kendaraan yang tidak hanya cepat dan nyaman, tetapi juga ramah lingkungan dan siap untuk era baru mobilitas.
        </p>
        <a href="checkout1.php?id=1" class="button">Check Out</a>
        <a href="index.php" class="button">back</a>
      </div>
    </div>
  </section>

  <section class="about section" id="2">
    <div class="about__container">
      <div class="about__group">
        <img src="../../img/2.jpg" alt="Car image" class="about__img">
        <div class="about__card">
          <h3 class="about__card-title">2.500+</h3>
          <p class="about__card-description">
            Unit telah terjual. Jadilah bagian dari masa depan dengan kendaraan berteknologi tinggi kami.
          </p>
        </div>
      </div>

      <div class="about__data">
        <h2 class="section__tittle about__tittle">
          Machine Will <br> Future Technology
        </h2>
        <p class="about__description">
          Mobil futuristik kami dirancang dengan teknologi mutakhir untuk mendukung gaya hidup modern Anda. Dengan perpaduan desain elegan, efisiensi tinggi, dan fitur cerdas seperti AI-integrated dashboard, self-driving mode, dan zero-emission engine, kami menghadirkan pengalaman berkendara yang belum pernah ada sebelumnya. Jadikan masa depan sebagai kenyataan hari ini dengan memiliki kendaraan yang tidak hanya cepat dan nyaman, tetapi juga ramah lingkungan dan siap untuk era baru mobilitas.
        </p>
        <a href="checkout2.php?id=2" class="button">Check Out</a>
        <a href="index.php" class="button">back</a>
      </div>
    </div>
  </section>

  <section class="about section" id="3">
    <div class="about__container">
      <div class="about__group">
        <img src="../../img/3.jpg" alt="Car image" class="about__img">
        <div class="about__card">
          <h3 class="about__card-title">2.500+</h3>
          <p class="about__card-description">
            Unit telah terjual. Jadilah bagian dari masa depan dengan kendaraan berteknologi tinggi kami.
          </p>
        </div>
      </div>

      <div class="about__data">
        <h2 class="section__tittle about__tittle">
          Machine Will <br> Future Technology
        </h2>
        <p class="about__description">
          Mobil futuristik kami dirancang dengan teknologi mutakhir untuk mendukung gaya hidup modern Anda. Dengan perpaduan desain elegan, efisiensi tinggi, dan fitur cerdas seperti AI-integrated dashboard, self-driving mode, dan zero-emission engine, kami menghadirkan pengalaman berkendara yang belum pernah ada sebelumnya. Jadikan masa depan sebagai kenyataan hari ini dengan memiliki kendaraan yang tidak hanya cepat dan nyaman, tetapi juga ramah lingkungan dan siap untuk era baru mobilitas.
        </p>
        <a href="checkout3.php?id=3" class="button">Check Out</a>
        <a href="index.php" class="button">back</a>
      </div>
    </div>
  </section>

  <section class="about section" id="4">
    <div class="about__container">
      <div class="about__group">
        <img src="../../img/4.jpg" alt="Car image" class="about__img">
        <div class="about__card">
          <h3 class="about__card-title">2.500+</h3>
          <p class="about__card-description">
            Unit telah terjual. Jadilah bagian dari masa depan dengan kendaraan berteknologi tinggi kami.
          </p>
        </div>
      </div>

      <div class="about__data">
        <h2 class="section__tittle about__tittle">
          Machine Will <br> Future Technology
        </h2>
        <p class="about__description">
          Mobil futuristik kami dirancang dengan teknologi mutakhir untuk mendukung gaya hidup modern Anda. Dengan perpaduan desain elegan, efisiensi tinggi, dan fitur cerdas seperti AI-integrated dashboard, self-driving mode, dan zero-emission engine, kami menghadirkan pengalaman berkendara yang belum pernah ada sebelumnya. Jadikan masa depan sebagai kenyataan hari ini dengan memiliki kendaraan yang tidak hanya cepat dan nyaman, tetapi juga ramah lingkungan dan siap untuk era baru mobilitas.
        </p>
        <a href="checkout4.php?id=4" class="button">Check Out</a>
        <a href="index.php" class="button">back</a>
      </div>
    </div>
  </section>

  <section class="about section" id="5">
    <div class="about__container">
      <div class="about__group">
        <img src="../../img/5.jpg" alt="Car image" class="about__img">
        <div class="about__card">
          <h3 class="about__card-title">2.500+</h3>
          <p class="about__card-description">
            Unit telah terjual. Jadilah bagian dari masa depan dengan kendaraan berteknologi tinggi kami.
          </p>
        </div>
      </div>

      <div class="about__data">
        <h2 class="section__tittle about__tittle">
          Machine Will <br> Future Technology
        </h2>
        <p class="about__description">
          Mobil futuristik kami dirancang dengan teknologi mutakhir untuk mendukung gaya hidup modern Anda. Dengan perpaduan desain elegan, efisiensi tinggi, dan fitur cerdas seperti AI-integrated dashboard, self-driving mode, dan zero-emission engine, kami menghadirkan pengalaman berkendara yang belum pernah ada sebelumnya. Jadikan masa depan sebagai kenyataan hari ini dengan memiliki kendaraan yang tidak hanya cepat dan nyaman, tetapi juga ramah lingkungan dan siap untuk era baru mobilitas.
        </p>
        <a href="checkout5.php?id=5" class="button">Check Out</a>
        <a href="index.php" class="button">back</a>
      </div>
    </div>
  </section>

  <section class="about section" id="6">
    <div class="about__container">
      <div class="about__group">
        <img src="../../img/6.jpg" alt="Car image" class="about__img">
        <div class="about__card">
          <h3 class="about__card-title">2.500+</h3>
          <p class="about__card-description">
            Unit telah terjual. Jadilah bagian dari masa depan dengan kendaraan berteknologi tinggi kami.
          </p>
        </div>
      </div>

      <div class="about__data">
        <h2 class="section__tittle about__tittle">
          Machine Will <br> Future Technology
        </h2>
        <p class="about__description">
          Mobil futuristik kami dirancang dengan teknologi mutakhir untuk mendukung gaya hidup modern Anda. Dengan perpaduan desain elegan, efisiensi tinggi, dan fitur cerdas seperti AI-integrated dashboard, self-driving mode, dan zero-emission engine, kami menghadirkan pengalaman berkendara yang belum pernah ada sebelumnya. Jadikan masa depan sebagai kenyataan hari ini dengan memiliki kendaraan yang tidak hanya cepat dan nyaman, tetapi juga ramah lingkungan dan siap untuk era baru mobilitas.
        </p>
        <a href="checkout6.php?id=6" class="button">Check Out</a>
        <a href="index.php" class="button">back</a>
      </div>
    </div>
  </section>



  <script>
  
  window.addEventListener('DOMContentLoaded', function() {
    const id = "<?= $scrollId ?>";
    if (id) {
      const section = document.getElementById(id);
      if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
</script>

</body>
</html>


