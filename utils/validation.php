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