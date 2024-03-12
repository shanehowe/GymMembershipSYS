<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/member_service.php";

$memberId;
$memberInDatabase;
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $memberId = $_GET["id"];
    if (!isset($memberId)) {
        header("Location: " . BASE_URL . "/views/members/view.php");
        exit();
    }
    $memberInDatabase = getMemberById((int) $memberId);
}
?>

<form action="delete.php" method="post">
    <input type='hidden' value="<?php echo $memberId; ?>">
    <p>Are you sure you what to delete <?php echo $memberInDatabase['FirstName'] . " " . $memberInDatabase["LastName"]; ?>?</p>
    <input type="submit" value="Yes">
    <input type="button" value="No, go back">
</form>