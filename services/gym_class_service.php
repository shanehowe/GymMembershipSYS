<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/database.php';

function getGymClasses()
{
    $pdo = getDatabaseConnection();
    $result = $pdo->query("SELECT * FROM gymclass ORDER BY Name ASC");
    $gymClassArray = [];
    while ($row = $result->fetch()) {
        $associativeGymClassArray = [
            "id" => $row["id"],
            "name" => $row["name"],
            "price" => $row["price"],
            "time" => $row["time"]
        ];
        array_push($gymClassArray, $associativeGymClassArray);
    }
    return $gymClassArray;
}

function addGymClass($name, $start_date, $duration, $price, $capacity, $time)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare(
        "INSERT INTO gymclass (name, start_date, duration, price, capacity, time) 
        VALUES (:name, :start_date, :duration, :price, :capacity, :time)"
    );
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':capacity', $capacity);
    $stmt->bindParam(':time', $time);
    $stmt->execute();
}

function getGymClassesThatCanBeBookedAndAreStillActive()
{
    $allGymClasses = getGymClasses();

    $gymClassesThatCanBeBookedAndAreStillActive = [];
    foreach ($allGymClasses as $gymClass) {
        $classDuration = $gymClass["duration"];
        $classStartDate = $gymClass["start_date"];

        $dateEndDate = date('Y-m-d', strtotime($classStartDate . ' + ' . $classDuration . ' weeks'));
        $todaysDate = date('Y-m-d');

        if ($todaysDate < $dateEndDate) {
            array_push($gymClassesThatCanBeBookedAndAreStillActive, $gymClass);
        }
    }

    return $gymClassesThatCanBeBookedAndAreStillActive;
}

function getBookingCountForGymClass($gymClassId)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM bookings WHERE gym_class_id = :gym_class_id");
    $stmt->bindParam(':gym_class_id', $gymClassId);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function bookMemberIntoGymClass($gymClassId, $memberId)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("INSERT INTO bookings (classID, memberid) VALUES (:classID, :memberid)");
    $stmt->bindParam(':classID', $gymClassId);
    $stmt->bindParam(':memberid', $memberId);
}