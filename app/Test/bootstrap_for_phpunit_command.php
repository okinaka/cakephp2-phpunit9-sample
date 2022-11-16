<?php
/**
 * Bootstrap for phpunit command
 */
/**
 * copy from app/Console/cake.php
 */
$dispatcher = 'Cake' . DS . 'Console' . DS . 'ShellDispatcher.php';
$root = dirname(dirname(dirname(__FILE__)));
$appDir = basename(dirname(dirname(__FILE__)));
$install = $root . DS . 'lib';
$composerInstall = $root . DS . $appDir . DS . 'Vendor' . DS . 'cakephp' . DS . 'cakephp' . DS . 'lib';
// the following lines differ from its sibling
// /lib/Cake/Console/Templates/skel/Console/cake.php
if (file_exists($composerInstall . DS . $dispatcher)) {
    $install = $composerInstall;
}
ini_set('include_path', $install . PATH_SEPARATOR . ini_get('include_path'));
if (!include $dispatcher) {
    trigger_error('Could not locate CakePHP core files.', E_USER_ERROR);
}
unset($dispatcher);
define('ROOT', $root);
define('APP_DIR', $appDir);
define('APP', ROOT . DS . APP_DIR . DS);
// Use methods that initialize constants and environment variables, but the shell does not in ShellDispatcher class.
$command = $_SERVER['argv'][0];
new ShellDispatcher([$command, '-working', $appDir]);
unset($root, $appDir, $install, $composerInstall);

// Emulate \TestShell::_run which unsets any configured error handlers
restore_error_handler();
restore_error_handler();

App::uses('CakeTestModel', 'TestSuite/Fixture');
