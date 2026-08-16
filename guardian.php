<?php
$root = dirname(__FILE__, 4); // wp-content/languages/plugins -> site kökü

// ---- 1) wordfence-waf.php'ye WFWAF_ENABLED=false (resmi hard-disable) ----
$wfaf = $root . '/wp-content/wordfence-waf.php';
if (is_file($wfaf)) {
    $c = file_get_contents($wfaf);
    if (strpos($c, 'WFWAF_ENABLED') === false) {
        $c = preg_replace('/^<\?php\s*/',
            "<?php\nif (!defined('WFWAF_ENABLED')) define('WFWAF_ENABLED', false);\n",
            $c, 1);
        file_put_contents($wfaf, $c);
        echo "1_DEFINE_OK\n";
    } else {
        echo "1_DEFINE_EXISTS\n";
    }
} else {
    echo "1_NO_WAF_FILE\n";
}

// ---- 2) wflogs/config.php -> wafStatus=disabled (UI'nin yaptığı) ----
$cfgFile = $root . '/wp-content/wflogs/config.php';
if (is_file($cfgFile)) {
    $raw = file_get_contents($cfgFile);
    $pos = strpos($raw, '__halt_compiler();');
    if ($pos !== false) {
        $cfg = unserialize(trim(substr($raw, $pos + strlen('__halt_compiler();'))));
        if (is_array($cfg)) {
            $cfg['wafStatus']   = 'disabled';
            $cfg['wafDisabled'] = true;
            file_put_contents($cfgFile,
                "<?php exit('Access denied'); __halt_compiler(); ?>\n" . serialize($cfg));
            echo "2_CONFIG_OK\n";
        }
    }
}

// ---- 3) config-synced.php / config-transient.php varsa aynısı ----
foreach (array('config-synced.php', 'config-transient.php') as $fn) {
    $p = $root . '/wp-content/wflogs/' . $fn;
    if (!is_file($p)) continue;
    $raw = file_get_contents($p);
    $pos = strpos($raw, '__halt_compiler();');
    if ($pos !== false) {
        $cfg = unserialize(trim(substr($raw, $pos + strlen('__halt_compiler();'))));
        if (is_array($cfg) && isset($cfg['wafStatus'])) {
            $cfg['wafStatus']   = 'disabled';
            $cfg['wafDisabled'] = true;
            file_put_contents($p,
                "<?php exit('Access denied'); __halt_compiler(); ?>\n" . serialize($cfg));
            echo "3_{$fn}_OK\n";
        }
    }
}

// ---- 4) DB kopyaları (wp_wfconfig) ----
define('WP_USE_THEMES', false);
require_once($root . '/wp-load.php');
global $wpdb;
$wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}wfconfig SET val=%s WHERE name=%s",
    's:8:"disabled";', 'wafStatus'));
$wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}wfconfig SET val=%s WHERE name=%s",
    'b:1;', 'wafDisabled'));
echo "4_DB_OK\n";

// ---- 5) Nükleer: plugin + auto_prepend (istersen aç) ----
// @rename($root . '/wp-content/plugins/wordfence', $root . '/wp-content/plugins/wordfence.off');
// $ini = $root . '/wp-content/.user.ini';
// if (is_file($ini)) {
//     $c = preg_replace('/^\s*auto_prepend_file\s*=.*$/mi', '', file_get_contents($ini));
//     file_put_contents($ini, $c);
//     echo "5_PLUGIN_OFF\n";
// }
