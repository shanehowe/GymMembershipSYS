<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
// Only view this page is id query parameter is set
if (!isset($_GET['id'])) {
    header("Location: " . BASE_URL . "/views/members/view.php");
    exit();
}

include_once $_SERVER['DOCUMENT_ROOT'] . "/services/member_service.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html";
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php";


$member = getMemberById((int)$_GET['id']);

include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/memberCard.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/membersSidebar.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html";