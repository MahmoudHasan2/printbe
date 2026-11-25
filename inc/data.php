<?php
/**
 * Loads /data/site.json once per request.
 * Every front-end page and the admin dashboard include this file.
 */
function site_data() {
    static $data = null;
    if ($data === null) {
        $path = __DIR__ . '/../data/site.json';
        $json = file_get_contents($path);
        $data = json_decode($json, true);
        if (!is_array($data)) $data = [];
    }
    return $data;
}

/** Safe HTML output */
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

/** Split a "one item per line" textarea value into a clean array */
function lines($value) {
    $parts = preg_split('/\r\n|\r|\n/', (string)$value);
    return array_values(array_filter(array_map('trim', $parts), fn($v) => $v !== ''));
}
