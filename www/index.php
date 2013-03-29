<?
define('ROOTPATH', __DIR__.DIRECTORY_SEPARATOR);
define('MODULEPATH', realpath(ROOTPATH.'/../modules/').DIRECTORY_SEPARATOR);
define('SYSTEMPATH', realpath(ROOTPATH.'/../system/').DIRECTORY_SEPARATOR);
define('CONTROLLERSPATH', realpath(ROOTPATH.'/../controllers/').DIRECTORY_SEPARATOR);
define('ERRORSPAGESPATH', realpath(ROOTPATH.'/templates/errors/').DIRECTORY_SEPARATOR);

require_once(SYSTEMPATH."/config.php");
require_once(SYSTEMPATH."/module_loader.php");
require_once(SYSTEMPATH."/controller.php");

//Выбор контроллера по запросу
$QURI = strip_tags($_GET["quri"]);
$queryArray = explode('/',$QURI);
$querySize = count($queryArray);

//Формирование запроса
$controller = $router["defaultController"];
$action = $router["defaultAction"];

if($queryArray[0] != ""){
 $controller = $queryArray[0];
	if($queryArray[1] != "")
		$action = $queryArray[1];
}
//Попытка подключить контроллер, создать объект контроллера и вызвать методы _before, 'action_*' и _after
//TODO: Реализовать вложенные папки в контроллерах
$path = CONTROLLERSPATH.$controller.".php";
if(file_exists($path))
{
	require_once($path);
	$className = "Controller_".$controller;
	$methodName = "action_".$action;
	if(class_exists($className) && method_exists($className, $methodName))
	{
		$ControllerObject = new $className($queryArray); 
		$ControllerObject->_before();
		$ControllerObject->$methodName();
		$ControllerObject->_after();
	}
	else
		ShowErrorPage("404");
}
else
	ShowErrorPage("404");

//Дополнительные функции
function ShowErrorPage($code){
	include_once(ERRORSPAGESPATH.$code.".html");
	exit();
}
?>