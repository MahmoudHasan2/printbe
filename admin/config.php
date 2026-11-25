<?php
/**
 * Admin login credentials.
 * IMPORTANT: change ADMIN_USER and generate a new password hash, then
 * re-upload this file. To generate a new hash, run this once anywhere
 * PHP is available (e.g. a throwaway .php file on the server):
 *
 *   <?php echo password_hash('your-new-password', PASSWORD_DEFAULT);
 *
 * Paste the result below as ADMIN_PASS_HASH, then delete that throwaway file.
 *
 * Default login shipped with this dashboard:
 *   username: admin
 *   password: (set your own – see instructions above)
 */
define('ADMIN_USER', 'admin');
define('ADMIN_PASS_HASH', 'PASTE_PASSWORD_HASH_HERE');
