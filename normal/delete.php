<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($database, $query);

    if ($result) {
        // Show JS alert and then redirect
        echo "<script>
            alert('User deleted successfully!');
            window.location.href = 'read.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to delete user.');
            window.location.href = 'read.php';
        </script>";
    }
} else {
    echo "<script>
        alert('No ID specified.');
        window.location.href = 'read.php';
    </script>";
}
?>
