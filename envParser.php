<?php
$envPath = __DIR__ . '/.env';

if (!file_exists($envPath)) {
    throw new Exception('.env file not found');
}

$lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    // Skip comments
    if (strpos(trim($line), '#') === 0) {
        continue;
    }

    list($name, $value) = explode('=', $line, 2);

    $value = trim($value, "\"'");

    putenv(sprintf('%s=%s', $name, $value));
    $_ENV[$name] = $value;
    $_SERVER[$name] = $value;
}
