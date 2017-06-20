<?php
require_once "../../engine.php";

$page = new TMaker();
$page->setValue("{page.title}");
$page->setValue("{page.content}");
$page->Page();
