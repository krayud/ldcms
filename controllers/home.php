<?
if(!defined("ROOTPATH"))exit();

class Controller_Home extends Controller{

	function action_index(){
		//print_r($this->QURI);
		echo "Контроллер Home";
	}
}