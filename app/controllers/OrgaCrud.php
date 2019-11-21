<?php
namespace controllers;


 /**
 * CRUD Controller OrgaCrud
 * @route("/org","inherited"=>true,"automated"=>true)
 **/
class OrgaCrud extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model="models\\Organization";
	}
	
	public function index(){
	    echo "bla<br>";
	    parent::index();
	}

	public function _getBaseRoute() {
		return '/org';
	}
	

}
