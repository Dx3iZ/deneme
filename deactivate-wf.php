<?php
define('WP_USE_THEMES', false);
require_once(dirname(__FILE__, 4) . '/wp-load.php');

$opts = get_option('active_plugins');
$found = 0;
foreach ($opts as $i => $p) {
    if (stripos($p, 'wordfence') === 0) {
        unset($opts[$i]);
        $found++;
    }
}
if ($found) {
    update_option('active_plugins', array_values($opts));
    echo 'DEACTIVATED:' . $found;
} else {
    echo 'NOT_FOUND';
}
