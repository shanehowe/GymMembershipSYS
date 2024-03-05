<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/member_service.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/validation.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];

$memberId = "";
$firstName = "";
$lastName = "";
$email = "";
$phone = "";

$formError = "";
$formSuccess = "";

if ($requestMethod === "GET") {
    // Get member id from query string
    $memberId = $_GET['id'];
    if (!isset($memberId)) {
        header("Location: " . BASE_URL . "/views/members/view.php");
        exit();
    }

    $member = getMemberById((int) $memberId);
    if (!$member) {
        $formError = "Member not found";
    } else {
        $firstName = $member["FirstName"];
        $lastName = $member["LastName"];
        $email = $member["Email"];
        $phone = $member["Phone"];
    }
} else if (isset($_POST['submitMember'])) {
    // Get member id from form
    $memberId = $_POST['memberId'];
    // Get member data from form
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    // Validate member data
    $validationResult = "";
    if (!validateName($firstName, $validationResult)) {
        $formError = $validationResult;
    } else if (!validateName($lastName, $validationResult)) {
        $formError = $validationResult;
    } else if (!validateEmail($email, $validationResult)) {
        $formError = $validationResult;
    } else if (!validatePhoneNumber($phone, $validationResult)) {
        $formError = $validationResult;
    } else {
        // Update member
        try {
            updateMember($memberId, $firstName, $lastName, $email, $phone);
            $formSuccess = "Member updated successfully";
        } catch (Exception $e) {
            $formError = "An error occurred while updating the member";
        }
    }
}

$root = $_SERVER['DOCUMENT_ROOT'];
include $root . "/includes/header.html";
include $root . "/includes/navbar.php";
include $root . "/includes/editMemberForm.php";
include $root . "/includes/membersSidebar.php";

include $root . "/includes/footer.html";