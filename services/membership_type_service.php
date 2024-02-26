<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/database.php';

function getActiveMembershipTypes()
{
    $pdo = getDatabaseConnection();
    $result = $pdo->query("SELECT * FROM membershiptypes WHERE Status = 'A'");
    while ($row = $result->fetch()) {
        echo "<option value='" . $row["TypeCode"] . "'>" . $row["TypeCode"] . " - " . $row["Description"] . "</option>";
    }
}

function getMembershipTypeByTypeCode($typeCode)
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("SELECT * FROM membershiptypes WHERE TypeCode = :typeCode");
    $stmt->bindParam(':typeCode', $typeCode);
    $stmt->execute();
    return $stmt->fetch();
}