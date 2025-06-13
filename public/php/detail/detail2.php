<?php
include '../function.php'; // pastikan path sesuai
$conn = koneksi();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$query = "SELECT * FROM popularvehicles WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $query);


$row = mysqli_fetch_assoc($result);
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
      --dark-gray: #232323;
      --accent: #222831;
      --accent2: #393e46;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, var(--gray) 0%, var(--dark-gray) 100%);
      color: var(--black);
      min-height: 100vh;
    }

    section.about {
      width: 100vw;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      background: linear-gradient(120deg, var(--white) 60%, var(--light-yellow) 100%);
      box-shadow: 0 0 40px rgba(0,0,0,0.08);
    }

    .about__container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 3rem;
      width: 100%;
      max-width: 1200px;
      align-items: center;
      background: var(--white);
      border-radius: 1.5rem;
      box-shadow: 0 8px 32px rgba(34, 40, 49, 0.15);
      overflow: hidden;
    }

    .about__container h2 {
      text-align: center;
      padding-bottom: 2rem;
      color: var(--black);
    }

    .about__container span {
      position: relative;
      z-index: 0;
    }

    .about__container span::before {
    content: '';
    position: absolute;
    bottom: 0.5rem;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: -1;
    background: var(--yellow);
    clip-path: polygon(0 90%, 100% 80%, 100% 100%, 0% 100%);
    }

    .about__group {
      position: relative;
      background: var(--accent);
      border-radius: 1.5rem 0 0 1.5rem;
      padding: 2rem 1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 400px;
    }

    .about__img {
      width: 100%;
      max-width: 420px;
      border-radius: 1rem;
      box-shadow: 0 8px 24px rgba(0,0,0,0.25);
      display: block;
      border: 4px solid var(--accent2);
      background: var(--gray);
      margin-bottom: 1.5rem;
      transition: transform 0.3s;
    }
    .about__img:hover {
      transform: scale(1.04) rotate(-2deg);
      box-shadow: 0 12px 32px rgba(0,0,0,0.30);
    }

    .about__card {
      position: absolute;
      bottom: 1.5rem;
      right: 1.5rem;
      background: linear-gradient(120deg, var(--yellow) 60%, var(--light-yellow) 100%);
      color: var(--black);
      backdrop-filter: blur(10px);
      padding: 1.2rem 1rem;
      border-radius: 1rem;
      width: 240px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.18);
      text-align: center;
      border: 2px solid var(--accent2);
      font-weight: 500;
    }

    .about__card-title {
      font-size: 2rem;
      font-weight: 700;
      color: var(--accent2);
      margin-bottom: 0.5rem;
      letter-spacing: 1px;
    }

    .about__card-description {
      font-size: 1rem;
      color: var(--accent);
    }

    .about__data {
      text-align: justify;
      padding: 2rem 2rem 2rem 0;
      background: var(--white);
      border-radius: 0 1.5rem 1.5rem 0;
      min-height: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .about__tittle {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      line-height: 1.2;
      color: var(--accent2);
      font-weight: 800;
      letter-spacing: 1px;
      text-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .about__description {
      font-size: 1.1rem;
      margin-bottom: 2rem;
      color: #444;
      line-height: 1.7;
    }

    .button {
      display: inline-block;
      background: linear-gradient(90deg, var(--light-yellow) 60%, var(--yellow) 100%);
      color: var(--dark-gray);
      padding: 1rem 2rem;
      border-radius: 0.5rem;
      font-size: 1rem;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
      margin-right: 1rem;
      margin-bottom: 1rem;
      border: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.10);
      letter-spacing: 1px;
    }

    .button:hover {
      background: linear-gradient(90deg, var(--yellow) 60%, var(--light-yellow) 100%);
      color: var(--accent2);
      box-shadow: 0 4px 16px rgba(0,0,0,0.18);
      transform: translateY(-2px) scale(1.03);
    }

    @media screen and (max-width: 900px) {
      .about__container {
        grid-template-columns: 1fr;
        border-radius: 1.5rem;
      }
      .about__group, .about__data {
        border-radius: 1.5rem;
        min-height: unset;
        padding: 2rem 1rem;
      }
      .about__data {
        padding: 2rem 1rem 2rem 1rem;
      }
    }

    @media screen and (max-width: 600px) {
      section.about {
        padding: 1rem 0.2rem;
      }
      .about__container {
        gap: 1.2rem;
      }
      .about__img {
        max-width: 100%;
      }
      .about__card {
        position: static;
        margin-top: 1rem;
        width: 100%;
      }
      .about__tittle {
        font-size: 2rem;
        text-align: center;
      }
      .about__data {
        padding: 1rem 0.5rem;
      }
    }
  </style>
</head>
<body>

  <section class="about section" id="1">
    <div class="about__container">
      <div class="about__group">
       
<?php $data = [$row]; 
  foreach ($data as $mhs):
  ?>
        <img src="../../../img/<?= ($mhs['img']);?>" alt="Car image" class="about__img">
        <div class="about__card">
          <h3 class="about__card-title"><?= ($mhs['sold']);?></h3>
          <p class="about__card-description">
            The unit has been sold. Be part of the future with our high-tech vehicles.
          </p>
        </div>
      </div>

      <div class="about__data">
        <h2 class="section__tittle about__tittle">
          <br> <span><?= ($mhs['name']);?></span>
        </h2>
         <p class="about__description">
            <?= ($mhs['info']);?>
        </p>
        <?php endforeach; ?>
        <a href="../checkout/checkout2.php?id=<?= $mhs['id']; ?>" class="button">Check Out</a>
        <a href="../index.php" class="button">back</a>
        
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


