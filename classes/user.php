<?php
class User {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        return mysqli_query($this->db, $query);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_assoc($result);
    }

    public function addUser($name, $email, $password, $profile) {
        $query = "INSERT INTO users (name, email, password, profile) VALUES ('$name', '$email', '$password', '$profile')";
        return mysqli_query($this->db, $query);
    }

    public function updateUser($id, $name, $email, $password) {
        $query = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";
        return mysqli_query($this->db, $query);
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id=$id";
        return mysqli_query($this->db, $query);
    }
}
?>
