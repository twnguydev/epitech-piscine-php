<?php
$archiveName = $_GET['archiveName'];
$archivePath = $archiveName . '.tar';

if (file_exists($archivePath)) {
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $archivePath);
    readfile($archivePath);
    exit;
}
else {
    echo 'L\'archive demandée n\'existe pas.';
}
?>
