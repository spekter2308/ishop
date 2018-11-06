<?php

/**
 * Файл налаштувань
 */

//створення констант для звернення до контролерів
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

//>шаблон, який використовується
$template = 'default';

//шляхи до файлів шаблонів (*.tpl)
define('TemplatePrefix', "../views/{$template}/");
define('TemplatePostfix', '.tpl');

//шляхи до файлів шаблонів у вебпросторі
define('TemplateWebPath', "/templates/{$template}/");
//<

//>Ініціалізація шаблонізатора Smarty
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
//<