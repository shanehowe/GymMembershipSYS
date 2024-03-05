<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/services/member_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/membership_type_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/validation.php';

$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$membershipType = "";
$formError = "";
$formSuccess = "";

if (isset($_POST['submitMember'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $membershipType = $_POST['membershipType'];
    $startDate = date("Y-m-d");
    $validationResult = "";

    if (!validateName($firstName, $validationResult)) {
        $formError = $validationResult;
    } else if (!validateName($lastName, $validationResult)) {
        $formError = $validationResult;
    } else if (!validateEmail($email, $validationResult)) {
        $formError = $validationResult;
    } else if (!validatePhoneNumber($phone, $validationResult)) {
        $formError = $validationResult;
    } else if (!validateTypeCode($membershipType, $validationResult)) {
        $formError = $validationResult;
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