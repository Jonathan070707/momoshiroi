<?php
include 'db.php';

$sql = "SELECT id, title, image, caption, created_at FROM eventmomoshiroi ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsif.css">
    <title>events</title>
</head>
<body>

  <header>
      <nav class="navbar">
        <div class="logo">
          <a href="index.php">MOMOSHIROI</a>
        </div>
         <div class="menu-icon" id="menu-icon">
        &#9776; </div>
        <ul class="nav-links" id="nav-links">
          <li><a href="abaout.html" class="nav-link">ABOUT</a></li>
          <li><a href="events.php" class="nav-link">EVENTS</a></li>
          <li><a href="founders.html" class="nav-link">FOUNDERS</a></li>
          <li><a href="#contact" class="nav-link">CONTACT</a></li>
        </ul>
      </nav>
    </header>
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
                              echo '<a target="_blank" href="event.php?id=' . htmlspecialchars($row["id"]) . '">';
                              echo '<h1 class ="caption">' . htmlspecialchars($row["title"]) . '</h1 >';
                              echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["title"]) . '" width="300" height="200">';
                              echo '</div>'; 
                              echo '</a>';
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
        <script src="main.js"></script>
</body>
</html>