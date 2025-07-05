<?php
include 'db.php';

// //
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($database, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        die("User not found.");
    }
} else {
    die("No user ID specified.");
}

// //
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";
    mysqli_query($database, $update);

    echo " User updated successfully!";

    header("Location: read.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit User</h2>

    <form method="post" class="space-y-4">
      <div>
        <label class="block text-gray-700">Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" class="w-full border p-2 rounded" required>
      </div>
      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="w-full border p-2 rounded" required>
      </div>
      <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" value="<?= htmlspecialchars($user['password']) ?>" class="w-full border p-2 rounded" required>
      </div>
      <button type="submit" name="update" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
  </div>
</body>
</html>
