<?php
include 'db.php';

if (isset($_GET['id'])) {
    $event_id = intval($_GET['id']);

    $sql = "SELECT id, title, image, caption,  created_at FROM eventmomoshiroi WHERE id = $event_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No event found.";
        exit;
    }
} else {
    echo "No event ID specified.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" caption="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($row['title']); ?></title>
  <link rel="stylesheet" href="style.css">

  <style>
        body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        }

    .containerforbg{
      background-color: var(--secondary-bg-color);
      min-height: 100%;
    }
    .event {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }
    .event img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }
    .event-caption {
        text-align: center;
        color: white;
    }
    .dacaption {
    padding-left: 25px;
    padding-right: 25px;
    margin: 0 auto;
    max-width: 1200px;
    } 
  </style>

</head>
<body>

<script src="main.js"></script>
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="#">MOMOSHIROI</a>
      </div>
      <ul class="nav-links">
        <li><a href="#about" class="nav-link">ABOUT</a></li>
        <li><a href="#events" class="nav-link">EVENTS</a></li>
        <li><a href="#founders" class="nav-link">FOUNDERS</a></li>
        <li><a href="#contact" class="nav-link">CONTACT</a></li>
      </ul>
    </nav>

<div class="containerforbg">


  <main class="dacaption">

          <div class="event-caption">
            <div class="event">
              <h1><?php echo htmlspecialchars($row['title']); ?></h1>
              <p><small>Published on <?php echo htmlspecialchars($row['created_at']); ?></small></p>
              <?php if (!empty($row['image'])): ?>
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
              <?php endif; ?>
              <div class="event-caption">
                <p><?php echo nl2br(htmlspecialchars($row['caption'])); ?></p>
        </div>
    </div>
  </main>

<footer>
    <div class="main-container">
      <p>&copy; 2024 Momoshiroi. All Rights Reserved.</p>
    </div>
  </footer>

<script src="js1.js"></script>
</body>
</html>
