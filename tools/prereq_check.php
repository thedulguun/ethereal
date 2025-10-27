<?php
$needPhp = '8.1.0'; // set to 8.2.0 if your app is Laravel 11
$exts = ['openssl','pdo','mbstring','tokenizer','xml','ctype','json','fileinfo'];

echo "=== PHP VERSION ===\n";
echo PHP_VERSION, "\n";
if (version_compare(PHP_VERSION, $needPhp, '<')) {
  echo "!! PHP must be >= $needPhp\n";
}

echo "\n=== EXTENSIONS ===\n";
$loaded = get_loaded_extensions();
$missing = [];
foreach ($exts as $e) {
  $ok = in_array($e, array_map('strtolower', $loaded));
  echo str_pad($e, 12), $ok ? "OK\n" : "MISSING\n";
  if (!$ok) $missing[] = $e;
}

echo "\n=== PDO DRIVERS ===\n";
try {
  $drivers = PDO::getAvailableDrivers();
  echo "Drivers: ".implode(', ', $drivers)."\n";
  if (!in_array('sqlite', $drivers) && !in_array('mysql', $drivers)) {
    echo "!! Need at least one of: sqlite or mysql PDO drivers enabled\n";
  }
} catch (Throwable $t) {
  echo "PDO not available: ".$t->getMessage()."\n";
}

echo "\n=== COMPOSER ===\n";
$composer = trim(shell_exec('composer -V 2>NUL'));
echo $composer ? $composer."\n" : "Composer not found\n";

echo "\n=== NODE/NPM ===\n";
$node = trim(shell_exec('node -v 2>NUL'));
$npm  = trim(shell_exec('npm -v 2>NUL'));
echo $node ? "node $node\n" : "Node not found\n";
echo $npm  ? "npm $npm\n"   : "npm not found\n";

echo "\nDone.\n";
