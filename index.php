<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}


// (opsional) cek role untuk arahkan berbeda
// if ($_SESSION['role'] == 'admin') {
//   // admin boleh edit konten misalnya
// }
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MBOZOKAMANE</title>
  <title>Kartu Gambar Fullscreen</title>
  <meta name="description" content="Portal berita terkini dan terpercaya" />
  <meta name="author" content="MBOZOKAMANE" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">

  

</head>

<body>
  
  <div id="root">
    <!-- Header -->
    <header class="header">
      <div class="container header-container">
        <div class="logo">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg>
          <h1 class="logo-text">MBOZOKAMANE</h1>
        </div>
        <nav class="main-nav">
          <a href="index.php" class="nav-link">Beranda</a>
          <a href="sejarah.php" class="nav-link">Sejarah</a>
          <a href="pariwisata.php" class="nav-link">Pariwisata</a>
        </nav>

        <div class="header-actions">
          <!-- tombol logout -->
          <a href="logout.php" class="logout-button">Logout</a>
        </div>
        
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
      <section class="hero-section">
        <h2 class="section-title">Selamat Datang Di</h2>
        <h2 class="section-title"> CHATBOT MBOZOKAMANE</h2>    
        <div class="card-grid">
          
          <div class="card">
            <div class="card-image">
              <a href="https://www.detik.com/bali/pilkada/d-7724956/ditetapkan-jadi-bupati-wakil-bupati-bima-ady-irfan-ajak-semua-bersatu" target="_blank">
                <img src="asset/fotobupati.jpg" alt="Petani Bima" class="clickable">
              </a>
              
            </div>
            <div class="card-content">
              <h3 class="card-title">Bupati Bima</h3>
              <p class="card-description">Bupati dan wakil BupatiBima saat ini</p>
            </div>
            
          </div>
         
          <div class="card">
            <div class="card-image">
              <a href="https://www.detik.com/bali/budaya/d-7199502/asal-usul-rimpu-jilbab-lokal-yang-dipakai-perempuan-bima-sejak-abad-ke-17" target="_blank">
                <img src="asset/rimpu1.jpg" alt="Petani Bima" class="clickable">
              </a>
            </div>
            <div class="card-content">
              <h3 class="card-title">Rimpu Bima</h3>
              <p class="card-description">Rimpu: Pakaian adat wanita Bima yang mencerminkan identitas dan nilai-nilai budaya</p>
            </div>
          </div>
        
          <div class="card">
            <div class="card-image">
               <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fangindai.com%2F2024%2F10%2Ftradisi-kalondo-lopi-masyarakat-maritim-desa-sangiang-wera-bima%2F&psig=AOvVaw2L22NlFrCYGU1bNcewhaaC&ust=1745895084877000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCMjDqp7c-YwDFQAAAAAdAAAAABAE" target="_blank">
                <img src="asset/nelayan.jpg" alt="Petani Bima" class="clickable">
              </a>
            </div>
            <div class="card-content">
              <h3 class="card-title">Nelayan Bima</h3>
              <p class="card-description">Kehidupan nelayan di pesisir pantai Sangiang "Bima"</p>
            </div>
          </div>

          
          <div class="card">
            <div class="card-image">
              <a href="https://www.youtube.com/watch?v=uz-p575Y8kQ&pp=ygUybWFzeWFyYWthdCBkZXNhIHNhbmdpYW5nIHdlcmEgcGFuZW4gd2lqZW4gZGkgcHVsYXU%3D">
                <img src="asset/petani1_n.jpg" alt="Petani Bima" class="clickable">
              </a>
            </div>
            <div class="card-content">
              <h3 class="card-title">Petani Bima</h3>
              <p class="card-description">Kegiatan Petani wijen di bawah kaki gunung Sangiang "Bima"</p>
            </div>
          </div>
          
          
          
        </div>
      </section>
    </main>

    <!-- Footer -->
    
    <footer class="footer">
      <div class="container footer-container">
        <p class="copyright">© 2025 MBOZOKAMANE.</p>
        <p class="" >Untuk melanjutkan ke ChatBot silahkan Klik kotak yang berwarna kuning dipojok kanan bawah</p>
      </div>
      

      <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
      
      <df-messenger
      intent="welcome"
      chat-title="MbozoKamane"
        agent-id="1d340160-d68d-473f-9818-48d901f2adee"
        language-code="en"
      ></df-messenger>
    
    </footer>
  </div>
  <!-- Fullscreen Overlay -->
  <div id="overlay" class="overlay">
    <img id="fullscreen" class="fullscreen">
  </div>

  <script src="script.js"></script>

  
</body>
</html>
