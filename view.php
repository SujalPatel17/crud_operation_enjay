<?php
include 'includes/db.php';
include 'classes/User.php';

$userObj = new User($database);

// Get ID from URL
$id = $_GET['id'] ?? null;

if (!$id) {
  echo "No user ID provided.";
  exit();
}

$user = $userObj->getUserById($id);

if (!$user) {
  echo "User not found.";
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>View User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="bg-white p-6 rounded shadow-md w-[350px] text-center">
    <h2 class="text-xl font-bold mb-4">User Details</h2>
    <img src="uploads/<?= $user['profile'] ?>" alt="User Image" class="w-28 h-28 mx-auto rounded-full mb-4">
    <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
    <p><strong>Password:</strong> <?= htmlspecialchars($user['password']) ?></p>
    <a href="read.php" class="text-red-500">Back</a>
  </div>
</body>
</html>
