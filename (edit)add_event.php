<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $caption = $_POST['caption'];


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 5000000) {
        echo "Max 5MB.";
        $uploadOk = 0;
    }


    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Only JPG, JPEG, PNG & GIF files.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "File not uploaded.";
    } else {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";


            $sql = "INSERT INTO eventmomoshiroi (title, caption, image) VALUES ('$title', '$caption', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo " event created";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "error uploading file.";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Article</title>
    <link href="style.css" rel="stylesheet">
    <link href="responsif.css" rel="stylesheet">
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
    <h1 class="eventeditheader">ADD EVENT</h1>
    <form action="(edit)add_event.php" method="post" enctype="multipart/form-data" class="form-center">
    <input type="hidden" name="id">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="caption">caption:</label>
        <textarea id="caption" name="caption" required></textarea>
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
</body>
</html>

