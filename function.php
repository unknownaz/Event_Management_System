<?php
require_once("connection.php");

function signup($conn, $data)
{
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $confirm_password = $data['confirm_password'];

    $sql = "INSERT INTO `signup_info` (`username`, `email` ,`password`, `confirm_password`) VALUES (?,?,?)";

    $signup = $conn->prepare($sql);
    $signup->bind_param("sss", $name, $email, $password, $confirm_password);
    $signup->execute();

    if ($signup->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}
function login($conn, $data)
{
    $email = $data['username'];

    $sql = "SELECT `username`, `password` FROM `log_info` WHERE `username` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if ($row['password']) {
            return $row; // Return user data
        } else {
            return false; // Invalid password
        }
    } else {
        return false; // Username not found
    }
}


