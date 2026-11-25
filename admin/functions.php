<?php
require_once __DIR__ . '/../inc/data.php'; // gives us e() and lines()

/** Read a nested value from the data array by a path like ['home','bulk_cta'] */
function get_by_path($data, array $path) {
    $cur = $data;
    foreach ($path as $key) {
        if (!isset($cur[$key])) return null;
        $cur = $cur[$key];
    }
    return $cur;
}

/** Write a nested value into the data array by path, creating structure as needed */
function set_by_path(array &$data, array $path, $value) {
    $cur = &$data;
    $last = array_pop($path);
    foreach ($path as $key) {
        if (!isset($cur[$key]) || !is_array($cur[$key])) $cur[$key] = [];
        $cur = &$cur[$key];
    }
    $cur[$last] = $value;
}

function field_name($bucket, $idx, $key) {
    return $idx === null ? "{$bucket}[{$key}]" : "{$bucket}[{$idx}][{$key}]";
}
function file_field_name($bucket, $idx, $key) {
    $filebucket = $bucket === 'fields' ? 'image_files' : 'item_image_files';
    return $idx === null ? "{$filebucket}[{$key}]" : "{$filebucket}[{$idx}][{$key}]";
}

/** Resolve a stored image path for use in an <img src> from inside /admin/ */
function resolve_img($value) {
    if ($value === '' || $value === null) return '';
    if (preg_match('#^https?://#i', $value)) return $value;
    return '../' . ltrim($value, '/');
}

/** Render one form field (text/textarea/number/checkbox/image) */
function render_field($bucket, $idx, $key, array $field, $value) {
    $name = field_name($bucket, $idx, $key);
    echo '<div class="field">';
    echo '<label>' . e($field['label']) . '</label>';
    switch ($field['type']) {
        case 'textarea':
            echo '<textarea name="' . e($name) . '" rows="4">' . e($value) . '</textarea>';
            break;
        case 'checkbox':
            echo '<input type="hidden" name="' . e($name) . '" value="0">';
            echo '<label class="checkbox-inline"><input type="checkbox" name="' . e($name) . '" value="1"' . (!empty($value) ? ' checked' : '') . '> Yes</label>';
            break;
        case 'number':
            echo '<input type="number" step="any" name="' . e($name) . '" value="' . e($value) . '">';
            break;
        case 'image':
            $fname = file_field_name($bucket, $idx, $key);
            $src = resolve_img((string)$value);
            echo '<div class="image-field">';
            echo '<img class="thumb-preview"' . ($src !== '' ? ' src="' . e($src) . '"' : '') . ' onerror="this.style.visibility=\'hidden\'">';
            echo '<input type="hidden" name="' . e($name) . '" value="' . e($value) . '" class="current-path">';
            echo '<input type="file" name="' . e($fname) . '" accept="image/*" class="file-input">';
            echo '</div>';
            break;
        default:
            echo '<input type="text" name="' . e($name) . '" value="' . e($value) . '">';
    }
    echo '</div>';
}

/** Render one full repeater row (used both for real rows and the empty JS template) */
function render_repeater_row(array $fields, $idx, array $itemData, $labelFieldKey) {
    $rowLabel = $itemData[$labelFieldKey] ?? '';
    echo '<div class="repeater-row" data-idx="' . e((string)$idx) . '">';
    echo '<div class="repeater-row-head"><span class="row-title">' . e($rowLabel !== '' ? $rowLabel : 'New Item') . '</span><button type="button" class="remove-row"><i class="fas fa-trash"></i> Remove</button></div>';
    echo '<div class="repeater-row-fields">';
    foreach ($fields as $key => $field) {
        render_field('items', $idx, $key, $field, $itemData[$key] ?? '');
    }
    echo '</div></div>';
}
