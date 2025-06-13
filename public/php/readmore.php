<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>readmore</title>
  <style>
    :root {
      --primary: #22223b;
      --accent: #f9d806;
      --accent-light: #ffee80;
      --bg: #f8f8f8;
      --text: #22223b;
      --muted: #666;
      --radius: 16px;
      --shadow: 0 6px 24px rgba(34,34,59,0.08);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
      outline: none;
      border: none;
      text-decoration: none;
      text-transform: none;
      transition: all .2s cubic-bezier(.4,0,.2,1);
    }

    body {
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .car-container {
      display: flex;
      align-items: stretch;
      justify-content: center;
      gap: 48px;
      background: #fff;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 48px 40px;
      max-width: 900px;
      width: 100%;
      margin: 32px;
    }

    #car-img {
      width: 340px;
      max-width: 40vw;
      min-width: 180px;
      border-radius: var(--radius);
      box-shadow: 0 4px 24px rgba(34,34,59,0.10);
      object-fit: cover;
      background: #eee;
      aspect-ratio: 4/3;
      align-self: center;
    }

    .car-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 18px;
      min-width: 220px;
    }

    #car-title {
      color: var(--accent);
      font-size: 2.1rem;
      font-weight: 700;
      margin-bottom: 10px;
      letter-spacing: 1px;
      line-height: 1.2;
      text-shadow: 0 2px 8px rgba(249,216,6,0.08);
    }

    #car-desc {
      font-size: 1.08rem;
      line-height: 1.7;
      color: var(--muted);
      text-align: justify;
      margin-bottom: 18px;
    }

    .back-link {
      display: inline-block;
      margin-top: 1.2rem;
      border-radius: .5rem;
      background: var(--accent-light);
      color: var(--primary);
      font-weight: 500;
      font-size: 1rem;
      cursor: pointer;
      padding: .5rem 1.4rem;
      box-shadow: 0 2px 8px rgba(249,216,6,0.08);
      border: 1px solid var(--accent);
      transition: background .2s, color .2s, box-shadow .2s;
    }

    .back-link:hover {
      background: var(--accent);
      color: #fff;
      box-shadow: 0 4px 16px rgba(249,216,6,0.18);
      border-color: var(--accent);
      text-decoration: none;
    }

    @media (max-width: 900px) {
      .car-container {
        flex-direction: column;
        align-items: center;
        padding: 32px 16px;
        gap: 32px;
        max-width: 98vw;
      }
      #car-img {
        width: 90vw;
        max-width: 420px;
      }
      .car-info {
        width: 100%;
        min-width: unset;
      }
    }

    @media (max-width: 600px) {
      .car-container {
        padding: 16px 4vw;
        gap: 18px;
        border-radius: 10px;
      }
      #car-img {
        width: 100%;
        max-width: 100vw;
        min-width: 0;
        border-radius: 10px;
      }
      #car-title {
        font-size: 1.3rem;
      }
      #car-desc {
        font-size: .98rem;
      }
    }
  </style>
</head>
<body>

  <div class="car-container" id="content">
    <img id="car-img" src="" alt="Car Image">
    <div class="car-info">
      <h1 id="car-title"></h1>
      <p id="car-desc"></p>
      <a href="index.php" class="back-link">← Back to Gallery</a>
    </div>
  </div>

  <script>
    const cars = {
      1: {
        img: "../../img/model.jpg",
        title: "Our Car Model",
        desc: "Discover our cutting-edge car models that blend sleek sportiness with bold futuristic design. Engineered for performance and innovation, each vehicle features aerodynamic contours, advanced hybrid or electric powertrains, and intelligent technology that redefines driving. From the aggressive stance of our sport line to the smooth, minimalistic aesthetics of our futuristic range, our cars are built to excite and inspire. Inside, you'll find immersive digital cockpits, AI-enhanced controls, and sustainable luxury materials. Whether you're chasing adrenaline or embracing the future of mobility, our models deliver unmatched style, speed, and sophistication—crafted for those who demand more from every journey."
      },
      2: {
        img: "../../img/repair.jpg",
        title: "Our Parts Repair",
        desc: "Our sport car repair service is designed to keep your high-performance vehicle running at its peak. With expert technicians trained specifically in sport car engineering, we offer precise diagnostics, premium parts, and cutting-edge tools to ensure every repair meets the highest standards. Whether it’s engine tuning, suspension upgrades, or brake system repairs, we handle every detail with care and precision. We understand the unique needs of sport cars and provide fast, reliable service to get you back on the road quickly. Trust us to maintain the power, agility, and performance your sport car was built for—because every detail matters."
      },
      3: {
        img: "../../img/battery.jpg",
        title: "Battery Replacement",
        desc: "Our battery replacement service ensures your vehicle stays powered and reliable, no matter the road ahead. We offer high-quality batteries compatible with all major car models, including hybrids and electric vehicles. Our skilled technicians perform quick, efficient replacements using the latest diagnostic tools to check charging systems and prevent future issues. Whether your battery is drained, aged, or malfunctioning, we provide a seamless solution backed by warranty and expert care. With safety and performance as our top priorities, you can count on us for dependable service that gets you back behind the wheel with confidence. Power up with peace of mind."
      },
      4: {
        img: "../../img/oil.jpg",
        title: "Oil Change",
        desc: "Our oil change service is fast, professional, and essential for maintaining your engine's health and performance. We use only high-quality synthetic or conventional oils tailored to your vehicle’s needs, ensuring optimal lubrication and protection. Our trained technicians will also replace your oil filter, check fluid levels, and inspect key components for wear or leaks. Regular oil changes help extend engine life, improve fuel efficiency, and keep your car running smoothly. With efficient service and attention to detail, we make sure your vehicle is road-ready in no time. Trust us to keep your engine clean, cool, and running at its best."
      },
      5: {
        img: "../../img/5.jpg",
        title: "Battery Replacement",
        desc: "Supercar Jepang dengan akselerasi gila dan desain ikonik."
      },
      6: {
        img: "../../img/support.jpg",
        title: "Our 24/7 Service",
        desc: "Our 24/7 services are here to support you anytime, anywhere. Whether it's a late-night breakdown, emergency repair, or urgent maintenance, our expert team is always on standby to assist. We offer round-the-clock roadside assistance, towing, battery replacement, tire changes, and more—all delivered with speed and professionalism. No matter the hour, your safety and convenience are our top priorities. With our fully equipped mobile units and skilled technicians, help is just a call away. Count on us for dependable, 24/7 service that keeps you moving, no matter the time or situation. We're here whenever you need us—day or night."
      }
    };

    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');

    if (cars[id]) {
      document.getElementById('car-img').src = cars[id].img;
      document.getElementById('car-title').innerText = cars[id].title;
      document.getElementById('car-desc').innerText = cars[id].desc;
    } else {
      document.getElementById('content').innerHTML = `
        <div style="text-align:center; width:100%">
          <h1>Mobil tidak ditemukan.</h1>
          <a href='index.php' class='back-link'>← Kembali</a>
        </div>`;
    }
  </script>

</body>
</html>