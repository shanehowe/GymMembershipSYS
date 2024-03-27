<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/services/gym_class_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/member_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/validation.php';

include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php";

include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html";

$members = getMembers();
?>

<div class="main-content-container">
    <main class="main-content">
    </main>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/classesSidebar.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html";
?>