<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

$hook['post_controller_constructor'][] = array(
    'class'    => 'App_header',
    'function' => 'index',
    'filename' => 'App_header.php',
    'filepath' => 'hooks',
    'params'   => ''
);

// Redirect SSL 
// $hook['post_controller_constructor'][1] = array(
//     'function' => 'redirect_ssl',
//     'filename' => 'ssl.php',
//     'filepath' => 'hooks'
// );
