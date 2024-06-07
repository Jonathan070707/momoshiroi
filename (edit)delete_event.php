<?php
include 'db.php';

if (isset($_GET['id'])) {
    $event_id = intval($_GET['id']);


    $stmt = $conn->prepare("DELETE FROM eventmomoshiroi WHERE id = ?");
    $stmt->bind_param('i', $event_id);

    if ($stmt->execute()) {
        echo "event deleted.";
    } else {
        echo "Error deleting event: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index(admin).php");
    exit();
} else {
    echo "No event ID.";
}
?>


<button class="delete-button" data-event-id="<?php echo htmlspecialchars($row["id"]); ?>">Delete</button>


<script>

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const eventId = this.getAttribute('data-event-id');
            if (confirm('Delete this event?')) {

                fetch('delete_event.php?id=' + eventId, {
                    method: 'DELETE'
                })
                .then(response => {
                    if (response.ok) {

                        this.closest('.responsive2').remove();
                    } else {

                        console.error('Error deleting event:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error deleting event:', error);
                });
            }
        });
    });
</script>

