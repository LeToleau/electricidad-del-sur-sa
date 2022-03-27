<?php

/**
 * wcanvas Boilerplate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wcanvas_Boilerplate
 */

/**
 * Autoload and instance all theme setup classes
 */
$setup = new RecursiveDirectoryIterator(__DIR__ . '/inc/setup');
foreach (new RecursiveIteratorIterator($setup) as $file) {
	if ($file->getExtension() === 'php') {
		require $file;
		$class = basename($file, '.php');
        new $class;
	}
}

/**
 * Autoload all custom functionalities
 */
$functionalities = new RecursiveDirectoryIterator(__DIR__ . '/inc/functionalities');
foreach (new RecursiveIteratorIterator($functionalities) as $file) {
	if ($file->getExtension() === 'php') {
		require $file;
	}
}