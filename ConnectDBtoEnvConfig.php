<?php
include "env.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    if (DEBUG) {
        echo "DB Connection Error: " . $e->getMessage();
    } else {
        error_log($e->getMessage());
        die("Database unavailable.");
    }
}
?>
