<?php

function getDatabaseConnection()
{
    $pdo = new PDO('mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME'), getenv('DB_USERNAME'), '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function getMembers()
{
    $pdo = getDatabaseConnection();
    $result = $pdo->query("SELECT * FROM members");
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["memberid"] . "</td>";
        echo "<td>" . $row["FirstName"] . "</td>";
        echo "<td>" . $row["LastName"] . "</td>";
        echo "<td>" . $row["Status"] . "</td>";
        echo "</tr>";
    }
}

function insertMember($firstName, $lastName, $email, $phone)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("INSERT INTO members (FirstName, LastName, Email, Phone) VALUES (:firstName, :lastName, :email, :phone)");
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
}

function getActiveMembershipTypes()
{
    $pdo = getDatabaseConnection();
    $result = $pdo->query("SELECT * FROM membershiptypes WHERE Status = 'A'");
    while ($row = $result->fetch()) {
    }
}