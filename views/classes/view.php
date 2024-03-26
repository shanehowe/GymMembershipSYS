<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/services/gym_class_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/validation.php';

include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php";

include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html";

$gym_classes = getGymClasses();
?>

<div class="main-content-container">
    <main class="main-content">
        <h1>Classes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gym_classes as $gym_class): ?>
                    <tr>
                        <td><?php echo $gym_class["name"]; ?></td>
                        <td><?php echo $gym_class["price"]; ?></td>
                        <td><?php echo $gym_class["time"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/classesSidebar.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html";
?>