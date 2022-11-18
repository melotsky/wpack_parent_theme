<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
{
die ('No access!');
}

require_once( dirname(__FILE__) . '/core/fx-function-default.php'); // options theme