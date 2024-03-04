<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/services/member_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/membership_type_service.php';

$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$membershipType = "";
$dateOfBirth = "";
$formError = "";
$formSuccess = "";

if (isset($_POST['submitMember'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membershipType = $_POST['membershipType'];
    $startDate = date("Y-m-d");
    $dateOfBirth = $_POST['dob'];

    if (strlen($firstName) === 0) {
        $formError = "First name is required";
    } else if (strlen($lastName) === 0) {
        $formError = "Last name is required";
    } else if (strlen($email) === 0) {
        $formError = "Email is required";
    } else if (strlen($phone) === 0) {
        $formError = "Phone is required";
    } else if (strlen($membershipType) === 0) {
        $formError = "Membership type is required";
    } else if (strlen($dateOfBirth) === 0) {
        $formError = "Date of birth is required";
    } else {
        try {
            insertMember($firstName, $lastName, $email, $phone, $membershipType);
            $formError = "";
            $formSuccess = "Member added successfully";
            $firstName = "";
            $lastName = "";
            $email = "";
            $phone = "";
            $membershipType = "";
        } catch (Exception $e) {
            $formError = "An error occurred while adding the member";
        }
    }

}

$root = $_SERVER['DOCUMENT_ROOT'];
include $root . "/includes/header.html";
include $root . "/includes/navbar.php";
include $root . "/includes/addMemberForm.php";
include $root . "/includes/membersSidebar.php";

include $root . "/includes/footer.html";