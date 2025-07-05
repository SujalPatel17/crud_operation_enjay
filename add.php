<?php
include 'includes/db.php';
include 'classes/User.php';

$userObj = new User($database);

$message = '';

if (isset($_POST['save'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Handle photo upload
    $photo     = $_FILES['photo']['name'];
    $tmp_name  = $_FILES['photo']['tmp_name'];
    $uploadDir = 'uploads/';
    $uploadPath = $uploadDir . basename($photo);

    if (move_uploaded_file($tmp_name, $uploadPath)) {
        $success = $userObj->addUser($name, $email, $password, $photo);
        if ($success) {
            $message = "<p class='text-green-600 text-center'>Data inserted!</p>";
        } else {
            $message = "<p class='text-red-600 text-center'>Database insert failed.</p>";
        }
    } else {
        $message = "<p class='text-red-600 text-center'>Photo upload failed.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 sm:px-6 py-6 font-sans">
  <div class="max-w-md w-full mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Add Data Form</h2>
    
    <?= $message ?>

    <form method="post" enctype="multipart/form-data" class="space-y-4">
      <div>
        <label class="block text-gray-700">Name</label>
        <input type="text" name="name" class="w-full border border-gray-300 rounded p-2" required>
      </div>

      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" class="w-full border border-gray-300 rounded p-2" required>
      </div>

      <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" class="w-full border border-gray-300 rounded p-2" required>
      </div>

      <div>
        <label class="block text-gray-700">Add Photo:</label>
        <input type="file" name="photo" class="rounded-xl p-2">
      </div>

      <button type="submit" name="save" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
      <a href="read.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">Read</a>
    </form>
  </div>
</body>
</html>
