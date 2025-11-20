<?php
// Built-in PHP development server router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = urldecode($uri);

// Serve static files directly
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

// Route everything else through the public directory
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/public' . $uri;
?>
