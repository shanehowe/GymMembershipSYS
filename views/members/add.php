<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/database.php';

$firstName = "";
$lastName = "";
$email = "";
$phone = "";

$formError = "";

if (isset($_POST['submit-member'])) {
    $pdo = getDatabaseConnection();
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $startDate = date("Y-m-d");

    if (strlen($firstName) === 0) {
        $formError = "First name is required";
    } else if (strlen($lastName) === 0) {
        $formError = "Last name is required";
    } else if (strlen($email) === 0) {
        $formError = "Email is required";
    } else if (strlen($phone) === 0) {
        $formError = "Phone is required";
    }
    // Else do database stuff. not ready yet..
}

$root = $_SERVER['DOCUMENT_ROOT'];
include $root . "/includes/header.html";
include $root . "/includes/navbar.php";
include $root . "/includes/addMemberForm.html";
include $root . "/includes/membersSidebar.php";

include $root . "/includes/footer.html";