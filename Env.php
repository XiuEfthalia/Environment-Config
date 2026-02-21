<?php
function loadEnv($file = ".env") {
    $env = [];
    if (!file_exists($file)) return $env;

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos(trim($line), "#") === 0) continue; // Skip comments
        [$name, $value] = explode("=", $line, 2);
        $env[trim($name)] = trim($value);
    }

    return $env;
}

$env = loadEnv();

define("DB_HOST", $env["DB_HOST"] ?? "localhost");
define("DB_USER", $env["DB_USER"] ?? "root");
define("DB_PASS", $env["DB_PASS"] ?? "");
define("DB_NAME", $env["DB_NAME"] ?? "auth_system");
define("SECRET_KEY", $env["SECRET_KEY"] ?? "defaultsecret");
define("DEBUG", $env["DEBUG"] === "true" ? true : false);
?>
