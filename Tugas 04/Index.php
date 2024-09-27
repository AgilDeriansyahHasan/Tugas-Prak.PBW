<style>
    form {
    background-color: skyblue;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 20px auto;
}

form input[type="text"], form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 4px;
    border: 1px solid #ccc;
}

form input[type="submit"] {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #2980b9;
}
</style>

<?php
require_once 'controllers/GuestController.php';

$guestController = new GuestController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $guestController->create($name, $comment);
    header("Location: index.php");
}

$guests = $guestController->readAll();

include 'views/guest_form.php';
include 'views/guest_list.php';
?>

