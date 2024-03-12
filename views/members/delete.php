<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/member_service.php";

function redirectToView($message, $isError)
{
    header("Location: " . BASE_URL . "/views/members/view.php?message=" . $message . "&isError=" . $isError);
    exit();
}

// Probably wrong to use get for deleting but works
// Might change it need to ask anne
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    redirectToView("Invalid request method", true);
}

$memberId = $_GET['id'];
$member = getMemberById($memberId);
if (!$member) {
    redirectToView("Member not found", true);
}

try {
    deleteMember($memberId);
    redirectToView("Member deleted successfully", false);
} catch (PDOException $e) {
    redirectToView("Failed to delete member", true);
}