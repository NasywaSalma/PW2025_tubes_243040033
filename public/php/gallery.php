<?php
require 'function.php';
$cars = query("SELECT * FROM cars");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --yellow: #f9d806;
      --light-yellow: #ffee80;
      --black: #130f40;
      --light-color: #666;
      --border: .1rem solid rgba(0,0,0,.1);
      --box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
    }
    body {
      background: linear-gradient(135deg, var(--light-yellow) 0%, #f8fafc 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Arial, sans-serif;
      color: var(--black);
    }
    .navbar {
      box-shadow: var(--box-shadow);
      background: #fff;
    }
    .gallery-container {
      padding: 50px 0 30px 0;
    }
    .card {
      border: var(--border);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: var(--box-shadow);
      transition: transform 0.2s, box-shadow 0.2s;
      background: #fff;
    }
    .card:hover {
      transform: translateY(-8px) scale(1.04);
      box-shadow: 0 1rem 2rem rgba(0,0,0,.13);
    }
    .card-img-top {
      height: 210px;
      object-fit: cover;
      border-bottom: var(--border);
      background: var(--light-yellow);
    }
    .card-title {
      font-weight: 600;
      color: var(--black);
    }
    .card-text {
      color: var(--light-color);
      font-size: 0.97rem;
    }
    .card-footer {
      background: none;
      border: none;
      text-align: right;
    }
    .card-footer .stars {
      font-size: 1.7rem;
      color: var(--yellow);
      text-align: left;
    }
    .btn-view {
       display: inline-block;
    margin-top: 1rem;
    border-radius: .5rem;
    background: var(--light-yellow);
    color: var(--black);
    font-weight: 500;
    font-size: 0.8rem;
    cursor: pointer;
    padding: .8rem 3rem;
    }
    .btn-view:hover {
      background: linear-gradient(90deg, var(--light-yellow) 0%, var(--yellow) 100%);
      color: var(--black);
    }
    .search-bar {
      max-width: 320px;
    }
    .gallery-title {
      font-size: 4.5rem;
      color: var(--black);
      font-weight: 700;
      letter-spacing: 1px;
      margin-bottom: 4rem;
      text-align: center;
      text-shadow: 0 2px 8px var(--light-yellow);
    }

    .gallery-title span {
      position: relative;
    z-index: 0;
    }

    .gallery-title span::before {
      content: '';
      position: absolute;
      bottom: 1rem;
      left: 0;
      height: 100%;
      width: 100%;
      z-index: -1;
      background: var(--yellow);
      clip-path: polygon(0 90%, 100% 80%, 100% 100%, 0% 100%);
    }

    .btnnn {
    display: inline-block;
    margin-top: 1rem;
    border-radius: .5rem;
    background: var(--light-yellow);
    color: var(--black);
    font-weight: 500;
    font-size: 0.8rem;
    cursor: pointer;
    padding: .8rem 3rem;
}

.btnnn:hover {
    background: var(--yellow);
}

    @media (max-width: 576px) {
      .card-img-top {
        height: 140px;
      }
      .gallery-title {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-4">
  <div class="container">
    <a class="btnnn" href="index.php">
      <i class="fa fa-arrow-left"></i> Back
    </a>
    <form class="d-flex ms-auto search-bar" role="search">
      <input class="form-control me-2" type="search" placeholder="Search images..." aria-label="Search"/>
      <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.querySelector('.search-bar input[type="search"]');
  const cards = document.querySelectorAll('.gallery-container .card');

  searchInput.addEventListener('input', function() {
    const query = this.value.toLowerCase();
    cards.forEach(card => {
      const title = card.querySelector('.card-title').textContent.toLowerCase();
      const desc = card.querySelector('.card-text').textContent.toLowerCase();
      if (title.includes(query) || desc.includes(query)) {
        card.parentElement.style.display = '';
      } else {
        card.parentElement.style.display = 'none';
      }
    });
  });

  // Prevent form submit to avoid page reload
  document.querySelector('.search-bar').addEventListener('submit', function(e) {
    e.preventDefault();
  });
});
</script>

<div class="container gallery-container">
  <div class="gallery-title">Explore <span>Cars</span></div>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    <?php foreach ($cars as $mhs): ?>
    <div class="col">
      <div class="card h-100">
        <img src="../../img/<?= htmlspecialchars($mhs['img']); ?>" class="card-img-top" alt="<?= htmlspecialchars($mhs['name']) ?>">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($mhs['name']) ?></h5>
          <p class="card-text">$<?= htmlspecialchars($mhs['price']) ?></p>
        </div>
        <div class="card-footer">
          <div class="stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>
          </div>
          <a href="detail/detail1.php?id=<?= $mhs['id']; ?>" class="btn btn-view" target="_blank">
            <i class="fa fa-eye"></i> Read More 
          </a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
</body>
</html>



