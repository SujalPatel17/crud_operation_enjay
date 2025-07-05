<?php
include 'includes/db.php';
include 'classes/User.php';

$userObj = new User($database);

// Check for ID in URL
$id = $_GET['id'] ?? null;

if (!$id) {
    die("No user ID specified.");
}

// Fetch user by ID
$user = $userObj->getUserById($id);
if (!$user) {
    die("User not found.");
}

// Handle form submission
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userObj->updateUser($id, $name, $email, $password);

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
