<?php
require_once __DIR__ . '/auth.php';
require_login();
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: dashboard.php'); exit; }

$schema = require __DIR__ . '/schema.php';
$sectionKey = $_GET['section'] ?? '';
if (!isset($schema[$sectionKey])) { header('Location: dashboard.php'); exit; }
$section = $schema[$sectionKey];
$data = site_data();

function extract_simple_file($filesBucket, $key) {
    if (!isset($filesBucket['name'][$key]) || $filesBucket['name'][$key] === '') return null;
    return [
        'name' => $filesBucket['name'][$key], 'type' => $filesBucket['type'][$key],
        'tmp_name' => $filesBucket['tmp_name'][$key], 'error' => $filesBucket['error'][$key],
        'size' => $filesBucket['size'][$key],
    ];
}
function extract_nested_file($filesBucket, $idx, $key) {
    if (!isset($filesBucket['name'][$idx][$key]) || $filesBucket['name'][$idx][$key] === '') return null;
    return [
        'name' => $filesBucket['name'][$idx][$key], 'type' => $filesBucket['type'][$idx][$key],
        'tmp_name' => $filesBucket['tmp_name'][$idx][$key], 'error' => $filesBucket['error'][$idx][$key],
        'size' => $filesBucket['size'][$idx][$key],
    ];
}
function handle_upload($file, $existing) {
    if (!$file || $file['error'] !== UPLOAD_ERR_OK || (int)$file['size'] <= 0) return $existing;
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed, true)) return $existing;
    $destDir = __DIR__ . '/../uploads';
    if (!is_dir($destDir)) @mkdir($destDir, 0755, true);
    $newName = 'img_' . date('Ymd_His') . '_' . substr(bin2hex(random_bytes(4)), 0, 8) . '.' . $ext;
    if (move_uploaded_file($file['tmp_name'], $destDir . '/' . $newName)) {
        return 'uploads/' . $newName;
    }
    return $existing;
}

if ($section['type'] === 'simple') {

    $posted = $_POST['fields'] ?? [];
    $filesBucket = $_FILES['image_files'] ?? ['name' => [], 'type' => [], 'tmp_name' => [], 'error' => [], 'size' => []];
    $out = [];
    foreach ($section['fields'] as $key => $field) {
        $val = $posted[$key] ?? '';
        if ($field['type'] === 'checkbox') $val = ($val === '1');
        if ($field['type'] === 'image') $val = handle_upload(extract_simple_file($filesBucket, $key), $val);
        $out[$key] = $val;
    }
    set_by_path($data, $section['path'], $out);

} else { // repeater

    $postedItems = $_POST['items'] ?? [];
    $filesBucket = $_FILES['item_image_files'] ?? ['name' => [], 'type' => [], 'tmp_name' => [], 'error' => [], 'size' => []];
    $outItems = [];

    foreach ($postedItems as $idx => $row) {
        $outRow = [];
        foreach ($section['fields'] as $key => $field) {
            $val = $row[$key] ?? '';
            if ($field['type'] === 'checkbox') $val = ($val === '1');
            if ($field['type'] === 'number') $val = is_numeric($val) ? $val : '0';
            if ($field['type'] === 'image') $val = handle_upload(extract_nested_file($filesBucket, $idx, $key), $val);
            $outRow[$key] = $val;
        }
        // drop rows the user added via "Add New Item" but never actually filled in
        $isEmpty = true;
        foreach ($section['fields'] as $key => $field) {
            if ($field['type'] === 'checkbox') continue;
            if (trim((string)$outRow[$key]) !== '') { $isEmpty = false; break; }
        }
        if ($isEmpty) continue;
        $outItems[] = $outRow;
    }
    set_by_path($data, $section['path'], $outItems);
}

// write back atomically with a file lock
$path = __DIR__ . '/../data/site.json';
$fp = fopen($path, 'c+');
if ($fp && flock($fp, LOCK_EX)) {
    ftruncate($fp, 0);
    fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
}

header('Location: dashboard.php?section=' . urlencode($sectionKey) . '&saved=1');
exit;
