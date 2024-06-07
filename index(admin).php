<?php
include 'db.php';

$sql = "SELECT id, title, caption, image, created_at FROM eventmomoshiroi ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>MOMOSHIROI PORTFOLIO</title>
  <link href="style.css" rel="stylesheet">
  <link href="responsif.css" rel="stylesheet">
</head>
<body>
  <script src="main.js"></script>
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="#">MOMOSHIROI</a>
      </div>
       <div class="menu-icon" id="menu-icon">
      &#9776; </div>
      <ul class="nav-links" id="nav-links">
        <li><a href="abaout.html" class="nav-link">ABOUT</a></li>
        <li><a href="events.html" class="nav-link">EVENTS</a></li>
        <li><a href="founders.html" class="nav-link">FOUNDERS</a></li>
        <li><a href="#contact" class="nav-link">CONTACT</a></li>
      </ul>
    </nav>
    <!-- hero -->
    <section id="hero">
      <div class="hero-kiri">
        <img src="image/logo.gif" alt="MOMOSHIROI Logo">
      </div>
      <div class="hero-kanan">
        <h3 class="pre-title">Welcome To Our World</h3>
        <h1 class="hero-name">MOMOSHIROI</h1>
        <p class="hero-p">
          <i>
            Momoshiroi terbentuk dari suatu kelompok orang yang mempunyai hobi cosplay jejepangan, di mana mereka merencanakan pembentukan suatu komunitas, dan setelah hasil diskusi dari mereka akhirnya komunitas Momoshiroi terbentuk.
          </i>
        </p>
      </div>
    </section>
    <!-- end hero -->
  </header>

  <!-- About section -->
  <section id="about">
    <div class="main-container">
      <h2 class="section-title">About Us</h2>
      <p class="about-description">
        Momoshiroi is a community formed by a group of people who share a passion for Japanese cosplay. After discussing their ideas, they decided to create a community where like-minded individuals can come together and share their love for cosplay.
      </p>
    </div>
  </section>
  <!-- End About section -->

  <!-- Events section -->
  <section id="events">
    <div class="main-container">

      <h2 class="section-title">Our Events</h2>

      <div class="add-event-button">
            <a href="(edit)add_event.php">
                <h1>Add event</h1>
            </a>
      <div class="grid-4">
      <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="card">'; 
                            echo '<a href="(edit)delete_event.php?id=' . htmlspecialchars($row["id"]) . '" onclick="return confirm(\'Are you sure you want to delete this event?\')">Delete</a>';
                            echo " - ";
                            echo '<a href="(edit)edit_event.php?id=' . htmlspecialchars($row["id"]) . '">Edit</a>';
                            echo '<a target="_blank" href="event.php?id=' . htmlspecialchars($row["id"]) . '">';
                            echo '<h1 class ="caption">' . htmlspecialchars($row["title"]) . '</h1 >';
                            echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["title"]) . '" width="300" height="200">';
                            echo '</a>';                            
                            echo '</div>'; 
                        }
                    } else {
                        echo "<p>No events found</p>";
                    }
                    $conn->close();
      ?>

      </div>
    </div>
    <button herf="#" class="load-more-button">Load More Our Events</button>
  </section>
  <!-- End Events section -->

  <!-- Founders section -->
  <section id="founders">
    <div class="main-container">
      <h2 class="section-title">Our Founders</h2>
      <div class="founder-container">
        <div class="founder-kiri">
          <div class="kiri">
            <img src="image/Desain tanpa judul (3).png" alt="profil">
            <h2 class="founder-name">UZUMAKI NARUTO SUPRI</h2>
          </div>
          <div class="kiri">
            <img src="image/Desain tanpa judul (4).png" alt="profil">
            <h2 class="founder-name">UZUMAKI NARUTO DONI</h2>
          </div>
          <div class="kiri">
            <img src="image/Desain tanpa judul (5).png" alt="profil">
            <h2 class="founder-name">UZUMAKI NARUTO AGUS</h2>
          </div>
          <div class="kiri">
            <img src="image/Desain tanpa judul (6).png" alt="profil">
            <h2 class="founder-name">UZUMAKI NARUTO SUPAT</h2>
          </div>
        </div>
        <div class="founder-kanan">
          <div class="slider-container">
            <button class="prev-button" onclick="slideLeft()">&#10094;</button>
            <div class="image-slider">
              <img src="image/pengurus1.jpg" alt="Image 1" class="slider-image">
              <img src="image/pengurus2.jpg" alt="Image 2" class="slider-image">
              <img src="image/pengurus3.jpg" alt="Image 3" class="slider-image">
            </div>
            <button class="next-button" onclick="slideRight()">&#10095;</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Founders section -->

  <!-- Contact Us section -->
  <section id="contact">
    <div class="main-container">
      <div class="contact-content">
        <h2 class="section-title">Contact Us</h2>
        <p>If you have any questions or would like to get in touch, please fill out the form below:</p>
        <form class="contact-form">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
          </div>
          <button type="submit" class="submit-button">Send Message</button>
        </form>
      </div>
    </div>
  </section>
  <!-- End Contact Us section -->

  <!-- Footer -->
  <footer>
    <div class="main-container">
      <p>&copy; 2024 Momoshiroi. All Rights Reserved.</p>
    </div>
  </footer>
  <!-- End Footer -->
</body>
</html>
