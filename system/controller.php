<?
abstract class Controller{
	protected $QURI;
	function __construct($quri){
		$this->QURI = $quri;
	}
	public function _before(){}
	public function _after(){}
}