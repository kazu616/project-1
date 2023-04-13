<?php
function exportSeo()
{
    include_once 'connect/openDB.php';
    $sql = "SELECT email FROM seo";
    $result = mysqli_query($connect, $sql);
    include_once 'connect/closeDB.php';
    $filename = "emails.txt";
    $file = fopen($filename, "w");

    while ($row = mysqli_fetch_assoc($result)) {
        fwrite($file, $row['email'] . "\n");
    }
    fclose($file);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="emails.txt"');
    header('Content-Length: ' . filesize($filename));
    readfile($filename);
}


switch ($action) {
    case '':
        exportSeo();
        break;
}
