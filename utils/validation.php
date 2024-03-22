<?php

function validateTypeCode($typeCode, &$error): bool
{
    if (strlen($typeCode) === 0) {
        $error = "Type code is required";
        return false;
    } else if (strlen($typeCode) > 10) {
        $error = "Type code must be 10 characters or less";
        return false;
    }
    $error = "";
    return true;
}

function validatePhoneNumber($phone, &$error): bool
{
    if (strlen($phone) !== 10) {
        $error = "Phone number must be 10 digits";
        return false;
    } else if (!is_numeric($phone)) {
        $error = "Phone number must be numeric";
        return false;
    }
    $error = "";
    return true;
}


/* 
    Validate email credit
    https://stackoverflow.com/questions/12026842/how-to-validate-an-email-address-in-php 
*/
function validateEmail($email, &$error): bool
{
    if (strlen($email) === 0) {
        $error = "Email is required";
        return false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
        return false;
    }
    $error = "";
    return true;
}

function validateName($name, &$error): bool
{
    if (strlen($name) === 0) {
        $error = "Name is required";
        return false;
    } else if (strlen($name) > 30) {
        $error = "Name must be 30 characters or less";
        return false;
    }
    $error = "";
    return true;
}

function validateDate($date, &$error): bool
{
    if (strlen($date) === 0) {
        $error = "Date is required";
        return false;
    } else if (!strtotime($date)) {
        $error = "Invalid date format";
        return false;
    } else if (strtotime($date) < strtotime("today")) {
        $error = "Date must be today or later";
        return false;
    }
    $error = "";
    return true;
}

// Just assume working hours are 8am to 8pm
function validateTime($time, &$error): bool
{
    if (strlen($time) === 0) {
        $error = "Time is required";
        return false;
    }
    $time = date("H:i", strtotime($time));
    if (strtotime($time) < strtotime("08:00") || strtotime($time) > strtotime("20:00")) {
        $error = "Time must be between 8am and 8pm";
        return false;
    }
    $error = "";
    return true;
}

function validateClassDuration($duration, &$error): bool
{
    if (strlen($duration) === 0) {
        $error = "Duration is required";
        return false;
    } else if (!is_numeric($duration)) {
        $error = "Duration must be numeric";
        return false;
    }
    $duration_as_int = (int)$duration;
    if ($duration_as_int < 1 || $duration_as_int > 52) {
        $error = "Duration must be between 1 and 52 weeks";
        return false;
    }
    $error = "";
    return true;
}

function validateClassName($name, &$error): bool
{
    if (strlen($name) === 0) {
        $error = "Name is required";
        return false;
    } else if (strlen($name) > 30) {
        $error = "Name must be 30 characters or less";
        return false;
    }
    $error = "";
    return true;
}

function validatePrice($price, &$error): bool
{
    if (strlen($price) === 0) {
        $error = "Price is required";
        return false;
    } else if (!is_numeric($price)) {
        $error = "Price must be numeric";
        return false;
    }
    $price_as_float = (float)$price;
    if ($price_as_float < 0 || $price_as_float > 999.99) {
        $error = "Price must be between 0 and 999.99";
        return false;
    }
    $error = "";
    return true;
}

function validateCapacity($capacity, &$error): bool
{
    if (strlen($capacity) === 0) {
        $error = "Capacity is required";
        return false;
    } else if (!is_numeric($capacity)) {
        $error = "Capacity must be numeric";
        return false;
    }
    $capacity_as_int = (int)$capacity;
    if ($capacity_as_int < 1 || $capacity_as_int > 15) {
        $error = "Capacity must be between 1 and 15";
        return false;
    }
    $error = "";
    return true;
}