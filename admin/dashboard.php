<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/functions.php';
require_login();

$schema = require __DIR__ . '/schema.php';
$data = site_data();

$sectionKey = $_GET['section'] ?? array_key_first($schema);
if (!isset($schema[$sectionKey])) $sectionKey = array_key_first($schema);
$section = $schema[$sectionKey];

// group sections for the sidebar, preserving schema order
$groups = [];
foreach ($schema as $key => $sec) {
    $groups[$sec['group']][$key] = $sec['label'];
}

$saved = isset($_GET['saved']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard — PrintBe Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/admin.css">
</head>
<body>
<div class="admin-shell">

  <aside class="admin-sidebar">
    <a href="dashboard.php" class="admin-logo"><i class="fas fa-print"></i> PrintBe <span>Admin</span></a>
    <nav class="admin-nav">
      <?php foreach ($groups as $groupName => $items): ?>
        <div class="nav-group-label"><?php echo e($groupName); ?></div>
        <?php foreach ($items as $key => $label): ?>
          <a href="dashboard.php?section=<?php echo e($key); ?>" class="nav-link<?php echo $key === $sectionKey ? ' active' : ''; ?>">
            <i class="fas <?php echo e($schema[$key]['icon'] ?? 'fa-circle'); ?>"></i> <?php echo e($label); ?>
          </a>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </nav>
    <div class="admin-sidebar-footer">
      <a href="../index.php" target="_blank" class="side-btn"><i class="fas fa-arrow-up-right-from-square"></i> View Site</a>
      <a href="logout.php" class="side-btn danger"><i class="fas fa-right-from-bracket"></i> Log Out</a>
    </div>
  </aside>

  <main class="admin-main">
    <header class="admin-topbar">
      <div>
        <h1><?php echo e($section['label']); ?></h1>
        <p><?php echo $section['type'] === 'repeater' ? 'Add, edit, reorder-free list, or remove items below.' : 'Edit the fields below, then save.'; ?></p>
      </div>
      <button type="submit" form="editForm" class="btn-save"><i class="fas fa-floppy-disk"></i> Save Changes</button>
    </header>

    <?php if ($saved): ?><div class="save-banner"><i class="fas fa-circle-check"></i> Saved successfully.</div><?php endif; ?>

    <form id="editForm" action="save.php?section=<?php echo e($sectionKey); ?>" method="post" enctype="multipart/form-data" class="admin-content">

      <?php if ($section['type'] === 'simple'):
        $values = get_by_path($data, $section['path']) ?? [];
        ?>
        <div class="card">
          <div class="fields-grid">
            <?php foreach ($section['fields'] as $key => $field): ?>
              <?php render_field('fields', null, $key, $field, $values[$key] ?? ''); ?>
            <?php endforeach; ?>
          </div>
        </div>

      <?php else: // repeater
        $items = get_by_path($data, $section['path']) ?? [];
        $labelField = $section['item_label_field'];
        ?>
        <div class="repeater-list" id="repeaterList" data-next-index="<?php echo count($items); ?>">
          <?php foreach ($items as $i => $item): render_repeater_row($section['fields'], $i, $item, $labelField); endforeach; ?>
        </div>

        <template id="repeaterTemplate">
          <?php render_repeater_row($section['fields'], '__IDX__', [], $labelField); ?>
        </template>

        <button type="button" id="addRowBtn" class="btn-add-row"><i class="fas fa-plus"></i> Add New Item</button>
      <?php endif; ?>

    </form>
  </main>
</div>

<script src="assets/admin.js"></script>
</body>
</html>
