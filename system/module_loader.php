<?
//Загрузка класса модуля
function __autoload($moduleName){
	$moduleName = str_replace("Module_","",$moduleName);
	$path = MODULEPATH.DIRECTORY_SEPARATOR.$moduleName.DIRECTORY_SEPARATOR.$moduleName.".php";
	if(file_exists($path))
		require_once($path);
}

//Модули наслудуются от этого класса
class LDModule{
 protected $ModuleName = "Noname";
 protected $ModuleVersion = "0.0.0";
 
 public function ModuleName(){return $this->ModuleName;}
 public function ModuleVersion(){ return $this->ModuleVersion;}
 public function Execute(){return "Вывод результата";}//Вывод результата работы модуля
}

