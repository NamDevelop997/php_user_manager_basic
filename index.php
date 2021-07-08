<?php
session_start();
// ob_start();
require 'lib/show_data.php';



require 'lib/template.php';
get_header();

$page = empty($_GET["page"]) ? "home" : $_GET["page"];
$path = "pages/{$page}.php";
if (file_exists($path)) {
    require $path;
} else {
    require 'pages/404.php';
}

get_footer();
