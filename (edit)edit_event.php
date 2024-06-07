<?php
include 'db.php';

if (isset($_GET['id'])) {
    $event_id = intval($_GET['id']);
    
    $stmt = $conn->prepare("SELECT title, caption, image  FROM eventmomoshiroi WHERE id = ?");
    $stmt->bind_param('i', $event_id);
    $stmt->execute();
    $stmt->bind_result($title, $caption, $image);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "No event ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit event</title>
    <link href="style.css" rel="stylesheet">
    <link href="responsif.css" rel="stylesheet">
    <link href="(edit)style.css" rel="stylesheet">
    <style>
        body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        }
        .edit_event_bgcolor{
              background-color: var(--secondary-bg-color);
              min-height: 100%;
        }
        .form-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: auto;
            width: 50%;
            background-color: var(--secondary-bg-color);
        }


        .form-group {
            margin-bottom: 15px;
            width: 100%;
            color: black;
        }


        .center-image {
            display: block;
            margin: 0 auto;
        }


        form {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"],
        textarea,
        input[type="file"],
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: darkgreen;
        }
        .eventeditheader{
        color: black;
        text-align: center;
        }
        
    </style>
</head>
<body>

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
    <div class="edit_event_bgcolor">
    <h1 class="eventeditheader">EDIT EVENT</h1>

<form action="(edit)update_event.php" method="post" enctype="multipart/form-data" class="form-center">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($event_id); ?>">
    <div class="form-group">
        <label for="title" div class="textedit">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
    </div>
    <div class="form-group">
        <label for="caption">caption:</label>
        <textarea id="caption" name="caption" required><?php echo htmlspecialchars($caption); ?></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
    </div>
    <div class="form-group">
        <button type="submit">Save</button>
    </div>
</form>
</div>
<script src="main.js"></script>
</body>
</html>

