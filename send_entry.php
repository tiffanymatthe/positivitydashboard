<?php
require_once "config.php";

$entryName = $_POST['entryName'];
$entryDescription = $_POST['entryDescription'];
$entryLink = $_POST['entryLink'];
$categories = $_POST['category'];
$tags = $_POST['tag'];

$sql = 'INSERT INTO `positivity-entries` (`entry-type`, `user-id`, `entry-name`, `entry-description`, `entry-link`, `entry-tag`) VALUES (?,?,?,?,?,?)';

if ($stmt = mysqli_prepare($conn, $sql)) {
    $today = date("Y-m-d");
    mysqli_stmt_bind_param($stmt, "sissss", $entry_type, $user_id, $entryName, $entryDescription, $entryLink, $entry_tag);
    mysqli_stmt_execute($stmt);
}

header("Location: index.php");
exit;