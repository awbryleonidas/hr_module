<?php 
header("Content-type: application/javascript; charset: UTF-8");

$file = $_GET['f'];

// make sure it's a js file
if (substr($file, -3) != '.js') exit;

// remove file hacking characters
$file = str_replace('../', '', $file);

$path = $_SERVER['DOCUMENT_ROOT'] . str_replace('assets/js/extra/extra.js', '', $_SERVER['PHP_SELF']) . 'application/modules/';

if (file_exists($path.$file))
{
	include($path.$file);
}