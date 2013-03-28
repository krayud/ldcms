<?
define('ROOTPATH', __DIR__.DIRECTORY_SEPARATOR);
define('MODULEPATH', realpath(ROOTPATH.'/../modules/').DIRECTORY_SEPARATOR);
define('SYSTEMPATH', realpath(ROOTPATH.'/../system/').DIRECTORY_SEPARATOR);
define('CONTROLLERS', realpath(ROOTPATH.'/../controllers/').DIRECTORY_SEPARATOR);
require_once(SYSTEMPATH."/module_loader.php");
require_once(SYSTEMPATH."/config.php");

echo $_GET["quri"];

?>