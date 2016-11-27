<?php
// ==============================================================
// Bootstraping
// ==============================================================
if (class_exists('\lolita\LolitaFramework')) {
    $lolita_framework = \lolita\LolitaFramework::getInstance(__DIR__);
    \lolita\LolitaFramework::define('BASE_DIR', $lolita_framework->baseDir());
    \lolita\LolitaFramework::define('BASE_URL', $lolita_framework->baseUrl());
    $lolita_framework->addModule('Configuration');
    $lolita_framework->addModule('Widgets');
    $lolita_framework->addModule('CssLoader');
}
