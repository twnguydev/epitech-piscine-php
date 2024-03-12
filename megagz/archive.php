<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $archiveName = $_POST['archiveName'];
    $files = $_FILES['files'];

    $tar = new PharData($archiveName . '.tar');

    foreach ($files['tmp_name'] as $index => $tmpName) {
        $file = $files['name'][$index];
        $tar->addFile($tmpName, $file);
    }

    echo json_encode(['success' => true]);
}
?>