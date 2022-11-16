<?php
// Read additional bootstrap.php when executed from phpunit command.
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
	include_once __DIR__ . DS . 'bootstrap_for_phpunit_command.php';
}
