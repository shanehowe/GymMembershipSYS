<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/membership_type_service.php';

function insertMember($firstName, $lastName, $email, $phone, $typeCode)
{
    $pdo = getDatabaseConnection();
    $todaysDate = date("Y-m-d");
    $membershipType = getMembershipTypeByTypeCode($typeCode);
    $endDate = date('Y-m-d', strtotime($todaysDate . ' + ' . $membershipType['Duration'] . ' months'));
    $stmt = $pdo->prepare(
        "INSERT INTO members (FirstName, LastName, Email, Phone, StartDate, EndDate, Status, TypeCode) 
        VALUES (:firstName, :lastName, :email, :phone, :startDate, :endDate, 'A', :typeCode)"
    );
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':startDate', $todaysDate);
    $stmt->bindParam(':endDate', $endDate);
    $stmt->bindParam(':typeCode', $typeCode);
    $stmt->execute();
}

function setMemberInactive($memberId)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("UPDATE members SET Status = 'U' WHERE MemberId = :memberId");
    $stmt->bindParam(':memberId', $memberId);
    $stmt->execute();
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