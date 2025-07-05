<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Users</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">User List</h1>
    <table id="userTable" class="w-full border">
      <thead>
      
      <tr class="bg-gray-200">
        <th class="p-2 text-left">ID</th>
        <th class="p-2 text-left">Profile</th> <!-- Moved here -->
        <th class="p-2 text-left">Name</th>
        <th class="p-2 text-left">Email</th>
        <th class="p-2 text-left">Actions</th>
      </tr>
      </thead>

      <?php
      $query = "SELECT * FROM users";
      $result = mysqli_query($database, $query);

      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr class='border-t'>
            <td class='p-2'>{$row['id']}</td>
            <td class='p-2'><img src='uploads/{$row['profile']}' class='w-12 h-12 rounded-full object-cover'></td>
            <td class='p-2'>{$row['name']}</td>
            <td class='p-2'>{$row['email']}</td>
            <td class='p-2'>
              <a href='edit.php?id={$row['id']}' class='text-blue-500'>Edit</a> | 
              <a href='delete.php?id={$row['id']}' class='text-red-500'>Delete</a> |
              <a href='view.php?id={$row['id']}' class='text-green-500'>View</a>
            </td>
          </tr>";
        }
      } else {
        echo "<tr><td colspan='5' class='p-4 text-center text-gray-500'>No records found</td></tr>";
      }
      ?>
    </table>
    <a href="add.php" class="text-blue-500 mt-4 inline-block">Add New User</a>
  </div>

<script>
    $(document).ready(function () {
      $('#userTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        responsive: true
      });
    });
  </script>
</body>
</html>
