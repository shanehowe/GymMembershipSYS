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