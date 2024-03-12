<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/membership_type_service.php';

function getMemberById($memberId)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("SELECT * FROM members WHERE MemberId = :memberId");
    $stmt->bindParam(':memberId', $memberId);
    $stmt->execute();
    return $stmt->fetch();
}

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

function deleteMember($memberId)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("DELETE FROM members WHERE MemberId = :memberId");
    $stmt->bindParam(':memberId', $memberId);
    $stmt->execute();
}

function getMembers()
{
    $pdo = getDatabaseConnection();
    $result = $pdo->query("SELECT * FROM members ORDER BY FirstName, LastName ASC");
    $memberArray = [];
    while ($row = $result->fetch()) {
        $associativeMemberArray = [
            "memberid" => $row["memberid"],
            "FirstName" => $row["FirstName"],
            "LastName" => $row["LastName"],
            "Status" => $row["Status"]
        ];
        array_push($memberArray, $associativeMemberArray);
    }
    return $memberArray;
}

function getMembersByName(string $combinedFirstAndLastName)
{
    $pdo = getDatabaseConnection();
    $result = $pdo->prepare(
        "SELECT * FROM members WHERE CONCAT_WS(' ', FirstName, LastName) LIKE :name ORDER BY FirstName, LastName ASC"
    );
    $result->bindValue(':name', '%' . $combinedFirstAndLastName . '%');
    $result->execute();
    $memberArray = [];
    while ($row = $result->fetch()) {
        $associativeMemberArray = [
            "memberid" => $row["memberid"],
            "FirstName" => $row["FirstName"],
            "LastName" => $row["LastName"],
            "Status" => $row["Status"]
        ];
        array_push($memberArray, $associativeMemberArray);
    }
    return $memberArray;
}

function updateMember($memberId, $firstName, $lastName, $email, $phone)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare(
        "UPDATE members SET FirstName = :firstName, LastName = :lastName, Email = :email, Phone = :phone WHERE MemberId = :memberId"
    );
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':memberId', $memberId);
    $stmt->execute();
}