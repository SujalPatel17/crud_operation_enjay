<?php include 'db.php';?>

<?php
if(isset($_POST['save'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    // Handle photo upload
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    // Set upload folder
    $upload_dir = 'uploads/';

    // Move the uploaded file
    move_uploaded_file($tmp_name, $upload_dir . $photo);

    $query="INSERT INTO users (name, email, password,profile) VALUES ('$name', '$email', '$password', '$photo')";

    mysqli_query($database,$query);
    echo "<p class='text-green-600 text-center'>Data inserted!</p>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>
      <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 sm:px-6 py-6 font-sans">
    <div class=" max-w-md w-full mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4  ">Add Data Form</h2>
        <form method="post" enctype="multipart/form-data" class="space-y-4" >
            <div>
                <label class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded p-2" required>

            </div>
            
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email"  name="email" id="email" class="w-full border border-gray-300 rounded p-2" required>

            </div>

            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" id="name" name="password" class="w-full border border-gray-300 rounded p-2" required>

            </div>

            <div class="form-group">
                <label for="photo">Add Photo:</label>
                <input type="file" id="photo" name="photo" class="rounded-xl p-2" >
            </div>

            <button type="submit" name="save" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            <button type="Rea"  class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"><a href="read.php"> Read</a></button>
        </form>
    </div>
</div>
    
</body>
</html>