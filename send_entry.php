<?php
require_once "config.php";

echo "here!";

$entryName = $_POST['entryName'];
$entryDescription = $_POST['entryDescription'];
$entryLink = $_POST['entryLink'];
$entryType = $_POST['category'];
$entryTag = $_POST['tag'];


$sql = 'INSERT INTO `positivity-entries` (`entry-type`, `user-id`, `entry-name`, `entry-description`, `entry-link`, `entry-tag`) VALUES (?,?,?,?,?,?)';

if ($stmt = mysqli_prepare($conn, $sql)) {
    $today = date("Y-m-d");
    echo $today;
    $check = mysqli_stmt_bind_param($stmt, "sissss", $entryType, $user_id, $entryName, $entryDescription, $entryLink, $entryTag);

    if (!$check) {
        die('Error with bind_param: ') . htmlspecialchars($stmt->error);
    }

    $check2 = mysqli_stmt_execute($stmt);

    if (!$check2) {
        die('Error with execute: ') . htmlspecialchars($stmt->error);
    }
}

header("Location: index.php");
exit;
