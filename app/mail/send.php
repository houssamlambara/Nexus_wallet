<?php
// Example of hashed password (hush password)
$hashedPassword = '$2y$10$q7hEyOTIMut3PCmguTgR5eulUQxeNlTqGe2bD8QHJzEt0oLrKw.Au'; // Replace with your hashed password

// Password entered by user (normal password)
$enteredPassword = '123456ab'; // Replace with the password you want to check

// Check if the entered password matches the hashed password
if (password_verify($enteredPassword, $hashedPassword)) {
    echo 'Password is correct!';
} else {
    echo 'Password is incorrect.';
}
?>