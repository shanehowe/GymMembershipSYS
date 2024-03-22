<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/services/gym_class_service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/validation.php';
include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php";

$name = $start_date = $duration = $price = $capacity = $time = "";
$formError = "";
$formSuccess = "";

if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $start_date = $_POST["start_date"];
    $duration = $_POST["duration"];
    $price = $_POST["price"];
    $capacity = $_POST["capacity"];
    $time = $_POST["time"];

    $error = "";
    if (!validateClassName($name, $error)) {
        $formError = $error;
    } else if (!validateDate($start_date, $error)) {
        $formError = $error;
    } else if (!validateClassDuration($duration, $error)) {
        $formError = $error;
    } else if (!validateTime($time, $error)) {
        $formError = $error;
    } else if (!validatePrice($price, $error)) {
        $formError = $error;
    } else if (!validateCapacity($capacity, $error)) {
        $formError = $error;
    } else {
        try {
            addGymClass($name, $start_date, $duration, $price, $capacity, $time);
            $formSuccess = "Gym class added successfully";
        } catch (PDOException) {
            $formError = "An error occurred while adding the gym class";
        }
    }
}

?>
<div class="main-content-container">
    <main class="main-content">
    <?php if (strlen($formError) > 0): ?>
            <div class="form-error-container notification-container">
                <p><?php echo $formError; ?></p>
            </div>
        <?php endif; ?>

        <?php if (strlen($formSuccess) > 0): ?>
            <div class="form-success-container notification-container">
                <p><?php echo $formSuccess; ?></p>
            </div>
        <?php endif; ?>
        <form action="add.php" method="post" class="form-style">
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

            <label class="form-label" for="time">Time:</label>
            <input value="<?php echo $time; ?>" class="input-time" type="time" id="time" name="time">

            <input class="submit-button" type="submit" value="register">
        </form>
    </main>



    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/classesSidebar.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html";
    ?>