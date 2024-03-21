<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/services/member_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/membership_type_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/validation.php';
include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php";

$name = $start_date = $duration = $price = $capacity = $day = $time = "";

if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $start_date = $_POST["start_date"];
    $duration = $_POST["duration"];
    $price = $_POST["price"];
    $capacity = $_POST["capacity"];
    $day = $_POST["day"];
    $time = $_POST["time"];

    // TODO: Add validation and database insertion
}

?>
<div class="main-content-container">
    <main class="main-content">
        <form action="" method="post" class="form-style">
            <label class="form-label" for="name">Name:</label>
            <input class="input-text" type="text" id="name" name="name" value="<?php echo $name; ?>" required>

            <label class="form-label" for="start_date">Start Date:</label>
            <input class="input-date" type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>" required>

            <label class="form-label" for="duration">Duration (weeks):</label>
            <input value="<?php echo $duration; ?>" class="input-number" type="number" id="duration" name="duration">

            <label class="form-label" for="price">Price:</label>
            <input value="<?php echo $price; ?>"class="input-text" type="text" id="price" name="price" pattern="^\d+(.\d{1,2})?$">

            <label class="form-label" for="capacity">Capacity:</label>
            <input value="<?php echo $capacity; ?>" class="input-number" type="number" id="capacity" name="capacity">

            <label class="form-label" for="day">Day:</label>
            <input value="<?php echo $day; ?>" class="input-text" type="text" id="day" name="day" required>

            <label class="form-label" for="time">Time:</label>
            <input value="<?php echo $time; ?>" class="input-time" type="time" id="time" name="time">

            <input class="submit-button" type="submit" value="register">
        </form>
    </main>



    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/classesSidebar.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html";
    ?>