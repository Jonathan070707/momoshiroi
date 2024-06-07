<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = intval($_POST['id']);
    $title = $_POST['title'];
    $caption = $_POST['caption'];
    $image = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    if ($image) {
        $stmt = $conn->prepare("UPDATE eventmomoshiroi SET title = ?, caption = ?, image = ? WHERE id = ?");
        $stmt->bind_param('sssi', $title, $caption, $image, $event_id);
    } else {
        $stmt = $conn->prepare("UPDATE eventmomoshiroi SET title = ?, caption = ? WHERE id = ?");
        $stmt->bind_param('ssi', $title, $caption, $event_id);
    }

    if ($stmt->execute()) {
        echo "event updated successfully.";
    } else {
        echo "Error updating event: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index(admin).php");
    exit();
} else {
    echo "Invalid request method.";
}
?>

<script>

    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            const eventId = this.getAttribute('data-event-id');

            fetch('(edit)edit_event.php?id=' + eventId)
            .then(response => response.text())
            .then(html => {

                document.body.innerHTML += html;
            })
            .catch(error => {
                console.error('Error loading edit form:', error);
            });
        });
    });
</script>